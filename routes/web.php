<?php

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


Auth::routes();

Route::post('/follow/{user}', 'FollowsController@store');

Route::get('/', 'PostsController@index')->name('p.index');
Route::get('/p/create', 'PostsController@create')->name('p.create');
Route::post('/p', 'PostsController@store')->name('p.store');
Route::get('/p/{post}', 'PostsController@show')->name('p.show');

Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
