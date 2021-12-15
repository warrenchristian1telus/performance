<?php

use App\Http\Controllers\POCController;
use Illuminate\Support\Facades\Route;

Route::get('poc/bidashboard', [POCController::class, 'bidashboard'])->name('poc.bidashboard');
Route::get('poc/odstest', [POCController::class, 'odstest'])->name('poc.odstest');
Route::get('poc/odstest2', [POCController::class, 'odstest2'])->name('poc.odstest2');
