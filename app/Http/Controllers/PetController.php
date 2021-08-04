<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        $user = auth()->user();

        return view('welcome', compact('user'));
    }

    public function dashboard(Request $request) {
        $namepet = $request->namePet;
        $namecity = $request->nameCity;
        if($request->namePet) {
            if($request->nameCity) {
                $pets = Pet::where([['city', 'like', '%'.$request->nameCity.'%']])->get();
            } else {
                 $pets = Pet::where([['name', 'like', '%'.$request->namePet.'%']])->get();
            }
        } else if($request->nameCity) {
            $pets = Pet::where([['city', 'like', '%'.$request->nameCity.'%']])->get();
        } else if($request->namePet == "" && $request->nameCity == "") {
            $pets = Pet::orderBy("date")->get();
        }
        return view('pets.dashboard', compact('pets', 'namepet', 'namecity'));
    }

    public function create() {
        return view('pets.create');
    }

    public function store(Request $request) {
        //get datas
        $data = $request->all();
        // get date
        $today = date('Y/m/d');
        $data['date'] = $today;
        // make sure if exists image
        if($request->hasFile('image') && $request->image->isValid()) {
            $extension = $request->image->extension();
            $imagePath = md5($request->image->getClientOriginalName()) . '.' . $extension;
            $imageMove = $request->image->move(public_path('img/pets'), $imagePath);
            $data['image'] = $imagePath;
        }
        //user authenticate
        $user = auth()->user();
        $data['user_id'] = $user->id;
        //insert datas
        Pet::create($data);
        return redirect('/dashboard')->with('msg', 'Pet adicionado com sucesso');
    }

    public function show($id) {
        $user = auth()->user();
        if($user->id == $id ){
            $pets = Pet::all()->where('user_id', $user->id);
            return view('pets.show', compact('pets'));
        } else {
            return redirect('/dashboard');
        }
    }

    public function destroy($id) {
        $user = auth()->user();
        $pet = Pet::findOrFail($id);
        unlink(public_path('img/pets/'.$pet->image));
        $pet->delete();

        return redirect('/meuspets/'.$user->id);
        
    }

    public function edit($id) {
        $user = auth()->user();
        $pet = Pet::findOrFail($id);
        if($pet->user_id == $user->id) {
            return view('pets.edit', compact('pet'));
        } else {
            return redirect('/dashboard');
        }
    }

    public function update($id, Request $request) {
        $user = auth()->user();
        $pet = Pet::findOrfail($id);
        if($pet->user_id == $user->id) {
            $data = $request->all();
            if($request->hasFile('image') && $request->image->isValid()) {
                $extension = $request->image->extension();
                $imagePath = md5($request->image->getClientOriginalName()) . "." . $extension;
                $imageMove = $request->image->move(public_path('img/pets'), $imagePath);
                $data['image'] = $imagePath;
                unlink(public_path('img/pets/'.$pet->image));
            }
            $pet->update($data);
            return redirect('/dashboard');

        } else {
            return redirect('/dashboard');
        }
    }
}
