<?php

namespace App\Services;

use App\Contracts\Notifable;
use Exception;

class PushService implements Notifable
{
    public function __construct(private $message)
    {
    }

    public function getMessageReceiver()
    {
        return $this->message->device_id;
    }

    public function send()
    {
        //simulate error occurred
        if (time() % 3) {
            dump('Success PushService ' . $this->message->id);
        } else {
            throw new Exception('Error PushService ' . $this->message->id);
        }
    }
}
