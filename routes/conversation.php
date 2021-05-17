<?php

use App\Http\Controllers\ConversationController;
use Illuminate\Support\Facades\Route;
// Conversations
Route::get('conversation/upcoming', [ConversationController::class, 'index'])->name('conversation.upcoming');
Route::get('conversation/past', [ConversationController::class, 'index'])->name('conversation.past');
Route::get('conversation/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
Route::post('conversation/sign-off/{conversation}', [ConversationController::class, 'signOff'])->name('conversation.signoff');
Route::post('conversation/unsign-off/{conversation}', [ConversationController::class, 'unsignOff'])->name('conversation.unsignoff');
Route::post('conversation', [ConversationController::class, 'store'])->name('conversation.store');
Route::put('conversation/{conversation}', [ConversationController::class, 'update'])->name('conversation.update');
Route::delete('conversation/{conversation}', [ConversationController::class, 'destroy'])->name('conversation.destroy');
Route::post('conversation-info-comment', [ConversationInfoCommentController::class, 'store'])->name('conversation-info-comment.store');

Route::get('participant', [ParticipantController::class, 'index'])->name('participant.index');