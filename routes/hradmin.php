<?php

use App\Http\Controllers\HRadminController;
use Illuminate\Support\Facades\Route;


Route::get('hradmin/myorg', [HRadminController::class, 'myorg'])->name('hradmin.myorg');
Route::get('hradmin/shared/shareemployee', [HRadminController::class, 'shareemployee'])->name('hradmin.shareemployee');
Route::get('hradmin/shared/manageshares', [HRadminController::class, 'manageshares'])->name('hradmin.manageshares');
Route::get('hradmin/excused/excuseemployee', [HRadminController::class, 'excuseemployee'])->name('hradmin.excuseemployee');
Route::get('hradmin/excused/manageexcused', [HRadminController::class, 'manageexcused'])->name('hradmin.manageexcused');
Route::get('hradmin/goals/addgoal', [HRadminController::class, 'addgoal'])->name('hradmin.addgoal');
Route::get('hradmin/goals/goal-bank', [HRadminController::class, 'addgoal'])->name('hradmin.goal-bank');
Route::get('hradmin/goals/managegoals', [HRadminController::class, 'managegoals'])->name('hradmin.managegoals');
Route::get('hradmin/goals/goal-edit/{id}', [HRadminController::class, 'goaledit'])->name('hradmin.goal-edit');
Route::post('hradmin/goals/goaladd', [HRadminController::class, 'goaladd'])->name('hradmin.goaladd');
Route::post('hradmin/goals/goalupdate/{id}', [HRadminController::class, 'goalupdate'])->name('hradmin.goalupdate');
Route::get('hradmin/notifications/createnotification', [HRadminController::class, 'createnotification'])->name('hradmin.createnotification');
Route::get('hradmin/notifications/viewnotifications', [HRadminController::class, 'viewnotifications'])->name('hradmin.viewnotifications');
Route::get('hradmin/statistics/goalsummary', [HRadminController::class, 'goalsummary'])->name('hradmin.goalsummary');
Route::get('hradmin/statistics/conversationsummary', [HRadminController::class, 'conversationsummary'])->name('hradmin.conversationsummary');
Route::get('hradmin/statistics/sharedsummary', [HRadminController::class, 'sharedsummary'])->name('hradmin.sharedsummary');
Route::get('hradmin/statistics/excusedsummary', [HRadminController::class, 'excusedsummary'])->name('hradmin.excusedsummary');


Route::get('hradmin/level0', 'App\Http\Controllers\HRadminController@getOrgLevel0')->name('hradmin.level0');
Route::get('hradmin/level1/{id0}', 'App\Http\Controllers\HRadminController@getOrgLevel1')->name('hradmin.level1');
Route::get('hradmin/level2/{id0}/{id1}', 'App\Http\Controllers\HRadminController@getOrgLevel2')->name('hradmin.level2');
Route::get('hradmin/level3/{id0}/{id1}/{id2}', 'App\Http\Controllers\HRadminController@getOrgLevel3')->name('hradmin.level3');
Route::get('hradmin/level4/{id0}/{id1}/{id2}/{id3}', 'App\Http\Controllers\HRadminController@getOrgLevel4')->name('hradmin.level4');
