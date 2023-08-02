<?php

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');


Route::prefix('items')->group(function () {
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::delete('/{item}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');
    Route::get('/{item}/deepdive', [App\Http\Controllers\ItemController::class, 'deepDive'])->name('items.deepdive');
    Route::post('/{item}/deepdive', [App\Http\Controllers\ItemController::class, 'submitDeepDive'])->name('items.deepdive.submit');
    Route::get('/{item}/deepdive/show', [App\Http\Controllers\ItemController::class, 'showDeepDive'])->name('items.deepdive.show');
    Route::get('/{item}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
    Route::put('/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
    
    Route::get('/search', [App\Http\Controllers\ItemController::class, 'searchForm'])->name('items.search.form');
    Route::get('/search_result', [App\Http\Controllers\ItemController::class, 'search'])->name('items.search_result');

    
});

Route::get('/items/{item}/deepdive/show', [App\Http\Controllers\ItemController::class, 'showDeepDive'])->name('items.deepdive.show');

Route::get('/dashboard', function () {
    return view('dashboard');
});




