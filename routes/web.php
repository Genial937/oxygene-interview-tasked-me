<?php

use App\Http\Controllers\admin\blogController;
use App\Http\Controllers\admin\collectionsController;
use App\Http\Controllers\admin\contactController;
use App\Http\Controllers\admin\dashboardController;
use App\Http\Controllers\admin\productsController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\auth\loginController;
use App\Http\Controllers\auth\logoutController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('login', loginController::class);
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function(){
        Route::get('dashboard',[dashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('blogs', blogController::class);
        Route::resource('contacts', contactController::class);
        Route::resource('users', userController::class);
        Route::resource('collections', collectionsController::class);
        Route::resource('products', productsController::class);
        Route::resource('logout', logoutController::class);
    });
});
