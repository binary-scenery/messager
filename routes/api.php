<?php

use App\Models\Thread;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\MeController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Message\ThreadController;
use App\Http\Controllers\Api\Message\MessageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('login', LoginController::class)->name('auth.login');

Route::middleware('auth:sanctum')->group(function(){

    // User
    Route::get('me', MeController::class);

    // Threads
    Route::get('thread', [ThreadController::class, 'index'])->name('thread.index');
    Route::post('thread', [ThreadController::class, 'store'])->name('thread.store');
    Route::patch('thread/{thread}', [ThreadController::class, 'update'])->name('thread.update')->can('update', ['thread']);
    Route::delete('thread/{thread}', [ThreadController::class, 'delete'])->name('thread.delete')->can('delete', ['thread']);

    // Messages
    Route::get('thread/{thread}/message', [MessageController::class, 'index'])->name('message.index')->can('view' , [Message::class, 'thread']);
    Route::post('thread/{thread}/message', [MessageController::class, 'store'])->name('message.store')->can('create', [Message::class, 'thread']);
    Route::patch('message/{message}', [MessageController::class, 'update'])->name('message.update')->can('update' , ['message']);
    Route::delete('message/{message}', [MessageController::class, 'store'])->name('message.delete')->can('delete' , ['message']);

});
