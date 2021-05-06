<?php

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\ConversationInfoCommentController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

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
        'index', 'destroy',
    ]);

    // Route::get('goal/{goal}/comment', [GoalController::class, 'getComments'])->name('get-comments');
    Route::post('goal/{goal}/comment', [GoalController::class, 'addComment'])->name('goal.add-comment');
    Route::get('goal/{goal}/status/{status}', [GoalController::class, 'updateStatus'])->name('goal.update-status');

    // Link Employee to Supervisor goals
    Route::post('link-goal', [GoalController::class, 'linkGoal'])->name('goal.link');

    // Conversations
    Route::get('conversation/upcoming', [ConversationController::class, 'index'])->name('conversation.upcoming');
    Route::get('conversation/past', [ConversationController::class, 'index'])->name('conversation.past');
    Route::get('conversation/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
    Route::post('conversation/sign-off/{conversation}', [ConversationController::class, 'signOff'])->name('conversation.signoff');
    Route::post('conversation', [ConversationController::class, 'store'])->name('conversation.store');
    Route::put('conversation/{conversation}', [ConversationController::class, 'update'])->name('conversation.update');
    Route::delete('conversation/{conversation}', [ConversationController::class, 'destroy'])->name('conversation.destroy');
    Route::post('conversation-info-comment', [ConversationInfoCommentController::class, 'store'])->name('conversation-info-comment.store');

    Route::get('participant', [ParticipantController::class, 'index'])->name('participant.index');
});

Route::get('/my-performance', function () {
    return view('my-performance');
})->middleware(['auth'])->name('my-performance');

require __DIR__.'/auth.php';
