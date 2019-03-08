<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
