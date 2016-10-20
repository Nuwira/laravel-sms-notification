<?php

namespace Nuwira\LaravelSmsNotification;

use Nuwira\LaravelSmsNotification\Exceptions\CouldNotSendNotification;
use Illuminate\Notifications\Notification;
use Nuwira\Smsgw\Sms;

class SmsChannel
{
    protected $sms;
    
    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param \Illuminate\Notifications\Notification $notification
     *
     * @throws \Nuwira\LaravelSmsNotification\Exceptions\CouldNotSendNotification
     */
    public function send($notifiable, Notification $notification)
    {
        $payload = $notification->toSms($notifiable);
        
        $phone_number = $payload->destination;
        $message = $payload->content;
        
        try {
            $this->sms->send($phone_number, $message);
        } catch (Exception $e) {
            throw CouldNotSendNotification($e->getMessage());
        }
    }
}