<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Frontend Routes 

Route::get('/', 'FrontEndController@home')->name('website');

/* Route::get('/', function () {
    return view('website.home');
})->name('website'); */

Route::get('/about', 'FrontEndController@home')->name('website');

/* Route::get('/about', function () {
    return view('website.about');
}); */

Route::get('/category', 'FrontEndController@home')->name('website');

/* Route::get('/category', function () {
    return view('website.category');
}); */

Route::get('/contact', 'FrontEndController@home')->name('website');

/* oute::get('/contact', function () {
    return view('website.contact');
}); */

Route::get('/post', 'FrontEndController@home')->name('website');

/* Route::get('/post', function () {
    return view('website.post');
});
 */

//Admin Panel Routes

Route::group(['prefix' => 'admin', 'middleware' => ['auth']],function(){

    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
    });

    Route::resource('category', 'CategoryController');

    Route::resource('tag', 'TagController');

    Route::resource('post', 'PostController');

});
