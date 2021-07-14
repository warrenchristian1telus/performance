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

    

    Route::middleware(['ViewShare'])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth'])->name('dashboard');
        Route::middleware(['auth'])->group(function () {
            require __DIR__ . '/goal.php';
            require __DIR__ . '/conversation.php';
            require __DIR__ . '/my-team.php';
        });
    });

    Route::get('/my-performance', function () {
        return view('my-performance');
    })->middleware(['auth'])->name('my-performance');


    require __DIR__.'/auth.php';
