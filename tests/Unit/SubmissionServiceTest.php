<?php

namespace Tests\Unit;

use App\Models\Submission;
use App\Services\Service;
use Tests\TestCase;

class SubmissionServiceTest extends TestCase
{
    public function testCreate()
    {
        Submission::saving(function () {
            return false;
        });
        $testData = [
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'message' => 'This is a test message.'
        ];
        $service = new Service();
        $submission = $service->create(...$testData);
        $this->assertInstanceOf(Submission::class, $submission);
        $this->assertEquals($testData, $submission->toArray());
    }
}
