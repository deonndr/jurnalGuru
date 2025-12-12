<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Jobs\SendTelegramNotification;

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

        $pesan = "halo gantenk, ada request reset paswsword nih
        email = {{$user->email}}
        nama = {{$user->name}}
        ". now()->format('d-m-Y H:i:s');

        // kirim jobs queue ke tele
        SendTelegramNotification::dispatch($pesan);

        return back()->with('status', 'Berhasil menghubungi admin, tunggu admin menghubungi Anda.');
    }
}
