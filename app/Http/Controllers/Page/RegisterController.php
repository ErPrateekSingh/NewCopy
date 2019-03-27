<?php

namespace App\Http\Controllers\Page;

use Auth;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
  public function index() {
      return view('pages.registerPage.index');
  }

  public function getPageCategoryForm()
  {
    $categories = DB::table("categories")->select('id', 'icon','name')->orderBy('name', 'asc')->get();
    // Sending empty $subcategories to hide error
    return view('pages.registerPage.registerPageCategory', ['categories'=> $categories], ['subcategories'=> $categories]);
  }

  public function postPageCategoryForm(Request $request)
  {
    $validatedData = $request->validate([
       'category'     => 'required|numeric',//validation rule for max min values
    ]);

    if($request->category != "100")
    {
      $validatedData = $request->validate([
         'subCategory'  => 'numeric',//validation rule for max min values
      ]);

      $result = DB::transaction(function () use ($request) {
                    $data = new Page;
                    $data->category_id = $request->category;
                    $data->sub_category_id = $request->subCategory;
                    $data->save();
                    // DB::table('user_page')->where('id', Auth::user()->id)->update(['status_id' => '1', 'updated_at' => \Carbon\Carbon::now()]);
                    DB::table('page_user')->insert(['page_id' => $data->id, 'user_id' => Auth::user()->id, 'created_at' =>  \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()]);
                    return true;
                }, 5);

      if($result){
          // Return data for successful execution
          return redirect()->route('register.page.details');
      }else{
          // Return data for unsuccessful execution
          Session::flash('failed','Oops, Something went Wrong!');
          return redirect()->route('register.page.category');
      }
    } else {

    }


    // if
    // $categories = DB::table("categories")->select('id', 'category_icon','category_name')->orderBy('category_name', 'asc')->get();
    // return view('pages.registerPage.registerPageCategory', ['categories'=> $categories], ['subcategories'=> $categories]);
    // dd($categories);
  }
}
