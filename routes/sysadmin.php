<?php

use App\Http\Controllers\SysadminController;
use Illuminate\Support\Facades\Route;


Route::get('sysadmin/myorg', [SysadminController::class, 'myorg'])->name('sysadmin.myorg');
Route::get('sysadmin/statistics', [SysadminController::class, 'statistics'])->name('sysadmin.statistics');
Route::get('sysadmin/goal-bank', [SysadminController::class, 'goalbank'])->name('sysadmin.goal-bank');
Route::get('sysadmin/goal-edit/{id}', [SysadminController::class, 'goaledit'])->name('sysadmin.goal-edit');
Route::post('sysadmin/goaladd', [SysadminController::class, 'goaladd'])->name('sysadmin.goaladd');
Route::post('sysadmin/goalupdate/{id}', [SysadminController::class, 'goalupdate'])->name('sysadmin.goalupdate');
Route::get('sysadmin/shared', [SysadminController::class, 'shared'])->name('sysadmin.shared');
Route::get('sysadmin/excused', [SysadminController::class, 'excused'])->name('sysadmin.excused');
Route::get('sysadmin/notifications', [SysadminController::class, 'notifications'])->name('sysadmin.notifications');
Route::get('sysadmin/access', [SysadminController::class, 'access'])->name('sysadmin.access');
Route::get('sysadmin/previous', [SysadminController::class, 'previous'])->name('sysadmin.previous');
Route::get('sysadmin/conversations', [SysadminController::class, 'conversations'])->name('sysadmin.conversations');
Route::get('sysadmin/level1', 'App\Http\Controllers\SysadminController@getOrgLevel1')->name('sysadmin.level1');
Route::get('sysadmin/level2/{id1}', 'App\Http\Controllers\SysadminController@getOrgLevel2')->name('sysadmin.level2');
Route::get('sysadmin/level3/{id1}/{id2}', 'App\Http\Controllers\SysadminController@getOrgLevel3')->name('sysadmin.level3');
Route::get('sysadmin/level4/{id1}/{id2}/{id3}', 'App\Http\Controllers\SysadminController@getOrgLevel4')->name('sysadmin.level4');
