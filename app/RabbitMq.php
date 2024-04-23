<?php

namespace App;

use Exception;
use Illuminate\Support\Str;

class RabbitMq
{
    public static function generateRandomMessage(): string
    {
        $result = [
            //add id to trace message
            'id' => Str::orderedUuid(),
            'type' => fake()->randomElement(['SMS', 'EMAIL', 'PUSH']),
            'payload' => fake()->text(200),
        ];

        if ($result['type'] == 'SMS') {
            $result['mobile'] = fake()->numerify('###########');
        } elseif ($result['type'] == 'PUSH') {
            $result['device_id'] = fake()->asciify('***********');
        } elseif ($result['type'] == 'EMAIL') {
            $result['receiver_email_address'] = fake()->email();
        } else {
            throw new Exception('not found type');
        }

        return json_encode($result);
    }
}
