<?php

use App\Http\Controllers\SubmissionCollectionController;
use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::post('submit', SubmitController::class);
    Route::get('submissions', SubmissionCollectionController::class);
});

