<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('goal/current', [GoalController::class, 'index'])->name('goal.current');
    Route::get('goal/past', [GoalController::class, 'index'])->name('goal.past');
    Route::get('goal/library', [GoalController::class, 'library'])->name('goal.library');
    Route::post('goal/library', [GoalController::class, 'saveFromLibrary'])->name('goal.library');

    Route::get('goal', function () {
        return redirect()->route('goal.current');
    })->name('goal.index');

    Route::resource('goal', GoalController::class)->except([
        'index', 'destroy'
    ]);



    // Route::get('goal/{goal}/comment', [GoalController::class, 'getComments'])->name('get-comments');
    Route::post('goal/{goal}/comment', [GoalController::class, 'addComment'])->name('goal.add-comment');
    Route::get('goal/{goal}/status/{status}', [GoalController::class, 'updateStatus'])->name('goal.update-status');

    // Link Employee to Supervisor goals
    Route::post('link-goal', [GoalController::class, 'linkGoal'])->name('goal.link');
});

Route::get('/my-performance', function () {
    return view('my-performance');
})->middleware(['auth'])->name('my-performance');



require __DIR__ . '/auth.php';
