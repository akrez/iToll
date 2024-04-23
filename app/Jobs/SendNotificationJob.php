<?php

namespace App\Jobs;

use App\Contracts\Notifable;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;

    public $service;

    /**
     * Create a new job instance.
     */
    public function __construct($message)
    {
        $serviceClass = config('notificationservice.services.' . $message->type);
        if (!$serviceClass) {
            throw new Exception('not found service: ' . $message->type);
        }

        $service = new $serviceClass($message);

        if ($service instanceof Notifable) {
        } else {
            throw new Exception('service is not Notifable: ' . $message->type);
        }

        $this->service = $service;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $this->service->send();
    }
}
