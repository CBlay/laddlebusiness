<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use AUTH;
use DB;
use App\Http\Controllers\Controller;


class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('flyers');
    }

    public function store(Request $request)
    {
       $request->validate([
        'description' => 'required',
        'page' => 'required:max:20',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048'
      ]);

      $description = $request->post('description');
      $page = $request->post('page');

            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $file_mime = $image->getClientOriginalExtension();
            Storage::putFileAs('public', new File($image), $file_name, 'public');
            $path = Storage::url($file_name);

      \DB::table('flyers')->insertGetId([
        'image' => $path,
        'description' => $description,
        'page' => $page
      ]);

      return back()->with('message2', 'Your flyer has been added successfully!');
    }

}
