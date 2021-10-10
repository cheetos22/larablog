<?php

use App\Http\Controllers\PostController;
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

Route::get('/', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show')->name('posts.single');

Route::get('/o-mnie', function () {
    return view('pages.about');
})->name('about');

Auth::routes(['verify' => true]);

Route::get('/admin/post/create', 'Admin\PostController@create')->name('admin.post.create');

