<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FlutterwaveController;
//use App\Http\Controllers\PaymentController;

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

Route::get('/', [WelcomeController::class, 'index']);

Route::get('/display', function () {
    return view('display');
});

Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);

Route::post('/preview', [OrderController::class, 'preview']);

Route::group(['middleware' => ['auth']], function(){

Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
Route::get('/countries', [App\Http\Controllers\CountryController::class, 'index'])->name('dashboard.countries');
Route::post('/add_country', [App\Http\Controllers\CountryController::class, 'enterCountry']);
Route::get('/edit_country/{id}', [App\Http\Controllers\CountryController::class, 'show']);
Route::patch('/update_country/{id}', [App\Http\Controllers\CountryController::class, 'update']);
Route::delete('/delete_country/{id}', [App\Http\Controllers\CountryController::class, 'destroy']);

Route::get('/transport_mode', [App\Http\Controllers\TransportModeController::class, 'index'])->name('dashboard.transport_modes');
Route::post('/add_mode', [App\Http\Controllers\TransportModeController::class, 'enter']);
Route::get('/edit_mode/{id}', [App\Http\Controllers\TransportModeController::class, 'show']);
Route::patch('/update_mode/{id}', [App\Http\Controllers\TransportModeController::class, 'update']);
Route::delete('/delete_mode/{id}', [App\Http\Controllers\TransportModeController::class, 'destroy']);


Route::get('/weights', [App\Http\Controllers\WeightController::class, 'index'])->name('dashboard.weights');
Route::post('/add_weight', [App\Http\Controllers\WeightController::class, 'enterweight']);
Route::get('/edit_weight/{id}', [App\Http\Controllers\WeightController::class, 'show']);
Route::patch('/update_weight/{id}', [App\Http\Controllers\WeightController::class, 'update']);
Route::delete('/delete_weight/{id}', [App\Http\Controllers\WeightController::class, 'destroy']);
});
require __DIR__.'/auth.php';
