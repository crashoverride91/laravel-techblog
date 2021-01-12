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

Route::get('/about', 'FrontEndController@about')->name('website.about');

/* Route::get('/about', function () {
    return view('website.about');
}); */

Route::get('/category', 'FrontEndController@category')->name('website.category');

/* Route::get('/category', function () {
    return view('website.category');
}); */

Route::get('/contact', 'FrontEndController@contact')->name('website.contact');

/* oute::get('/contact', function () {
    return view('website.contact');
}); */

Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');

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
