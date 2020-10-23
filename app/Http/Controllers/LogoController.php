<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use AUTH;
use DB;
use App\Http\Controllers\Controller;

class LogoController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
      return view('logo');
  }

  public function logo(Request $request)
  {
    $request->validate([
     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048'
   ]);
   $image = $request->file('image');
   $file_name = $image->getClientOriginalName();
   $file_mime = $image->getClientOriginalExtension();
   Storage::putFileAs('public', new File($image), $file_name, 'public');
   $path = Storage::url($file_name);

\DB::table('logo')->insertGetId([
'logo' => $path
]);

return back()->with('message3', 'Your logo has been updated successfully!');

  }
}
