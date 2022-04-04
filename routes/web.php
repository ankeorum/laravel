<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

//App::setlocale('es');

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

//Add this listener to check queries generated to load pages when in develop, not in production
DB::listen(function($query) {
    // var_dump($query->sql);
});
//Route::view('/', 'home')->name('home');
Route::view('/','home')->name('home');
Route::view('/about','about')->name('about');


Route::resource('portfolio', ProjectController::class)
    ->names('projects')
    ->parameters(['portfolio' => 'project']);

Route::patch('portfolio/{project}/restore', [ProjectController::class, 'restore'])->name('projects.restore');
Route::delete('portfolio/{project}/forceDelete', [ProjectController::class, 'forceDelete'])->name('projects.forceDelete');


Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::view('/contact','contact')->name('contact');
Route::post('contact', )->name('messages.store');

// Route::apiresource('projects',PortfolioController::class);
// Route::get('/', function () {
//     $nombre = "Gonzalo";
//     return view('home', compact('nombre'));
// })->name('home');
Auth::routes(['register' => false]);