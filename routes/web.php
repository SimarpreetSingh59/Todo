<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;

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
    return view('welcome');
});

// Route::middleware(['logedin'])->group(

// );

Route::resource('posts', PostController::class);

Route::resource('products', ProductController::class)->middleware('logedin');

Route::get('/register', [RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);