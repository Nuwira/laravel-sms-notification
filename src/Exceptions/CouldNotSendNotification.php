<?php

namespace Nuwira\LaravelSmsNotification\Exceptions;

use Exception;

class CouldNotSendNotification extends Exception
{
    /**
     * Thrown when there is no phone Sender ID provided.
     *
     * @return static
     */
    public static function senderNotProvided()
    {
        return new static('Sender ID was not provided.');
    }
    
    /**
     * Thrown when there is no destination phone number provided.
     *
     * @return static
     */
    public static function destinationNotProvided()
    {
        return new static('Destination phone number was not provided.');
    }
    
    /**
     * Thrown when there is content provided.
     *
     * @return static
     */
    public static function contentNotProvided()
    {
        return new static('Content was not provided.');
    }
    
    /**
     * Thrown when there is no Nuwira SMS Api auth key provided.
     *
     * @return static
     */
    public static function authenticationFailed()
    {
        return new static('Authentication to Nuwira SMS API was failed.');
    }
    
    /**
     * Thrown when no Nuwira SMS Api URL is provided.
     *
     * @return static
     */
    public static function apiUrlNotProvided()
    {
        return new static('Nuwira SMS API URL was not provided.');
    }
}