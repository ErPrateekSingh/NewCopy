<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
  public function showPhotoPage($username) {
      $images = DB::table('profiles')
      ->join('image_user', 'profiles.user_id', '=', 'image_user.user_id')
      ->join('images', 'image_user.image_id', '=', 'images.id')
      ->select('images.image_path','images.created_at')
      ->where("username",$username)
      ->latest()
      ->paginate(12);
      return view('pages/userPages/photos')->withImages($images);
  }
}
