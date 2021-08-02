<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        if(User::findOrFail($id)->update($data)) {
             return view('pets.dashboard');
        }
    }
}