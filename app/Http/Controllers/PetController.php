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

    public function dashboard() {
        $pets = Pet::all();
        //pegar dono do pet
        $users = User::all();

        return view('pets.dashboard', compact('pets', 'users'));
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
}
