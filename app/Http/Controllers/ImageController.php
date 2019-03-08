<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
use Illuminate\Routing\Controller;

class ImageController extends Controller
{
  public function showPhotoPage($username) {
      $images = DB::table('profiles')
      ->join('images', 'profiles.user_id', '=', 'images.user_id')
      ->select('images.image_path','images.created_at')
      ->where("username",$username)
      ->latest()
      ->paginate(12);
      return view('pages/userPages/photos')->withImages($images);
  }
}
