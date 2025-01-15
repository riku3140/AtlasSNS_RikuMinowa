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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::post('/top','PostsController@createForm')->middleware('auth');  //投稿フォームのルーティング

Route::post('/post/update','PostsController@postupdate')->middleware('auth'); //投稿の編集フォーム
Route::get('/post/{id}/delete','PostsController@delete')->middleware('auth');   //投稿の削除

Route::get('/search','UsersController@search')->middleware('auth');  //ユーザーの検索
Route::post('/search','UsersController@search')->middleware('auth');

//フォロー系
Route::get('/follows','FollowsController@followList')->middleware('auth');

Route::get('/follow','FollowsController@follow')->middleware('auth') ->name('follows');
Route::post('/follow/{id}','FollowsController@follow')->middleware('auth') ->name('follows');

Route::get('/unfollow','FollowsController@unfollow')->middleware('auth') ->name('unfollow');
Route::post('/unfollow/{id}','FollowsController@unfollow')->middleware('auth') ->name('unfollow');



Route::get('/followers','FollowsController@followerList')->middleware('auth');

Route::get('/follows','UsersController@follows')->middleware('auth');
Route::get('/followers','UsersController@followers')->middleware('auth');
Route::get('/follows','UsersController@isFollowing')->middleware('auth');
Route::get('/followers','UsersController@isFollowed')->middleware('auth');

Route::get('/follows','FollowsController@followsList')->middleware('auth');
//Route::get ('/followerList','FollowsController@followList_view')->middleware('auth'); //フォローリスト投稿表示
Route::get ('/followerList','FollowsController@followerList')->middleware('auth');//フォロワーリスト表示
Route::get('/followList','FollowsController@followList')->middleware('auth');//フォローリスト表示

Route::post('/profile/update','UsersController@updateProfile');
Route::get('/profile/{id?}/otherprofile', 'UsersController@profile')->name('profile.show');//相手のプロフ遷移





//routeのルーティング↓
Route::post('/followers','User@isFollowed')->middleware('auth') ->name('follows.follow');
Route::post('/follows','User@follows')->middleware('auth') ->name('follows.follow');


Route::get('/top','PostsController@index')->middleware('auth');

Route::get('/logout','Auth\LoginController@logout')->middleware('auth');

Route::get('/profile','UsersController@profile')->middleware('auth');

//Route::get('/search','UsersController@index')->middleware('auth');

Route::get('/follow-list','PostsController@index')->middleware('auth');
Route::get('/follower-list','PostsController@index')->middleware('auth');
