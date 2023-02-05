<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', 'App\Http\Controllers\PagesController@index');

// Route::get('/about',function(){
//     return view('pages.about');
// });

Route::middleware(['auth','is_admin'])->group(function(){
    #Route::get('/admin','App\Http\Controllers\PagesController@admin');
    Route::get('/admin','App\Http\Controllers\RequestsController@index');
    Route::get('/available','App\Http\Controllers\PagesController@available');
    Route::get('posts/create','App\Http\Controllers\PostsController@create');
});

Route::middleware(['auth','is_loggedin'])->group(function(){
    Route::get('/about','App\Http\Controllers\PagesController@about');
    Route::get('/my_requests','App\Http\Controllers\RequestsController@index');
    Route::get('/room','App\Http\Controllers\PagesController@room');
    Route::get('/request','App\Http\Controllers\PagesController@request');
    Route::resource('/posts','App\Http\Controllers\PostsController');
    Route::get('/edit_php/{id}','App\Http\Controllers\RequestsController@edit');
    Route::resource('/requests','App\Http\Controllers\RequestsController');
    Route::get('/tab1',function(){
        Route::get('/my_requests','App\Http\Controllers\RequestsController@index');
    });
    Route::get('/tab2',function(){
        return view('pages.my_requests');
    });
    Route::get('/tab3',function(){
        return view('pages.my_requests');
    });


});



//DYNAMIC Route
// Route::get('/users/{id}/{name}',function($id,$name){
//     return 'This is user ' .$name.' with an id of '.$id;
// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
