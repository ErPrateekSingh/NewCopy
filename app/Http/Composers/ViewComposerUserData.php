<?php
namespace App\Http\Composers;

Use Auth;
use App\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ViewComposerUserData
{
  public function compose(View $view)
  {

     if(Auth::check()){
        if(Auth::user()->status_id==1){
           $view->with('userData',User::join('profiles', 'users.id', '=', 'profiles.user_id')
              ->select('profiles.username')
              ->where('users.id', '=', Auth::user()->id)
              ->get());
        }
        // if(Auth::user()->status_id >= 3){
        //    $view->with('userImage',User::join('images', 'users.image_id', '=', 'images.id')
        //       ->join('details', 'users.id', '=', 'details.id')
        //       ->select('images.image_path', 'images.created_at', 'details.username')
        //       ->where('users.id', '=', Auth::user()->id)
        //       ->get());
        // }
      }
  }
}
