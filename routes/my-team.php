<?php

use App\Http\Controllers\GoalController;
use App\Http\Controllers\MyTeamController;
use App\Http\Controllers\MyTeamConversationController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['role:Supervisor']], function () {
    Route::get( 'my-team/my-employees', [MyTeamController::class, 'myEmployees'])->name('my-team.my-employee');
    Route::get( 'my-team/my-employees-table', [MyTeamController::class, 'myEmployeesTable'])->name('my-team.my-employee-table');
    Route::get( 'my-team/shared-employees-table', [MyTeamController::class, 'sharedEmployeesTable'])->name('my-team.shared-employee-table');

    Route::get('my-team/suggested-goals', [MyTeamController::class, 'showSugggestedGoals'])->name('my-team.suggested-goals');
    Route::get('my-team/suggested-goal/{id}', [GoalController::class, 'getSuggestedGoal'])->name('my-team.get-suggested-goal');
    Route::post('my-team/suggested-goal/{id}', [GoalController::class, 'updateSuggestedGoal'])->name('my-team.update-suggested-goal');

    Route::get( 'my-team/performance-statistics', [MyTeamController::class, 'performanceStatistics'])->name('my-team.performance-statistics');
    Route::post('my-team/sync', [MyTeamController::class, 'syncGoals'])->name('my-team.sync-goals');
    Route::post('my-team/add-goal-to-library', [MyTeamController::class, 'addGoalToLibrary'])->name('my-team.add-goal-to-library');
    Route::get('users', [MyTeamController::class, 'userList'])->name('users-list');

    Route::post('my-team/share-profile', [MyTeamController::class, 'shareProfile'])->name('my-team.share-profile');
    Route::get('profile-shared-with/{user_id}', [MyTeamController::class, 'getProfileSharedWith'])->name('my-team.profile-shared-with');
    Route::post('profile-shared-with/{shared_profile_id}', [MyTeamController::class, 'updateProfileSharedWith'])->name('my-team.profile-shared-with.update');
    Route::get('my-team/direct-report/{id}', [MyTeamController::class, 'viewDirectReport'])->name('my-team.view-profile-as.direct-report');
    Route::get('employee-excused/{user_id}', [MyTeamController::class, 'getProfileExcused'])->name('my-team.employee-excused');
    Route::post('employee-excused', [MyTeamController::class, 'updateExcuseDetails'])->name('excused.updateExcuseDetails');
    // Route::get('excused-reasons', [MyTeamController::class, 'getExcusedReason'])->name('ereasons');


    Route::prefix('my-team')->name('my-team.')->group(function() {
        Route::get('/conversations', [MyTeamConversationController::class, 'templates'])->name('conversations');
        Route::get('/conversations/upcoming', [MyTeamConversationController::class, 'index'])->name('conversations.upcoming');
        Route::post('/conversations/upcoming', [MyTeamConversationController::class, 'index'])->name('conversations.upcoming.filter');
        Route::get('/conversations/past', [MyTeamConversationController::class, 'index'])->name('conversations.past');
        Route::post('/conversations/past', [MyTeamConversationController::class, 'index'])->name('conversations.past.filter');
    });
});

Route::group(['middleware' => ['ViewAsPermission']], function () {
    Route::get('my-team/view-as/{id}', [MyTeamController::class, 'viewProfileAs'])->name('my-team.view-profile-as');
    Route::get('my-team/return-to-my-view', [MyTeamController::class, 'returnToMyProfile'])->name('my-team.return-to-my-view');

});
