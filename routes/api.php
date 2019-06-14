<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

	'namespace' => 'Api'

], function(){

Route::resource('users', 'UsersController', [
    'only' => ['index', 'show']
]);

Route::resource('posts', 'PostsController', [
    'only' => ['index', 'show']
]);

Route::resource('comments', 'CommentsController', [
    'only' => ['index', 'show']
]);

Route::get('users/{userid}/posts', 'PostsController@userPosts')->name('users.posts');
Route::get('posts/{postid}/comments', 'CommentsController@getCommentByPost')->name('post.comments');

});