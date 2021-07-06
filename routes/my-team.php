<?php

use App\Http\Controllers\MyTeamController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:Supervisor']], function () {
    Route::get( 'my-team/my-employees', [MyTeamController::class, 'myEmployees'])->name('my-team.my-employee');
    Route::get( 'my-team/performance-statistics', [MyTeamController::class, 'performanceStatistics'])->name('my-team.performance-statistics');
});