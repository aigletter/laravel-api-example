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
        return new SubmissionCollection(Submission::query()->get());
    }
}
