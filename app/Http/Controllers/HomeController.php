<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function started(Request $request)
    {
       $request->validate([
        'shopname' => 'required:max:20',
        'about' => 'required',
        'phone' => 'required:max:20:numeric',
        'email' => 'required:max:255',
        'address' => 'required:max:255',
        'message1' => 'required:max:150',
        'instagram' => 'required:max:80',
        'facebook' => 'required:max:80',
        'twitter' => 'required:max:80'
      ]);

      $shopname = $request->post('shopname');
      $about = $request->post('about');
      $phone = $request->post('phone');
      $email = $request->post('email');
      $address = $request->post('address');
      $message = $request->post('message1');
      $instagram = $request->post('instagram');
      $facebook = $request->post('facebook');
      $twitter = $request->post('twitter');

      \DB::table('home')->insertGetId([
        'shopname' => $shopname,
        'about' => $about,
        'phone' => $phone,
        'email' => $email,
        'address' => $address,
        'instagram' => $instagram,
        'facebook' => $facebook,
        'twitter' => $twitter,
        'message' => $message
      ]);

      return back()->with('message1', 'Your post is submitted successfully');
    }


    public function contact(Request $request)
    {
       $request->validate([
        'fromname' => 'required:max:255',
        'email' => 'required:max:255',
        'subject' => 'required:max:255',
        'tel' => 'required',
        'message' => 'required'
      ]);

      $fromname = $request->post('fromname');
      $email = $request->post('email');
      $subject = $request->post('subject');
      $message = $request->post('message');
      $tel = $request->post('tel');

      \DB::table('contact')->insertGetId([
        'fromname' => $fromname,
        'message' => $message,
        'email' => $email,
        'subject' => $subject,
        'tel' => $tel
      ]);

      return back()->with('message1', 'Your message has been delivered successfully');
    }
}
