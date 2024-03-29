<?php

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {

        if (auth()->user()->role == 0) {
            return view('superadmin.dashboard');
        } else if(auth()->user()->role == 1) {
            return view('admin.dashboard');
        } else {
            return view('dashboard');
        }
    })->name('dashboard');
});
