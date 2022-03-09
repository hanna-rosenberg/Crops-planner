<?php

use App\Http\Controllers\AddCropsToFieldController;
use App\Http\Controllers\CreateFieldController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DislikesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RemoveCropsFromFieldController;
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

Route::view('/', 'index');
Route::post('login', LoginController::class)->middleware('guest');
Route::get('dashboard', DashboardController::class)->middleware('auth');
Route::get('logout', LogoutController::class);
Route::post('field', CreateFieldController::class)->middleware('auth');
//Oklart om 'store ska vara med nedan
Route::post('add-crop', AddCropsToFieldController::class)->middleware('auth');
Route::get('remove-crop/{field}/{crop}', RemoveCropsFromFieldController::class)->name('remove');
Route::get('dislikes/{field_id}', DislikesController::class)->middleware('auth');
