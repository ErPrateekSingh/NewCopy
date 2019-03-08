<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfilePage($username) {
        $profile = DB::table("profiles")->select('profiles.user_id')->where("username",$username)->first();
        $images = DB::table('images')->where('user_id', $profile->user_id)->latest()->take(9)->get();
        $reviews = DB::table('reviews')->where('user_id', $profile->user_id)->latest()->paginate(5);
        return view('pages/userPages/profile')->withImages($images)->withReviews($reviews);
    }
}
