<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Message;
use NotificationChannels\EskizSms\EskizSmsMessage;

class PaymentNotification extends Notification
{
    use Queueable;

    protected $payment;

    public function __construct($payment)
    {
        $this->payment = $payment;
    }

    public function via($notifiable)
    {
        return ['eskiz-sms'];
    }

    // public function toEskizSms($notifiable)
    // {
    //     return (new Mes)
    //         ->content("Hurmatli {$notifiable->name}, Sizning to‘lovingiz qabul qilindi: {$this->payment->amount} so‘m. Rahmat!");
    // }
}
