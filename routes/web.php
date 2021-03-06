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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Admin Route */
Route::group([ 'as' => 'admin.','prefix' => 'admin', 'middleware' => ['auth','admin']],
function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('tag', App\Http\Livewire\Admin\Tags::class)->name('tag');
});



/* Author Route */
Route::group([ 'as' => 'author.','prefix' => 'author', 'middleware' => ['auth','author']],
function(){
    Route::get('dashboard', [App\Http\Controllers\Author\DashboardController::class, 'index'])->name('dashboard');
});
