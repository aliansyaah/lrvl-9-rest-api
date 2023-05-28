<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthenticationController::class, 'login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('logout', [AuthenticationController::class, 'logout']);
    Route::get('logged-in-user', [AuthenticationController::class, 'loggedInUser']);
   
    Route::post('posts', [PostController::class, 'store']);
    Route::patch('posts/{id}', [PostController::class, 'update'])->middleware('post.owner');
    Route::delete('posts/{id}', [PostController::class, 'destroy'])->middleware('post.owner');

    Route::post('comment', [CommentController::class, 'store']);
    Route::patch('comment/{id}', [CommentController::class, 'update'])->middleware('comment.owner');
});

Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);
