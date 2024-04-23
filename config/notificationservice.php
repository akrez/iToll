<?php

use App\Services\EmailService;
use App\Services\PushService;
use App\Services\SmsService;

return [
    'services' => [
        'SMS' => SmsService::class,
        'EMAIL' => EmailService::class,
        'PUSH' => PushService::class,
    ],
];
