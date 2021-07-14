<?php

use App\Http\Controllers\MyTeamController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:Supervisor']], function () {
    Route::get( 'my-team/my-employees', [MyTeamController::class, 'myEmployees'])->name('my-team.my-employee');
    Route::get( 'my-team/performance-statistics', [MyTeamController::class, 'performanceStatistics'])->name('my-team.performance-statistics');
    Route::post('my-team/sync', [MyTeamController::class, 'syncGoals'])->name('my-team.sync-goals');
});

Route::group(['middleware' => ['ViewAsPermission']], function () {
    Route::get('my-team/view-as/{id}', [MyTeamController::class, 'viewProfileAs'])->name('my-team.view-profile-as');
    Route::get('my-team/return-to-my-view', [MyTeamController::class, 'returnToMyProfile'])->name('my-team.return-to-my-view');
});