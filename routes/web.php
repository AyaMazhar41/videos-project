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




Route::namespace('backend')->prefix('admin')->middleware('admin')->group(function()
{
	Route::get('home','Home@index')->name('admin.home');
	/*Route::get('users','users@index');
    Route::get('users/create','users@create');
    Route::post('users','users@store');
    Route::get('users/{id}','users@edit');
    Route::post('users/{id}','users@update');
    Route::get('users/delete/{id}','users@delete');*/
    Route::resource('users','users')->except(['show']);
    Route::resource('categories','Categories')->except(['show']);
    Route::resource('skills','Skills')->except(['show']);
    Route::resource('tags','Tags')->except(['show']);
    Route::resource('pages','Pages')->except(['show']);
    Route::resource('videos','Videos')->except(['show']);
    Route::resource('messages','messages')->only(['index','destroy','edit']);
    Route::post('messages/reply/{id}','messages@reply')->name('message.reply');
    Route::post('comments','Videos@commentStore')->name('comments.store');
    Route::get('comments/{id}','Videos@commentDelete')->name('comments.delete');
     Route::post('comments/{id}','Videos@commentUpdate')->name('comments.update');
});

Auth::routes();

Route::get('/','HomeController@welcome')->name('frontend.landing');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('video/{id}', 'HomeController@video')->name('frontend.video');
Route::get('tag/{id}', 'HomeController@tags')->name('front.tags');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');

Route::get('profile/{id}/{slug?}','HomeController@profile')->
name('front.profile');


Route::middleware('auth')->group(function()
{
Route::post('comment/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');

Route::post('comment/{id}/create', 'HomeController@commentStore')->name('front.commentStore');
Route::get('comment/{id}/delete', 'HomeController@commentdelete')->name('front.delete');
Route::post('profile','HomeController@profileUpdate')->
name('profile.update');
});




Route::get('contact-us', 'HomeController@contact')->name('contact.store');

