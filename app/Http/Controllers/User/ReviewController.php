<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
  public function showReviewPage($username) {
    $reviews = DB::table('profiles')
    ->join('reviews', 'profiles.user_id', '=', 'reviews.user_id')
    ->select('reviews.rating','reviews.description','reviews.created_at')
    ->where("username",$username)
    ->latest()
    ->paginate(6);
    return view('pages/userPages/reviews')->withReviews($reviews);
  }
}
