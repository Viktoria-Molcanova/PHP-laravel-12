<?php

use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('test-telegram', function () {
    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1002689693786'),
        'parse_mode' => 'html',
        'text' => 'Произошло тестовое событие'
    ]);
    return response()->json([
        'status' => 'success'
    ]);
});
