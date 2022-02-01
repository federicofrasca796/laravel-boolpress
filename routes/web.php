<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('guest.welcome');
})->name('home');

Route::resource('products', ProductController::class)->only([
    'index', 'show'
]);
Route::resource('posts', PostController::class)->only([
    'index', 'show'
]);

Route::get('categories/{category}/posts', 'CategoryController@post')->name('categories.posts');
Route::get('tags/{tag}/posts', 'TagController@posts')->name('tags.posts');

Route::get('contacts', 'ContactController@show_contact_page')->name('contacts');
Route::post('contacts', 'ContactController@sendContactForm')->name('contacts.send');

Auth::routes();

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
});