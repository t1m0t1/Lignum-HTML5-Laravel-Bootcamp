<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use App\Http\Livewire\Movie\ListMovies;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
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
    return redirect('home');
});

/* Route::get('/', function () {
    return view('home', ['movies'=> Movie::all()]);
}); */
/* Routes Views */
Route::get('/movieLaravel', [MovieController::class, 'index']);
Route::get('/movieLivewire', ListMovies::class);
Route::resource('actor', ActorController::class);
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* Auth Route */
Auth::routes();

/* Routes Movie */
Route::get('/movie/{id}' , [MovieController::class, 'searchMovie']);

/* Routes Favorites */
Route::post('/addToFavorites', [FavoritesController::class, 'addToFavorites']);
Route::get('/favorites', [FavoritesController::class, 'index']);

/* Routes Cast */
Route::post('/addCast/{movieID}/{actorID}', [CastController::class, 'addCast']);
Route::get('/searchCast/{movieID}', [CastController::class, 'searchCast']);
Route::delete('/deleteActorToCast/{movieID}/{actorID}', [CastController::class, 'deleteActorToCast']);