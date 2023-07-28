<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/empresa', 'empresa')->name('empresa');
Route::get('/servicios', [ServiceController::class, 'services'])->name('servicios');
Route::get('/servicios/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/obras', [JobController::class, 'jobs'])->name('obras');
Route::get('/obras/{job:slug}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/blog', [PostController::class, 'posts'])->name('blog');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::view('/contacto', 'contacto')->name('contacto');

Route::post('/images', [ImageController::class, 'store'])->name('images.store');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');
    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
});


Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/services', ServiceController::class);
    Route::resource('/jobs', JobController::class);
    Route::resource('/posts', PostController::class);

    Route::post('/images', [ImageController::class, 'store'])->name('images.store');


});
