<?php
namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::create($request->all());
        Mail::to($user->email)->send(new Welcome($user));
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1002689693786'),
            'parse_mode' => 'html',
            'text' => 'Новый пользователь зарегистрирован: ' . $user->name
        ]);

        return response()->json(['status' => 'success']);
    }
}
