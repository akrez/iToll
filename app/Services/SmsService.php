<?php

namespace App\Services;

use App\Contracts\Notifable;
use Exception;

class SmsService implements Notifable
{
    public function __construct(private $message)
    {
    }

    public function getMessageReceiver()
    {
        return $this->message->mobile;
    }

    public function send()
    {
        //simulate error occurred
        if (time() % 3) {
            dump('Success SmsService ' . $this->message->id);
        } else {
            throw new Exception('Error SmsService ' . $this->message->id);
        }
    }
}
