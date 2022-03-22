<?php

use App\Http\Controllers\SysadminController;
use Illuminate\Support\Facades\Route;


Route::get('sysadmin/employees/current', [SysadminController::class, 'current'])->name('sysadmin.currentemployees');
Route::get('sysadmin/employees/previous', [SysadminController::class, 'previous'])->name('sysadmin.previousemployees');
Route::get('sysadmin/shared/shareemployee', [SysadminController::class, 'shareemployee'])->name('sysadmin.shareemployee');
Route::get('sysadmin/shared/manageshares', [SysadminController::class, 'manageshares'])->name('sysadmin.manageshares');
Route::get('sysadmin/excused/excuseemployee', [SysadminController::class, 'excuseemployee'])->name('sysadmin.excuseemployee');
Route::get('sysadmin/excused/manageexcused', [SysadminController::class, 'manageexcused'])->name('sysadmin.manageexcused');
Route::get('sysadmin/goals/addgoal', [SysadminController::class, 'addgoal'])->name('sysadmin.addgoal');
Route::get('sysadmin/goals/goal-bank', [SysadminController::class, 'addgoal'])->name('sysadmin.goal-bank');
Route::get('sysadmin/goals/managegoals', [SysadminController::class, 'managegoals'])->name('sysadmin.managegoals');
Route::get('sysadmin/goals/goal-edit/{id}', [SysadminController::class, 'goaledit'])->name('sysadmin.goal-edit');
Route::post('sysadmin/goals/goaladd', [SysadminController::class, 'goaladd'])->name('sysadmin.goaladd');
Route::post('sysadmin/goals/goalupdate/{id}', [SysadminController::class, 'goalupdate'])->name('sysadmin.goalupdate');
Route::get('sysadmin/unlock/unlockconversation', [SysadminController::class, 'unlockconversation'])->name('sysadmin.unlockconversation');
Route::get('sysadmin/unlock/manageunlocked', [SysadminController::class, 'manageunlocked'])->name('sysadmin.manageunlocked');
Route::get('sysadmin/notifications/createnotification', [SysadminController::class, 'createnotification'])->name('sysadmin.createnotification');
Route::get('sysadmin/notifications/viewnotifications', [SysadminController::class, 'viewnotifications'])->name('sysadmin.viewnotifications');
Route::get('sysadmin/access/createaccess', [SysadminController::class, 'createaccess'])->name('sysadmin.createaccess');
Route::get('sysadmin/access/manageaccess', [SysadminController::class, 'manageaccess'])->name('sysadmin.manageaccess');
Route::get('sysadmin/statistics/goalsummary', [SysadminController::class, 'goalsummary'])->name('sysadmin.goalsummary');
Route::get('sysadmin/statistics/conversationsummary', [SysadminController::class, 'conversationsummary'])->name('sysadmin.conversationsummary');
Route::get('sysadmin/statistics/sharedsummary', [SysadminController::class, 'sharedsummary'])->name('sysadmin.sharedsummary');
Route::get('sysadmin/statistics/excusedsummary', [SysadminController::class, 'excusedsummary'])->name('sysadmin.excusedsummary');



Route::get('sysadmin/level0', 'App\Http\Controllers\SysadminController@getOrgLevel0')->name('sysadmin.level0');
Route::get('sysadmin/level1/{id0}', 'App\Http\Controllers\SysadminController@getOrgLevel1')->name('sysadmin.level1');
Route::get('sysadmin/level2/{id0}/{id1}', 'App\Http\Controllers\SysadminController@getOrgLevel2')->name('sysadmin.level2');
Route::get('sysadmin/level3/{id0}/{id1}/{id2}', 'App\Http\Controllers\SysadminController@getOrgLevel3')->name('sysadmin.level3');
Route::get('sysadmin/level4/{id0}/{id1}/{id2}/{id3}', 'App\Http\Controllers\SysadminController@getOrgLevel4')->name('sysadmin.level4');
