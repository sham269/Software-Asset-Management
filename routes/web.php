<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AdminCOntroller;

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
Route::middleware(['auth','is_systemadmin'])->group(function(){
    Route::get('Admin/User','App\Http\Controllers\AdminCOntroller@UserPage');
    Route::get('/admin','App\Http\Controllers\RequestsController@index');
    Route::get('/Verified','App\Http\Controllers\AdminCOntroller@VerifyPage');
   
});

Route::middleware(['auth','is_admin'])->group(function(){
    #Route::get('/admin','App\Http\Controllers\PagesController@admin');
    Route::get('/admin','App\Http\Controllers\RequestsController@index');
    Route::get('/available','App\Http\Controllers\PagesController@available');
    Route::get('posts/create','App\Http\Controllers\PostsController@create');
    Route::put('update/{id}','App\Http\Controllers\AdminCOntroller@UserUpdate')->name('user.update');
    Route::put('posts/update/{id}','App\Http\Controllers\PostsController@update');
    Route::delete('posts/Delete/{id}','App\Http\Controllers\PostsController@destroy');
    Route::put('posts/store','App\Http\Controllers\PostsController@store')->name('posts.store');
    //Route::resource('/posts','App\Http\Controllers\PostsController');
    //Route::put('update/{id}','App\Http\Controllers\AdminCOntroller@PostsController@Update');
     Route::get('Admin/Delete/{id}','App\Http\Controllers\AdminCOntroller@Destroy');
    Route::get('Admin/AllRequest','App\Http\Controllers\AdminCOntroller@index');
    Route::get('Admin/RejectedRequest','App\Http\Controllers\AdminCOntroller@RejectedPage');
    Route::get('Admin/Software','App\Http\Controllers\AdminCOntroller@SoftwarePage');
    Route::get('Admin/InProgressRequest','App\Http\Controllers\AdminCOntroller@InProgressPage');
    Route::get('Admin/AcceptedRequest','App\Http\Controllers\AdminCOntroller@AcceptedPage');
    Route::get('Admin/SubmittedRequest','App\Http\Controllers\AdminCOntroller@SubmittedPage');
    Route::get('Admin/User','App\Http\Controllers\AdminCOntroller@UserPage');
    Route::resource('/Admin', 'App\Http\Controllers\AdminCOntroller');
});
Route::middleware(['auth','is_systemadmin'])->group(function(){
    Route::get('/admin/User','App\Http\Controllers\AdminCOntroller@UserPage');
    Route::get('/admin','App\Http\Controllers\RequestsController@index');
    Route::get('/Verified','App\Http\Controllers\AdminCOntroller@VerifyPage');
    Route::put('/admin/update/{id}','App\Http\Controllers\AdminCOntroller@UserUpdate');
    Route::delete('/admin/delete/{id}','App\Http\Controllers\AdminCOntroller@destroy');
   
});
Route::middleware(['auth','is_loggedin'])->group(function(){
    Route::get('/about','App\Http\Controllers\PagesController@about');
    Route::get('/my_requests','App\Http\Controllers\RequestsController@index');
    Route::get('/room','App\Http\Controllers\PagesController@room');
    Route::get('/request','App\Http\Controllers\PagesController@request');
    Route::get('/posts/index','App\Http\Controllers\PostsController@index');
    Route::put('update/{id}','App\Http\Controllers\RequestsController@UserUpdate')->name('user.update');
    #Route::resource('/posts','App\Http\Controllers\PostsController');
    Route::get('/edit_php/{id}','App\Http\Controllers\RequestsController@edit');
    Route::get('/my_profile','App\Http\Controllers\PagesController@UserPage');
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

Route::middleware(['auth','is_verified'])->group(function(){
    Route::get('/not_verified','App\Http\Controllers\PagesController@Not_Verified')->name('not_verified');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::put('verify/{id}','App\Http\Controllers\AdminCOntroller@verify');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');