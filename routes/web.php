<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagesController;

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
Route::view('/contact','contact')->name('contact');

Route::post('contact', [MessagesController::class, 'store']);
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Route::apiresource('projects',PortfolioController::class);
// Route::get('/', function () {
//     $nombre = "Gonzalo";
//     return view('home', compact('nombre'));
// })->name('home');