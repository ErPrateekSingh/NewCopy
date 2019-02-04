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
        if(Auth::user()->status_id >= 2){
           $view->with('userComposer',User::join('profiles', 'users.id', '=', 'profiles.user_id')
           ->join('images', 'profiles.image_id', '=', 'images.id')
           ->select('profiles.username','images.image_path','images.created_at')
           ->where('users.id', '=', Auth::user()->id)
           ->first());
        } else {
           $view->with('userComposer', "");
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
