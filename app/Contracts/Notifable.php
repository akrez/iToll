<?php

namespace App\Contracts;

interface Notifable
{
    public function getMessageReceiver();

    public function send();
}
