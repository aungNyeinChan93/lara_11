<?php

namespace App\Jobs;

use App\Models\Language;
use App\Mail\LanguagePosted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class LanguageCreate implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(Public Language $language ,Public $user)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->user->email)->send(new LanguagePosted($this->language));

    }
}
