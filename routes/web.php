<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostFeedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/{user_id}', [PostController::class, 'userId'])->name('home.user_id');
Route::get('/username/{username}', [PostController::class, 'username'])->name('home.username');

Route::get('/posts/feed', [PostFeedController::class, 'index'])->name('posts.feed');
Route::get('/posts/feed/{user_id}', [PostFeedController::class, 'userId'])->name('posts.feed.user_id');
Route::get('/posts/feed/username/{username}', [PostFeedController::class, 'username'])->name('posts.feed.username');

Route::get('/comments/feed', [PostFeedController::class, 'comments'])->name('comments.feed');
Route::get('/comments/feed/{user_id}', [PostFeedController::class, 'commentsUserId'])->name('comments.feed.user_id');

Route::resource('posts', 'PostController')->only('show');
Route::resource('users', 'UserController')->only('show');

Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');
