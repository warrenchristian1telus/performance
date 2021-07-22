<?php

use App\Http\Controllers\ResourcesController;
use Illuminate\Support\Facades\Route;

Route::get('resources/user-guide', [ResourcesController::class, 'userguide'])->name('resources.user-guide');
Route::get('resources/goal-setting', [ResourcesController::class, 'goalsetting'])->name('resources.goal-setting');
Route::get('resources/conversations', [ResourcesController::class, 'conversations'])->name('resources.conversations');
Route::get('resources/contact', [ResourcesController::class, 'contact'])->name('resources.contact');
