<?php
Route::middleware('auth')->prefix('user')->group(function () {
   //work
    Route::get('/', function () {
        return view('user.index');
    })->name('index');
  //work
    Route::get('/Dashboard', function () {
        return view('user.index');
    })->name('dashboard');

    Route::get('/result', 'SearchController@search_user')->name('user_result_search');


    Route::get('/my_posts/{id}', 'user\PostController@view')->name('my_posts');
    Route::get('/delete_post/{id}', 'user\PostController@destroy')->name('delete_post');
    Route::get('/edit_post/{id}', 'user\PostController@edit')->name('edit_post');
    Route::post('/update_post/{id}', 'user\PostController@update')->name('update_post');

    Route::get('/add_post/{id}',function ($id){
        return view('user.add_posts',compact('id'));
    })->name('add_post_view');
    Route::get('/add/{id}','user\PostController@store')->name('add_post');

    Route::get('/post/{post_id}/{user_id}/add_comment', 'user\CommentController@store')->name('add_comment');

    Route::get('/post/{id}', 'user\PostController@show')->name('post');
    Route::get('/my_profile/{id}','user\UserController@show')->name('my_profile');
    Route::post('/update_my_profile/{id}', 'user\UserController@update')->name('update_my_profile');
    Route::post('/updateImage', 'user\UserController@store')->name('update_image');
    Route::get('/visit_user/{id}','user\UserController@visit_user')->name('visit_user');


});



Route::middleware('auth')->prefix('admin')->group(function () {

    Route::prefix('user_requests')->group(function () {

        Route::get('/', 'admin\UserTempController@index')->name('user_requests');
        Route::get('delete_user/{id}', 'admin\UserTempController@destroy')->name('delete_user_temp');
        Route::get('add_user/{id}', 'admin\UserTempController@edit')->name('add_user_temp');

    });

    Route::prefix('upcoming_posts')->group(function () {

        Route::get('/', 'admin\PostTempController@index')->name('upcoming_posts');
        Route::get('delete_post/{id}', 'admin\PostTempController@destroy')->name('delete_post_temp');
        Route::get('add_post/{id}', 'admin\PostTempController@edit')->name('add_post_temp');

    });


    Route::get('/add_user', function () {
        return view('admin.add_user');
    })->name('add_user');
    Route::post('/new_user', 'admin\UserController@store')->name('new_user');



    Route::prefix('all_user')->group(function () {

        Route::get('/', 'admin\UserController@index')->name('all_user');
        Route::get('show_user/{id}', 'admin\UserController@show')->name('show_user');
        Route::get('delete_user/{id}', 'admin\UserController@destroy')->name('delete_user');

    });
    Route::get('edit_user/{id}', 'admin\UserController@edit')->name('edit_user');
    Route::post('update_user/{id}', 'admin\UserController@update')->name('update_user');

    Route::prefix('all_posts')->group(function () {

        Route::get('/', 'admin\PostController@index')->name('all_posts');
        Route::get('delete_post/{id}', 'admin\PostController@destroy')->name('delete_post_user');

    });
});

Route::prefix('Auth')->group(function () {

Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/create', 'Auth\RegisterController@create')->name('create');

Route::get('/login','Auth\LoginController@login')->name('login');
Route::get('/',function (){
    return view('auth.login');
});
Route::post('/authenticate','Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout','Auth\LoginController@logout')->name('logout');
});


Route::get('/',function (){
    return view('home');
})->name('home');
Route::get('/result/', 'SearchController@search_visit')->name('visitor_result_search');
Route::get('/visit_post/{id}', 'PostController@show')->name('show_post');


Route::get('/403', function () {
    return view('error-404');
})->name('403');

