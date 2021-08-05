<?php
namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller {
    public function showPerfil($id) {
        $user = auth()->user();
        if($user->id == $id) {
            return view('perfil.edit', compact('user'));
        } else {
            return view('pets.dashboard');
        }
    }

    public function update($id, Request $request) {
        $user = auth()->user();
        $data = $request->all();
        // $data['password'] = Hash::make($request->password);
        if($request->hasFile('image') && $request->image->isValid())
        {
            unlink(public_path('img/user/' . $user->image));
            $extension = $request->image->extension();
            $imagePath = md5($request->image->getClientOriginalName()) . $extension;
            $imageMove = $request->image->move(public_path('img/user'), $imagePath);
            $data['image'] = $imagePath;
        }
        if($request->password != "") {
            $data['password'] =  Hash::make($request->password);
        } else {
            $data['password'] = $user->password;
        }
        User::findOrFail($id)->update($data);
        return redirect('/dashboard');
        
    }

    public function destroy($id) {
        $user = auth()->user();
        //Delete pet of user
        $pets = Pet::all()->where('user_id', $user->id);
        foreach($pets as $pet) {
            unlink(public_path('img/pets/' . $pet->image));
        }
        Pet::where('user_id', $user->id)->delete();
        //Delete user 
        User::findOrFail($id)->delete();
        unlink(public_path('img/user/' . $user->image));

        return redirect('/dashboard');

    }
}