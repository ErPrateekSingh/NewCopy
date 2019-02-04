<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfilePage($username) {
       return view('pages/userPages/profile');
    }
}
