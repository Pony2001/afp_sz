<?php

use App\Http\Controllers; //a nevteret ele kell irni ami: Controllers\
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    //
});


Route::get('/', [Controllers\MainController::class, 'main']);
Route::post('getCities', [Controllers\CityController::class, 'getCities'])->name('getCities');



//Route::get('/results', [Controllers\ResultsController::class, 'results']);
//Route::get('/results', [Controllers\ResultsController::class,  'store', 'search']);
Route::get('/results', [Controllers\PaginationController::class, 'search']);

Route::get('/profile/{id}', [Controllers\ProfileController::class, 'edit_function']);


Route::post('/admin', [Controllers\AdminController::class, 'admin']);
Route::get('/admin', [Controllers\AdminController::class, 'admin']);
Route::get('/login', [Controllers\LoginController::class, 'login']);
