<?php

namespace App\Jobs;

use App\Mail\Test;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(Public User $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        logger("running the custome job for " . $this->user->name);

        Mail::to($this->user)->send(new Test());

    }
}
