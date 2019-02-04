<?php
namespace App\Http\Composers;

use App\City;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ViewComposerCity
{
  public function compose(View $view)
  {
    // $minutes = 60 * 24 * 365 * 10; // ten years should be long enough
    // if (Cookie::get('CTID') !== null){
    //    Cookie::queue(Cookie::make('CTSID', '2', $minutes));//For City Status ID
    //    Cookie::queue('CTSID', '2', $minutes, null, null, false, false);
    //    $ctid = Cookie::get('CTID');
    // } else {
    //    Cookie::queue(Cookie::make('CTID', '135', $minutes));//For City ID
    //    Cookie::queue('CTID', '135', $minutes);
    //    Cookie::queue(Cookie::make('CTSID', '1', $minutes));//For City Status ID
    //    Cookie::queue('CTSID', '1', $minutes);
    //    $ctid = '135';
    // }
    // $view->with('cityName',DB::table("cities")
    //       ->select('city_id', 'city_name')
    //       ->where("city_id",$ctid)
    //       ->first());
    $view->with('cityComposer',DB::table("cities")
          ->select('id', 'city_name')
          ->where("id",125)
          ->first());
  }
}
