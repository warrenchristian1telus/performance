<?php

use App\Http\Controllers\POCController;
use Illuminate\Support\Facades\Route;

Route::get('poc/bidashboard', [POCController::class, 'bidashboard'])->name('poc.bidashboard');
