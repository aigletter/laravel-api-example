<?php

namespace App\Listeners;

use App\Events\SubmissionSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Psr\Log\LoggerInterface;

class SubmissionSavedLog
{
    private LoggerInterface $logger;

    /**
     * Create the event listener.
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle the event.
     */
    public function handle(SubmissionSaved $event): void
    {
        $submission = $event->getSubmission();
        $this->logger->info('Submission was saved successfully', [
            'submission' => $submission->toArray()
        ]);
    }
}
