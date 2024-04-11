<?php

use App\Http\Controllers\Api\V1\UserMessengerController;
use App\Http\Controllers\Api\V1\PostLikeController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::middleware(['auth:api', 'verified'])->group(function () {
        // Comments
        Route::apiResource('comments', 'CommentController')->only('destroy');
        Route::apiResource('posts.comments', 'PostCommentController')->only('store');

        // Posts
        Route::apiResource('posts', 'PostController')->only(['update', 'store', 'destroy']);
        //        Route::post('artisan', 'PostController@artisan')->name('posts.artisan');
        Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes.store');
        Route::delete('/posts/{post}/likes', 'PostLikeController@destroy')->name('posts.likes.destroy');

        // Messengers Config
        Route::get('messenger/{userId}', [UserMessengerController::class, 'get'])->name('user.messenger.get');

        // Users
        Route::apiResource('users', 'UserController')->only('update');

        // Media
        Route::apiResource('media', 'MediaController')->only(['store', 'destroy']);
    });

    Route::post('/authenticate', 'Auth\AuthenticateController@authenticate')->name('authenticate');

    // Comments
    Route::apiResource('posts.comments', 'PostCommentController')->only('index');
    Route::apiResource('users.comments', 'UserCommentController')->only('index');
    Route::apiResource('comments', 'CommentController')->only(['index', 'show']);

    // Posts
    Route::apiResource('posts', 'PostController')->only(['index', 'show']);
    Route::apiResource('users.posts', 'UserPostController')->only('index');

    // Users
    Route::apiResource('users', 'UserController')->only(['index', 'show']);

    // Media
    Route::apiResource('media', 'MediaController')->only('index');
});


Route::get('job', [JobController::class, 'handle']);

Route::get('daily', [JobController::class, 'daily']);
