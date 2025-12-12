<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class SendTelegramNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $pesan;

    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    public function handle(): void
    {
        $botToken = env('TELEGRAM_BOT_TOKEN');
        $chatId   = env('TELEGRAM_CHAT_ID');

        Http::post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            "chat_id" => $chatId,
            "text" => $this->pesan
        ]);
    }
}
