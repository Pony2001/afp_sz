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



// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';



// Route::get('/', function () {
//     //
// });


Route::get('/', [Controllers\MainController::class, 'main']);
Route::get('getCities', [Controllers\CityController::class, 'getCities'])->name('getCities');
Route::post('getCities', [Controllers\CityController::class, 'getCitiesByCountyId']);

//Route::get('/results', [Controllers\ResultsController::class, 'results']);
//Route::get('/results', [Controllers\ResultsController::class,  'store', 'search']);
Route::get('/results', [Controllers\PaginationController::class, 'search']);
Route::get('/profile/{id}', [Controllers\ProfileController::class, 'edit_function']);
Route::middleware('auth')->group(function () {
    Route::post('/profile/success', [Controllers\ProfileController::class, 'create_comment'])->name('comment.create');
});



Route::post('/admin', [Controllers\AdminController::class, 'admin'])->name('admin');
//Route::get('/admin', [Controllers\AdminController::class, 'admin']);
Route::get('/admin/{id}', [Controllers\AdminController::class, 'delete'])->name('employee.delete');

//Route::get('login', [Controllers\LoginController::class, 'login'])->name('login');

Route::get('/insert/{id}/{field_id}', [Controllers\InsertController::class, 'edit_function']);
Route::get('/insert/{id}/{field_id}/edit', [Controllers\InsertController::class, 'update_button'])->name('employee.update');
//Route::post('/insert/{id}', [Controllers\InsertController::class, 'update_button'])->name('employee.update');

Route::get('/create', [Controllers\CreateController::class, 'create']);
Route::post('/create', [Controllers\CreateController::class, 'create']);
Route::post('/create/success', [Controllers\CreateController::class, 'created'])->name('employee.create');
