<?php

namespace App\Console\Commands;

use App\Jobs\SendNotificationJob;
use App\RabbitMq;
use App\Services\NotificationService;
use Illuminate\Console\Command;

class RabbitMqSimulateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:rabbit-mq-simulate-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Simulate RabbitMq';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $rabbitMqStringMessage = RabbitMq::generateRandomMessage();
        $rabbitMqMessage = json_decode($rabbitMqStringMessage);

        //dump to trace message
        dump($rabbitMqMessage);

        SendNotificationJob::dispatch($rabbitMqMessage);
    }
}
