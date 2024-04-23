<?php

namespace App\Services;

use App\Contracts\Notifable;
use Exception;

class EmailService implements Notifable
{
    public function __construct(private $message)
    {
    }

    public function getMessageReceiver()
    {
        return $this->message->receiver_email_address;
    }

    public function send()
    {
        //simulate error occurred
        if (time() % 3) {
            dump('Success EmailService ' . $this->message->id);
        } else {
            throw new Exception('Error EmailService ' . $this->message->id);
        }
    }
}
