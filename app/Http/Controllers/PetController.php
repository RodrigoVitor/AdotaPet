<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index() {
        $user = auth()->user();

        return view('welcome', compact('user'));
    }

    public function dashboard() {

        return view('pets.dashboard');
    }

    public function create() {
        return view('pets.create');
    }
}
