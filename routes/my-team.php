<?php

use App\Http\Controllers\MyTeamController;
use Illuminate\Support\Facades\Route;


Route::get( 'my-team/my-employees', [MyTeamController::class, 'myEmployees'])->name('my-team.my-employee');
Route::get( 'my-team/performance-statistics', [MyTeamController::class, 'performanceStatistics'])->name('my-team.performance-statistics');
Route::get( 'my-team/goals-hierarchy', [MyTeamController::class, 'goalsHierarchy'])->name('my-team.goals-hierarchy');