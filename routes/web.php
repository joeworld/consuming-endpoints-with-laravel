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


Route::get('/', 'HomeController@index')->name('homepage');

Route::get('posts', 'HomeController@index');

Route::get('posts/{postid}/comments', 'HomeController@comments')->name('comments');

Route::get('posts/{postid}', 'HomeController@post')->name('post');

Route::get('users/{id}', 'HomeController@user')->name('user');

Route::get('users', 'HomeController@users')->name('users');