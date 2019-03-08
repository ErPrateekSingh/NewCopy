<?php
namespace App\Http\Composers;

use Route;
use App\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ViewComposerUserData
{
  public function compose(View $view)
  {
    $currentRoute = \Route::currentRouteName();
    if($currentRoute == "photoPage" || $currentRoute == "reviewPage" || $currentRoute == "profilePage") {
      $userName = Route::current()->parameter("username");
      $view->with('userNameComposer',DB::table("profiles")
      ->join('users', 'profiles.user_id', '=', 'users.id')
      ->join('profile_stats', 'profiles.user_id', '=', 'profile_stats.user_id')
      ->join('images', 'profiles.image_id', '=', 'images.id')
      ->join('states', 'profiles.state_id', '=', 'states.id')
      ->join('cities', 'profiles.city_id', '=', 'cities.id')
      ->select('users.fname','users.lname',
               'states.state_name','cities.city_name',
               'profiles.user_id','profiles.username','profiles.created_at AS profileCreated_at','profiles.dob',
               'images.image_path','images.created_at',
               'profile_stats.photo_count','profile_stats.review_count','profile_stats.follower_count','profile_stats.following_count'
               )
      ->where("username",$userName)
      ->first());
    }
  }
}
