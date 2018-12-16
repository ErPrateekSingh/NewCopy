<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxRequestController extends Controller
{
    /* UNSECURE - function to check if email is unique through ajax request */
    /* returns true if unique */
    public function checkUniqueEmail(Request $request) {
        // Setup the validator
        $validator = Validator::make($request->all(), [
            'email'=>'required|string|email|max:255'
        ]);

        // Validate the input and return correct response
        if (!$validator->fails())
        return json_encode(!User::where('email', '=', $request->email)->exists());
    }

    /* UNSECURE - function to get city list using state_id through ajax request */
    /* returns the city list*/
    public function ajaxGetCity(Request $request) {
      // Setup the validator
      $validator = Validator::make($request->all(), [
          'state_id'=>'required|integer'
      ]);

      // Validate the input and return correct response
      if (!$validator->fails()) {
        $cities = DB::table("cities")->select('id','city_name')->where("state_id",$request->state_id)->get();
        return response()->json($cities);
      }
    }

    /* SECURED WITH API - function to check if userName is unique through */
    /* ajax request using user's api; returns true if unique*/
    public function apiCheckUniqueUserName(Request $request) {
      // Setup the validator
      $validator = Validator::make($request->all(), [
          'username'=>'required|string|max:20'
      ]);

      // Validate the input and return correct response
      if (!$validator->fails())
       return json_encode(!Profile::where('username', '=', $request->username)->exists());
    }
}
