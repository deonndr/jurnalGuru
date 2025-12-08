<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class CustomForgotPasswordController extends Controller
{
    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check user exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak terdaftar.',
            ]);
        }

        // Kirim ke Telegram
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId   = env('TELEGRAM_CHAT_ID');

        Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            "chat_id" => $chatId,
            "text" => "Halo gantenk ada request reset password nihh
            \nemail:{$user->email}\nrole: {$user->role}
            \n" . now()->format('d-m-Y H:i:s'),
        ]);

        return back()->with('status', 'Berhasil menghubungi admin, tunggu admin menghubungi Anda.');
    }
}
