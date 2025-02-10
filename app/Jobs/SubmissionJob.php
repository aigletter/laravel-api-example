<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\Services\Service;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Symfony\Component\EventDispatcher\EventDispatcher;

class SubmissionJob implements ShouldQueue
{
    use Queueable;

    protected string $name;

    protected string $email;

    protected string $message;

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
    public function handle(Service $service, EventDispatcher $eventDispatcher): void
    {
        $submission = $service->create($this->name, $this->email, $this->message);
        $eventDispatcher->dispatch(
            new SubmissionSaved($submission)
        );
    }
}
