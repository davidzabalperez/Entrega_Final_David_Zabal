<?php

Route::get('/welcome', function () {
    return view('welcome_basic');
})->middleware('auth.basic');

Route::get('/', [
    'as'=>'home',
    'uses'=>'AppController@index'
]);
Route::get('/getLogin', function (){
    return view('auth.login');
});
Route::get('/getProfile', function (){
    return view('profile');
})->name('profile');

Route::get('/getRegister', function (){
    return view('auth.register');
});

Route::get('/home', 'HomeController@index')
->name('home')->middleware('verified');

Route::post('/changeProfile', [
    'as'=>'changeProfile',
    'uses'=>'AppController@cambiarNombre']);

Route::get('/getMessages',
    ['as'=>'messages.index',
        'uses'=>'MessageController@index'
    ])->middleware('auth');
Auth::routes(['verify'=> true]);

Route::resource('message', 'MessageController')->middleware('auth');
Route::resource('user', 'UserController')->middleware('auth');