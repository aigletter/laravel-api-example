<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubmissionCollection;
use App\Models\Submission;

class SubmissionCollectionController
{
    /**
     * @return SubmissionCollection
     */
    public function __invoke()
    {
        $submissions = Submission::query()->get();
        return new SubmissionCollection($submissions);
    }
}
