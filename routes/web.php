<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Frontend Routes 

Route::get('/', 'FrontEndController@home')->name('website');


Route::get('/about', 'FrontEndController@about')->name('website.about');


Route::get('/category/{slug}', 'FrontEndController@category')->name('website.category');


Route::get('/contact', 'FrontEndController@contact')->name('website.contact');


Route::get('/post/{slug}', 'FrontEndController@post')->name('website.post');

Route::post('/contact', 'FrontEndController@send_message')->name('website.contact');
 

//Admin Panel Routes

Route::group(['prefix' => 'admin', 'middleware' => ['auth']],function(){

    Route::get('/dashboard', function(){
        return view('admin.dashboard.index');
    });

    Route::resource('category', 'CategoryController');
    Route::resource('tag', 'TagController');
    Route::resource('post', 'PostController');

    Route::resource('user', 'UserController');
    Route::get('/profile', 'UserController@profile')->name('user.profile');
    Route::post('/profile', 'UserController@profile_update')->name('user.profile.update');
    
    //Setting
    Route::get('setting', 'SettingController@edit')->name('setting.index');
    Route::post('setting', 'SettingController@update')->name('setting.update');

    //Contact message
    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::get('/contact/show/{id}', 'ContactController@show')->name('contact.show');
    Route::delete('/contact/delete/{id}', 'ContactController@destroy')->name('contact.destroy');
});




Route::get('/test', function(){

    $id = 60;
    $posts = App\Models\Post::all();
    foreach ($posts as $post){

        $post->image = "https://i.picsum.photos/id/".$id."/172/640/480.jpg";
        $post->save();
        $id++;
    }

    return $posts;
});