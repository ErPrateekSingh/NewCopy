<?php
namespace App\Http\Controllers;

use Auth;
use Image;
use App\State;
use App\Profile;
use App\Image as Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RegisterUserController extends Controller
{
      /*function to display user details page to user after email varification*/
     public function getUserDetailsForm() {
       if(!Auth::user()->status_id){
         $states = DB::table("states")->select('id','state_name')->get();
         return view('pages.registerUser.registerUserDetails', ['states'=> $states]);
       } else {
         return redirect()->route('register.user.image');
       }
     }

     /*function to post and save data to the database*/
     public function postUserDetailsForm(Request $request) {
        $validatedData = $request->validate([
           'username' => 'required|alpha_num|min:6|max:20|unique:profiles,username',
           'dob'      => 'required|date',
           'gender'   => 'required|string|max:1',
           'state'    => 'required|numeric',//validation rule for max min values
           'city'     => 'required|numeric',//validation rule for max min values
        ]);

        $data = new Profile;
        $data->user_id = Auth::user()->id;
        $data->username = $request->username;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->state_id = $request->state;
        $data->city_id = $request->city;
        $data->save();
        DB::table('users')->where('id', Auth::user()->id)->update(['status_id' => '1', 'updated_at' => \Carbon\Carbon::now()]);
        return redirect()->route('register.user.image');
     }

     /*function to show image upload page after redirected from the register/user/details page*/
     public function getUserImageForm() {
       $user = Profile::select('image_id')->where('user_id',Auth::user()->id)->first();
      if($user){
         if ($user->image_id) return redirect()->route('home');
         else return view('pages.registerUser.registerUserImage');
       } else { return redirect()->route('register.user.details'); }
     }

     /*function to post image after upload from the register/user/images page*/
     public function postUserImageForm(Request $request) {
        $validatedData = $request->validate([
           'userImage'      => 'required|image|dimensions:min_width=250,min_height=250',
        ]);

        if ($request->hasFile('userImage')) {
           if(!Storage::exists('/public/images/uploads/'.date("Y").'/avatar')) {
              Storage::makeDirectory('/public/images/uploads/'.date("Y").'/avatar', 0775, true); //creates directory for images upload
           }
           $cropped_value = $request->input("cropped_value"); // Width,height,x,y for cropping
           $cp_v = explode(",",$cropped_value); // Explode width,height,x,y
           $file = $request->file('userImage');
           $file_name = time() . '.' . $file->getClientOriginalExtension(); // Get Cropped Image Extention
           $location = storage_path('/app/public/images/uploads/'.date("Y").'/'.$file_name); //Cropped Image Upload Path
           $location_avtr = storage_path('/app/public/images/uploads/'.date("Y").'/avatar/'.$file_name); //Cropped Image Upload Path for Avatar
           $img = Image::make($file->getRealPath());
           $img->crop($cp_v[0],$cp_v[1],$cp_v[2],$cp_v[3]); // Crop Image
           $img->resize(250, 250)->save($location); // Resize Image & Save Image
           $img->resize(40, 40)->save($location_avtr); // Resize Image & Save Image for Avatar (Displays only 32X32)

           $id = Img::insertGetId(['image_path' => $file_name, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]); // Save Image path in database
           DB::table('image_user')->insert(['user_id' => Auth::user()->id, 'image_id' => $id, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
           DB::table('profiles')->where('user_id', Auth::user()->id)->update(['image_id' => $id, 'updated_at' => \Carbon\Carbon::now()]);
           return redirect()->route('home');
        }
     }
}
