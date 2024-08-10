<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\Services\Service;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SubmissionJob implements ShouldQueue
{
    use Queueable;

    protected $name;

    protected $email;

    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct(string $name, string $email, string $message)
    {
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(Service $service): void
    {
        $submission = $service->create($this->name, $this->email, $this->message);
        SubmissionSaved::dispatch($submission);
    }
}
