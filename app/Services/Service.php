<?php

namespace App\Services;

use App\Models\Submission;

class Service
{
    public function create(string $name, string $email, string $message)
    {
        $submission = new Submission();
        $submission->name = $name;
        $submission->email = $email;
        $submission->message = $message;
        $submission->save();

        return $submission;
    }
}
