<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardWorkorderController;
use App\Http\Controllers\WorkorderController;
use Illuminate\Support\Facades\Route;

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
    return view('home',[
        "title" => "Home",
    ]);
});

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
    ]);
});


// Route::get('/login',[AuthController::class,'index'])->name('login')->middleware('guest');

Route::get('/login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/logout',[AuthController::class,'logout']);

Route::get('/dashboard',[DashboardController::class,'index'])->middleware('auth');

Route::resource('/dashboard/workorder',DashboardWorkorderController::class)->middleware('auth');

Route::resource('/workorder',WorkorderController::class);
