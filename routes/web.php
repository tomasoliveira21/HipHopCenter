<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HipHopCenterController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicaController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\PDFController;


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
   
    return view('index');
});













Route::get('/autenticacao',[HipHopCenterController::class,'autenticacao'])->name('autenticacao');
Route::get('/homepage',[HomeController::class,'homepage'])->name('home')->middleware('last_user_activity');
//->middleware('verified');
Route::get('/pagamentos',[HomeController::class,'pagamentos'])->name('pagamentos');
Route::get('/artistas',[HomeController::class,'artistas'])->name('artistas');
Route::get('/searchpage',[HomeController::class,'search'])->name('search');
Route::get('/yourmusic',[HomeController::class,'music'])->name('yourmusic');
Route::get('/adminpage',[AdminController::class,'adminpage'])->name('adminpage');

Auth::routes(['verify' => true]);

Route::get('/usersOnline',[UserController::class,'userOnlineStatus'])->name('usersOnline')->middleware('last_user_activity');
Route::get('/users', [UserController::class,'index'])->name('users.index')->middleware('is_admin');
Route::get('/users/create', [UserController::class,'create'])->name('users.create')->middleware('is_admin');
Route::post('/users', [UserController::class,'store'])->name('users.store')->middleware('is_admin');
Route::get('/users/{user}', [UserController::class,'show'])->name('users.show')->middleware('is_admin');
Route::get('/users/{user}/edit', [UserController::class,'edit'])->name('users.edit')->middleware('is_admin');
Route::put('/users/{user}', [UserController::class,'update'])->name('users.update')->middleware('is_admin');
Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy')->middleware('is_admin');


Route::get('/artists', [ArtistController::class,'index'])->name('artists.index');
Route::get('/artists/create', [ArtistController::class,'create'])->name('artists.create')->middleware('is_admin');
Route::post('/artists', [ArtistController::class,'store'])->name('artists.store')->middleware('is_admin');
Route::get('/artists/{artist}', [ArtistController::class,'show'])->name('artists.show');
Route::get('/artists/{artist}/edit', [ArtistController::class,'edit'])->name('artists.edit')->middleware('is_admin');
Route::put('/artists/{artist}', [ArtistController::class,'update'])->name('artists.update')->middleware('is_admin');
Route::delete('/artists/{artist}', [ArtistController::class,'destroy'])->name('artists.destroy')->middleware('is_admin');


Route::get('/musicas', [MusicaController::class,'index'])->name('musicas.index');
Route::get('/musicas/create', [MusicaController::class,'create'])->name('musicas.create')->middleware('is_admin');
Route::post('/musicas', [MusicaController::class,'store'])->name('musicas.store')->middleware('is_admin');
Route::get('/musicas/{musica}', [MusicaController::class,'show'])->name('musicas.show');
Route::get('/musicas/{musica}/edit', [MusicaController::class,'edit'])->name('musicas.edit')->middleware('is_admin');
Route::put('/musicas/{musica}', [MusicaController::class,'update'])->name('musicas.update')->middleware('is_admin');
Route::delete('/musicas/{musica}', [MusicaController::class,'destroy'])->name('musicas.destroy')->middleware('is_admin');
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/playlists/{playlist}/add', [PlaylistController::class,'add'])->name('playlists.add');

Route::get('/playlists/{playlist}/associate', [PlaylistController::class,'associate'])->name('playlists.associate');

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('/playlists', [PlaylistController::class,'index'])->name('playlists.index');
Route::get('/playlists/create', [PlaylistController::class,'create'])->name('playlists.create')->middleware('is_premium');
Route::post('/playlists', [PlaylistController::class,'store'])->name('playlists.store');
Route::get('/playlists/{playlist}', [PlaylistController::class,'show'])->name('playlists.show');
Route::get('/playlists/{playlist}/play', [PlaylistController::class,'play'])->name('playlists.play');
Route::get('/playlists/{playlist}/edit', [PlaylistController::class,'edit'])->name('playlists.edit');
Route::put('/playlists/{playlist}', [PlaylistController::class,'update'])->name('playlists.update');
Route::delete('/playlists/{playlist}', [PlaylistController::class,'destroy'])->name('playlists.destroy');


Route::get('/albuns', [AlbumController::class,'index'])->name('albuns.index');
Route::get('/albuns/create', [AlbumController::class,'create'])->name('albuns.create')->middleware('is_admin');
Route::post('/albuns', [AlbumController::class,'store'])->name('albuns.store')->middleware('is_admin');
Route::get('/albuns/{album}', [AlbumController::class,'show'])->name('albuns.show');
Route::get('/albuns/{album}/edit', [AlbumController::class,'edit'])->name('albuns.edit')->middleware('is_admin');
Route::put('/albuns/{album}', [AlbumController::class,'update'])->name('albuns.update')->middleware('is_admin');
Route::delete('/albuns/{album}', [AlbumController::class,'destroy'])->name('albuns.destroy')->middleware('is_admin');


Route::get('/generos', 'App\Http\Controllers\GeneroController@index')->name('generos.index');
Route::get('/generos/create', 'App\Http\Controllers\GeneroController@create')->name('generos.create')->middleware('is_admin');
Route::post('/generos', 'App\Http\Controllers\GeneroController@store')->name('generos.store')->middleware('is_admin');
Route::get('/generos/{genero}', 'App\Http\Controllers\GeneroController@show')->name('generos.show');
Route::get('/generos/{genero}/edit', 'App\Http\Controllers\GeneroController@edit')->name('generos.edit')->middleware('is_admin');
Route::put('/generos/{genero}', 'App\Http\Controllers\GeneroController@update')->name('generos.update')->middleware('is_admin');
Route::delete('/generos/{genero}', 'App\Http\Controllers\GeneroController@destroy')->name('generos.destroy')->middleware('is_admin');


Route::get('generate-pdf', [PDFController::class, 'generatePDF']);     //only admins to generate pdf's