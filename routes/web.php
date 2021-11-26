<?php

use App\Events\MessagePosted;
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

// Admin route

Route::get('/admin', 'AdminController@index')->name('admin');

// Api Routes

Route::get('api/category-data', 'ApiController@categoryData');
Route::get('api/lesson-data', 'ApiController@lessonData');
Route::get('api/marketing-image-data', 'ApiController@marketingImageData');
Route::get('api/subcategory-data', 'ApiController@subcategoryData');
Route::get('api/widget-data', 'ApiController@widgetData');

// Authentication routes

Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('login', 'Auth\AuthController@login');
Route::post('logout', 'Auth\AuthController@logout')->name('logout');

// Chat routes


Route::get('/chat-messages', 'ChatController@getMessages')->middleware('auth');

Route::post('/chat-messages', 'ChatController@postMessage')->middleware('auth');

Route::get('/chat', 'ChatController@index')->middleware('auth');

// Category route

Route::resource('category', 'CategoryController');

// home page route

Route::get('/', 'PagesController@index')->name('home');

// Lesson routes

Route::get('lesson/create',  'LessonController@create')->name('lesson.create');

Route::get('lesson/{lesson}-{slug?}', 'LessonController@show')->name('lesson.show');

Route::resource('lesson', 'LessonController', ['except' => ['show', 'create']]);

// MarketingImages routes

Route::resource('marketing-image', 'MarketingImageController');


// Password Reset Routes...

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Privacy route

Route::get('privacy', 'PagesController@privacy');

// Profile

Route::get('show-profile', 'ProfileController@showProfileToUser')->name('show-profile');

Route::get('determine-profile-route', 'ProfileController@determineProfileRoute')->name('determine-profile-route');

Route::resource('profile', 'ProfileController');

// Registration routes

Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\AuthController@register');

// Username route

Route::get('/username', 'UsernameController@show')->middleware('auth');

// Settings routes

Route::get('settings', 'SettingsController@edit');

Route::post('settings', 'SettingsController@update')->name('user-update');

// Socialite routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

// Subcategory route

Route::resource('subcategory', 'SubcategoryController');

// Terms route

Route::get('terms-of-service', 'PagesController@terms');


// test route

Route::get('test', 'TestController@index')->middleware(['auth', 'throttle']);

// User routes

Route::resource('user', 'UserController');


// Widget routes

Route::get('widget/create',  'WidgetController@create')->name('widget.create');

Route::get('widget/{widget}-{slug?}', 'WidgetController@show')->name('widget.show');

Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);