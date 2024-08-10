<?php

namespace App\Events;

use App\Models\Submission;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $submission;

    /**
     * @return Submission
     */
    public function getSubmission()
    {
        return $this->submission;
    }

    /**
     * Create a new event instance.
     */
    public function __construct(Submission $submission)
    {
        $this->submission = $submission;
    }
}
