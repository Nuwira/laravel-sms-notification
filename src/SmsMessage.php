<?php
    
namespace Nuwira\LaravelSmsNotification;

use Illuminate\Support\Arr;

class SmsMessage
{
    public $destination;

    public $content;

    /**
     * @param string $content
     *
     * @return static
     */
    public static function create($content = '')
    {
        return new static($content);
    }

    /**
     * Create a new message instance.
     *
     * @param string $content
     */
    public function __construct($content = '')
    {
        $this->content($content);
    }

    /**
     * Destination phone number.
     *
     * @param $phoneNumber
     *
     * @return $this
     */
    public function to($phoneNumber)
    {
        $this->destination = $phoneNumber;

        return $this;
    }

    /**
     * SMS message.
     *
     * @param $content
     *
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Determine if Destination Phone Number is not given.
     *
     * @return bool
     */
    public function destinationNotGiven()
    {
        return empty($this->destination);
    }

    /**
     * Determine if Content is not given.
     *
     * @return bool
     */
    public function contentNotGiven()
    {
        return empty($this->content);
    }

    /**
     * Returns params payload.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'destination' => $this->destination,
            'content' => $this->content,
        ];
    }
}