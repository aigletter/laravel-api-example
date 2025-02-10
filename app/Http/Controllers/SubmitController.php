<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidInputException;
use App\Http\Requests\SubmissionRequest;
use App\Jobs\SubmissionJob;
use Illuminate\Contracts\Bus\QueueingDispatcher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SubmitController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @throws InvalidInputException
     */
    /*public function __invoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:2', 'max:32'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            throw new InvalidInputException($validator);
        }

        SubmissionJob::dispatch(...$validator->validated());

        return new Response(null, 202);
    }*/

    /**
     * FormRequest implements validation, exception trigger and message formatting
     * That's why I don't see the need to get into it
     * Instead of it I added another method to manually validate data and handle errors
     * @param SubmissionRequest $request
     * @return Response
     */
    public function __invoke(SubmissionRequest $request, QueueingDispatcher $dispatcher)
    {
        $dispatcher->dispatch(
            new SubmissionJob($request->post('name'), $request->post('email'), $request->post('message'))
        );

        return new Response(null, 202);
    }
}
