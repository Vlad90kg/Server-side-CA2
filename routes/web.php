<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpotifyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get('/', [PagesController::class, 'index']);

Route::resource('/blog', PostsController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::middleware(['web'])->group(function () {
    Route::get('/spotify/auth', [SpotifyController::class, 'auth'])->name('spotify.auth');
    Route::get('/spotify/callback', [SpotifyController::class, 'callback'])->name('spotify.callback');
    Route::middleware(['auth'])->group(function () {

        Route::middleware(['auth', 'spotify.token'])->group(function () {
            Route::get('/spotify/search', [SpotifyController::class, 'search'])->name('spotify.search');
        });

        Route::get('/spotify/playlists', [SpotifyController::class, 'playlists'])->name('spotify.playlists');
        Route::get('/spotify/playlist/{id}', [SpotifyController::class, 'playlist'])->name('spotify.playlist.show');
        Route::post('/spotify/playlist', [SpotifyController::class, 'createPlaylist'])->name('spotify.playlist.create');
    });
});
Route::middleware(['web', 'auth', 'spotify.token'])->group(function () {
    Route::get('/spotify/playlists', [SpotifyController::class, 'playlists'])->name('spotify.playlists');
    Route::get('/spotify/playlist/{id}', [SpotifyController::class, 'playlist'])->name('spotify.playlist.show');

    Route::match(['get', 'post'], '/spotify/playlist/create', [SpotifyController::class, 'createPlaylist'])->name('spotify.playlist.create');
});
