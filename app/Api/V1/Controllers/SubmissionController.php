<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Exceptions\Submission\SubmissionNotFoundException;
use App\Api\V1\Requests\SubmissionCreateRequest;
use App\Api\V1\Transformers\SubmissionTransformer;
use App\Services\Entities\SubmissionService;

class SubmissionController extends BaseController {

    public function submit(SubmissionCreateRequest $submissionCreateRequest, SubmissionService $submissionService) {
        $submission = $submissionService->submit($submissionCreateRequest);

        return $this->response->item($submission, new SubmissionTransformer());
    }

    public function showSubmission($submissionToken, SubmissionService $submissionService) {
        $submission = $submissionService->showByToken($submissionToken);

        if (!$submission) {
            throw new SubmissionNotFoundException();
        }

        return $this->response->item($submission, new SubmissionTransformer());
    }
}