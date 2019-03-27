<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function showProfilePage($username) {
        $profile = DB::table("profiles")->select('profiles.user_id')->where("username",$username)->first();
        $images = DB::table('images')->join('image_user', 'images.id', '=', 'image_user.image_id')->select('images.image_path', 'images.created_at')->where('user_id', $profile->user_id)->latest()->take(9)->get();
        $reviews = DB::table('reviews')->where('user_id', $profile->user_id)->latest()->paginate(5);
        return view('pages/userPages/profile')->withImages($images)->withReviews($reviews);
    }
}
