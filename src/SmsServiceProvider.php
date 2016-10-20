<?php

namespace Nuwira\LaravelSmsNotification;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use Nuwira\Smsgw\ServiceProvider as SmsGwServiceProvider;
use Nuwira\Smsgw\Sms;

class SmsServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $this->app->when(SmsChannel::class)
            ->needs(Sms::class)
            ->give(function () {
                return new Sms();
            });
    }

    public function register()
    {
        $this->app->register(SmsGwServiceProvider::class);
    }
}
