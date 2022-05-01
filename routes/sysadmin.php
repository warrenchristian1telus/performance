<?php

use App\Http\Controllers\SysadminController;
use App\Http\Controllers\CurrentEmployeesController;
use App\Http\Controllers\HRadminController;
use App\Http\Controllers\PastEmployeesController;
use App\Http\Controllers\ManageExistingAccessController;
use App\Http\Controllers\ManageExistingSharesController;
use App\Http\Controllers\ManageExistingExcusedController;
use App\Http\Controllers\ManageGoalBankController;
use App\Http\Controllers\SysAdmin\UnlockConversationController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['role:Sys Admin']], function () {


    // Route::get('/hradmin/org-organizations', [HRadminController::class,'getOrganizations']);
// Route::get('/hradmin/org-programs', [HRadminController::class,'getPrograms']);
// Route::get('/hradmin/org-divisions', [HRadminController::class,'getDivisions']);
// Route::get('/hradmin/org-branches', [HRadminController::class,'getBranches']);
// Route::get('/hradmin/org-level4', [HRadminController::class,'getLevel4']);

Route::get('sysadmin/employees/currentemployees', [CurrentEmployeesController::class, 'index'])->name('sysadmin.employees.currentemployees');
Route::get('sysadmin/employees/currentemployeeslist', [CurrentEmployeesController::class, 'getList'])->name('sysadmin.employees.currentemployeeslist');
Route::post('sysadmin/employees/currentemployees', [CurrentEmployeesController::class, 'index'])->name('sysadmin.employees.currentemployees');

Route::get('sysadmin/employees/pastemployees', [PastEmployeesController::class, 'index'])->name('sysadmin.employees.pastemployees');
Route::get('sysadmin/employees/pastemployeeslist', [PastEmployeesController::class, 'getList'])->name('sysadmin.employees.pastemployeeslist');
Route::post('sysadmin/employees/pastemployees', [PastEmployeesController::class, 'index'])->name('sysadmin.employees.pastemployees');

Route::get('sysadmin/shared/shareemployee', [SysadminController::class, 'shareemployee'])->name('sysadmin.shared.shareemployee');

Route::get('sysadmin/shared/manageexistingshares', [ManageExistingSharesController::class, 'index'])->name('sysadmin.shared.manageexistingshares');
Route::get('sysadmin/employees/manageexistingshareslist', [ManageExistingSharesController::class, 'getList'])->name('sysadmin.employees.manageexistingshareslist');
Route::post('sysadmin/shared/manageexistingshares', [ManageExistingSharesController::class, 'index'])->name('sysadmin.shared.manageexistingshares');

Route::get('sysadmin/excused/excuseemployee', [SysadminController::class, 'excuseemployee'])->name('sysadmin.excused.excuseemployee');

Route::get('sysadmin/excused/manageexistingexcused', [ManageExistingExcusedController::class, 'index'])->name('sysadmin.excused.manageexistingexcused');
Route::get('sysadmin/excused/manageexistingexcusedlist', [ManageExistingExcusedController::class, 'getList'])->name('sysadmin.excused.manageexistingexcusedlist');
Route::post('sysadmin/excused/manageexistingexcused', [ManageExistingExcusedController::class, 'index'])->name('sysadmin.excused.manageexistingexcused');

Route::get('sysadmin/goals/managegoalbank', [ManageGoalBankController::class, 'index'])->name('sysadmin.goals.managegoalbank');
Route::post('sysadmin/goals/managegoalbank', [ManageGoalBankController::class, 'index'])->name('sysadmin.goals.managegoalbank');
Route::get('sysadmin/goals/managegoalbanklist', [ManageGoalBankController::class, 'getList'])->name('sysadmin.goals.managegoalbanklist');



Route::get('sysadmin/goals/addgoal', [SysadminController::class, 'addgoal'])->name('sysadmin.goals.addgoal');
Route::get('sysadmin/goals/goal-bank', [SysadminController::class, 'addgoal'])->name('sysadmin.goals.goal-bank');
// Route::get('sysadmin/goals/managegoals', [SysadminController::class, 'managegoals'])->name('sysadmin.goals.managegoals');
Route::get('sysadmin/goals/goal-edit/{id}', [SysadminController::class, 'goaledit'])->name('sysadmin.goals.goal-edit');
Route::post('sysadmin/goals/goaladd', [SysadminController::class, 'goaladd'])->name('sysadmin.goals.goaladd');
Route::post('sysadmin/goals/goalupdate/{id}', [SysadminController::class, 'goalupdate'])->name('sysadmin.goal.goalupdate');


Route::group(['middleware' => ['auth']], function() 
{    
    Route::get('/sysadmin/unlock/unlockconversation', [UnlockConversationController::class, 'index'])->name('sysadmin.unlock.unlockconversation');
    Route::post('/sysadmin/unlock/unlockconversation', [UnlockConversationController::class, 'index'])->name('sysadmin.unlock.unlockconversation.search');
    Route::get('/sysadmin/unlock/locked-conversation-list', [UnlockConversationController::class, 'getDatatableConversations'])->name('sysadmin.unlock.lockedconversation.list');
    Route::put('/sysadmin/unlock/unlockconversation/{id}', [UnlockConversationController::class, 'update'])->name('sysadmin.unlock.unlockconversation.store');
    Route::get('/sysadmin/unlock/manageunlocked', [UnlockConversationController::class, 'indexManageUnlocked'])->name('sysadmin.unlock.manageunlocked');
    Route::post('/sysadmin/unlock/manageunlocked', [UnlockConversationController::class, 'indexManageUnlocked'])->name('sysadmin.unlock.manageunlocked.search');
    Route::get('/sysadmin/unlock/unlocked-conversation-list', [UnlockConversationController::class, 'getDatatableManagedUnlocked'])->name('sysadmin.unlock.unlockconversation.list');
});


Route::get('sysadmin/notifications/createnotification', [SysadminController::class, 'createnotification'])->name('sysadmin.notifications.createnotification');
Route::get('sysadmin/notifications/viewnotifications', [SysadminController::class, 'viewnotifications'])->name('sysadmin.notifications.viewnotifications');



Route::get('sysadmin/access/createaccess', [SysadminController::class, 'createaccess'])->name('sysadmin.access.createaccess');

// Route::get('sysadmin/access/manageaccess', [ManageExistingAccessController::class, 'manageaccess'])->name('sysadmin.access.manageaccess');
Route::get('sysadmin/access/manageexistingaccess', [ManageExistingAccessController::class, 'index'])->name('sysadmin.access.manageexistingaccess');
Route::post('sysadmin/access/manageexistingaccess/{id}', [ManageExistingAccessController::class, 'update'])->name('sysadmin.access.manageexistingaccessupdate');
Route::get('sysadmin/access/manageexistingaccesslist', [ManageExistingAccessController::class, 'getList'])->name('sysadmin.access.manageexistingaccesslist');
Route::get('sysadmin/access/accessedit/{id}', [ManageExistingAccessController::class, 'edit'])->name('sysadmin.access.accessedit');
Route::post('sysadmin/access/accessupdate/{id}', [ManageExistingAccessController::class, 'update'])->name('sysadmin.access.accessupdate');



Route::get('sysadmin/statistics/goalsummary', [SysadminController::class, 'goalsummary'])->name('sysadmin.statistics.goalsummary');
Route::get('sysadmin/statistics/conversationsummary', [SysadminController::class, 'conversationsummary'])->name('sysadmin.statistics.conversationsummary');
Route::get('sysadmin/statistics/sharedsummary', [SysadminController::class, 'sharedsummary'])->name('sysadmin.statistics.sharedsummary');
Route::get('sysadmin/statistics/excusedsummary', [SysadminController::class, 'excusedsummary'])->name('sysadmin.statistics.excusedsummary');
Route::get('sysadmin/switch-identity', [SysadminController::class, 'switchIdentity'])->name('sysadmin.switch-identity');


Route::get('sysadmin/level0', 'App\Http\Controllers\SysadminController@getOrgLevel0')->name('sysadmin.level0');
Route::get('sysadmin/level1/{id0}', 'App\Http\Controllers\SysadminController@getOrgLevel1')->name('sysadmin.level1');
Route::get('sysadmin/level2/{id0}/{id1}', 'App\Http\Controllers\SysadminController@getOrgLevel2')->name('sysadmin.level2');
Route::get('sysadmin/level3/{id0}/{id1}/{id2}', 'App\Http\Controllers\SysadminController@getOrgLevel3')->name('sysadmin.level3');
Route::get('sysadmin/level4/{id0}/{id1}/{id2}/{id3}', 'App\Http\Controllers\SysadminController@getOrgLevel4')->name('sysadmin.level4');



});
