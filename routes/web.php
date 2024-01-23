<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WelcomeController;



// Route guest ( belum login )
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index');
    Route::get('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
    Route::post('/forgot-password', [AuthController::class, 'forgot_password']);
    Route::get('/reset/{token}', [AuthController::class, 'reset'])->name('reset');
    Route::post('/reset/{token}', [AuthController::class, 'post_reset']);
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

// Route yg udah login
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/materi/{parent_id}', [HomeController::class, 'materi'])->name('materi');
    Route::get('/tools', [HomeController::class, 'tools'])->name('tools');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// Route admin
Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AuthController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile/update', [AuthController::class, 'updateProfile'])->name('admin.profile.update');
    Route::resource('/admin/mapel', \App\Http\Controllers\MapelController::class);
    Route::resource('/admin/materi', \App\Http\Controllers\MateriController::class);
    Route::resource('/admin/tool', \App\Http\Controllers\ToolController::class);
    Route::resource('/admin/user', \App\Http\Controllers\UserController::class);
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
});


// Route Error page
Route::fallback(function () {
    return view('errors.404');
})->name('notfound');
