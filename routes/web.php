<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;

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

//Route::view('/', 'home')->name('home');
Route::get('/',HomeController::class)->name('home');
Route::view('/about','about')->name('about');

Route::get('/portfolio', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/portfolio/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/portfolio/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
Route::patch('/portfolio/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::post('/portfolio', [ProjectController::class, 'store'])->name('projects.store');
Route::get('/portfolio/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::view('/contact','contact')->name('contact');
Route::post('contact', [MessageController::class, 'store'])->name('messages.store');

// Route::apiresource('projects',PortfolioController::class);
// Route::get('/', function () {
//     $nombre = "Gonzalo";
//     return view('home', compact('nombre'));
// })->name('home');