<?php

namespace App\Jobs;

use App\Models\JobPosition;
use App\Mail\JobPositionCreate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class JobCreate implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public JobPosition $jobPosition)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        Mail::to($this->jobPosition->employer->user->email)->send(new JobPositionCreate($this->jobPosition));

    }
}
