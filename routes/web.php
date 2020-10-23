<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$shopname = DB::table('home')->orderBy('id','desc')->limit(1)->get();
View::share('name', $shopname);

$flyers = DB::table('flyers')->where('page', 'featured')->orderBy('id','desc')->limit(3)->get();
View::share('flyers', $flyers);

$banners = DB::table('flyers')->where('page', 'banner')->orderBy('id','desc')->limit(3)->get();
View::share('banners', $banners);

$logo = DB::table('logo')->orderBy('id','desc')->limit(1)->get();
View::share('logos', $logo);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/register', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@started')->name('started');

Route::post('/contact-us', 'HomeController@contact')->name('contact');

Route::post('/logo', 'LogoController@logo')->name('logo');

Route::post('/flyers', 'FlyersController@store')->name('flyers');

Route::get('/contact-us', function () {
    return view('contact');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/flyers', function () {
    return view('flyers');
});

Route::get('/logo', function () {
    return view('logo');
});

Route::get('/messages', function () {
  $messages = DB::table('contact')->orderBy('id','desc')->simplePaginate(5);
  return view('messages', ['messages' => $messages]);
});

Route::get('/cookies', function() {
  return view('cookies');
});
Route::get('/terms', function() {
  return view('terms');
});
