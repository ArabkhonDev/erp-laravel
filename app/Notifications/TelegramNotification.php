<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramNotification extends Notification
{
    use Queueable;

    protected $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['telegram'];
    }

    // public function toTelegram($notifiable)
    // {
    //     return TelegramMessage::create()
    //         ->to(env('TELEGRAM_CHAT_ID'))
    //         ->content($this->message);
    // }
}
