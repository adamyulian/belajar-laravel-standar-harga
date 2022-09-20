<?php

use App\Models\User;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {return view('welcome');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() { return view('home');})->name('home')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');

Route::resource('kodefikasi_aset', \App\Http\Controllers\KodefikasiAsetController::class)->middleware('auth');

Route::resource('kodefikasi_rekening_belanja', \App\Http\Controllers\KodefikasiRekeningBelanjaController::class)->middleware('auth');

Route::resource('satuan', \App\Http\Controllers\SatuanController::class)->middleware('auth');

Route::resource('shs', \App\Http\Controllers\ShsController::class)->middleware('auth');
Route::resource('hspk', \App\Http\Controllers\HspkController::class)->middleware('auth');

Route::resource('tambah_usulan', \App\Http\Controllers\TambahUsulanController::class)->middleware('auth');

Route::resource('usulan_hspk', \App\Http\Controllers\UsulanHspkController::class)->middleware('auth');

Route::get('users/{users:perangkat_daerah}', function (user $user) {return view('user',['username'=> $user->username,'perangkat_daerah' => $user->perangkat_daerah]);});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

