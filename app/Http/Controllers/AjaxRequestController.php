<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    /*function to check if email is unique through ajax request on register page; returns true if unique*/
    public function checkUniqueEmail(Request $request) {
        // Setup the validator
        $validator = Validator::make($request->all(), [
            'email'=>'required|string|email|max:255'
        ]);
        
        // Validate the input and return correct response
        if (!$validator->fails())
        return json_encode(!User::where('email', '=', $request->email)->exists());
    }
}
