<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post('/posts',  [PostController::class, 'store']);
    Route::get('/posts/create',  [PostController::class, 'create'])->name('create');
    Route::get('/posts/friend',  [PostController::class, 'friendtime']);
    Route::get('/posts/{post}',  [PostController::class, 'show']);
    Route::delete('/posts/{post}',  [PostController::class, 'delete']);
    Route::get('/posts/friend',  [PostController::class, 'friendtime'])->name('friend');
    Route::get('/users/profile',  [UserController::class, 'profile']);
    Route::get('/users/my_profile',  [UserController::class, 'my_profile'])->name('my_profile');
    Route::post('/users/{user}/follow',  [UserController::class, 'follow']);
    Route::get('/users/search',  [UserController::class, 'search']);
    Route::delete('/users/{user}/unfollow',  [UserController::class, 'unfollow'])->name('unfollow');
    Route::put('/users/goal_time_set/{user}',  [UserController::class, 'goal_time_set']);
    Route::post('/posts/comment',   [PostController::class, 'comment'])->name('comment');
    Route::get('/like/{id}', [LikeController::class, 'like']);
    Route::get('/unlike/{id}', [LikeController::class, 'unlike']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
