<?php

use App\Http\Controllers\MyTeamController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:Supervisor']], function () {
    Route::get( 'my-team/my-employees', [MyTeamController::class, 'myEmployees'])->name('my-team.my-employee');
    Route::get( 'my-team/my-employees-table', [MyTeamController::class, 'myEmployeesTable'])->name('my-team.my-employee-table');
    Route::get( 'my-team/shared-employees-table', [MyTeamController::class, 'sharedEmployeesTable'])->name('my-team.shared-employee-table');

    Route::get( 'my-team/performance-statistics', [MyTeamController::class, 'performanceStatistics'])->name('my-team.performance-statistics');
    Route::post('my-team/sync', [MyTeamController::class, 'syncGoals'])->name('my-team.sync-goals');
    Route::post('my-team/add-goal-to-library', [MyTeamController::class, 'addGoalToLibrary'])->name('my-team.add-goal-to-library');
    Route::get('users', [MyTeamController::class, 'userList'])->name('users-list');

    Route::post('my-team/share-profile', [MyTeamController::class, 'shareProfile'])->name('my-team.share-profile');
    Route::get('profile-shared-with/{user_id}', [MyTeamController::class, 'getProfileSharedWith'])->name('my-team.profile-shared-with');
    Route::post('profile-shared-with/{shared_profile_id}', [MyTeamController::class, 'updateProfileSharedWith'])->name('my-team.profile-shared-with.update');
    Route::get('my-team/direct-report/{id}', [MyTeamController::class, 'viewDirectReport'])->name('my-team.view-profile-as.direct-report');
});

Route::group(['middleware' => ['ViewAsPermission']], function () {
    Route::get('my-team/view-as/{id}', [MyTeamController::class, 'viewProfileAs'])->name('my-team.view-profile-as');
    Route::get('my-team/return-to-my-view', [MyTeamController::class, 'returnToMyProfile'])->name('my-team.return-to-my-view');
});