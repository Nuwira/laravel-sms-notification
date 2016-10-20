# Nuwira SMS Notifications Channel for Laravel 5.3

This package makes it easy to send SMS notifications using [Nuwira SMS Gateway](http://apisms.nuwira.net/) with Laravel 5.3.

## Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)

## Requirements

Log in to Nuwira SMS Gateway then create an application that will give you a Client ID and Client Secret.

## Installation

You can install the package via composer:

```console
composer require nuwira/laravel-sms-notification
```

You must install the service provider:

```php
// config/app.php
'providers' => [
    ...
    Nuwira\LaravelSmsNotification\SmsServiceProvider::class,
],
```

Publish the configuration using this command:

```console
php artisan vendor:publish --provider="Nuwira\LaravelSmsNotification\SmsServiceProvider"
```

Open `config/sms.php` file and edit the configuration, or you can use `.env` file and fill the Client ID and Client Secret.

```
NUWIRA_SMSGW_CLIENT_ID=client_id
NUWIRA_SMSGW_CLIENT_SECRET=client_secret
```

## Usage

You can now use the channel in your `via()` method inside the Notification class.

```php
namespace App\Notifications;

use Nuwira\LaravelSmsNotification\SmsChannel;
use Nuwira\LaravelSmsNotification\SmsMessage;
use Illuminate\Notifications\Notification;

class SendNotificationToSms extends Notification
{
    public function via($notifiable)
    {
        return [SmsChannel::class];
    }

    public function toSms($notifiable)
    {
        return (new SmsMessage())
            ->to($phoneNumber)
            ->content($content);
    }
}
```

### Available methods

* `to($phoneNumber)` : `(string)` Receiver phone number. Using international phone number (+62XXXXXXXXXX) format is highly suggested.
* `content($message)` : `(string)` The SMS content. If content length is more than 160 characters, it will be sent as [long SMS](https://en.wikipedia.org/wiki/Concatenated_SMS) automatically.

## Security

If you discover any security related issues, please email zam@nuwira.co.id instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Muhammad Zamroni](https://github.com/matriphe)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.