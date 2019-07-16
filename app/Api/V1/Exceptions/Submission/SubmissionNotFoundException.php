<?php


namespace App\Api\V1\Exceptions\Submission;


use App\Api\V1\Exceptions\ApiErrorCode;
use App\Api\V1\Exceptions\ModelNotFoundException;

class SubmissionNotFoundException extends ModelNotFoundException {
    const ERROR_MESSAGE = "Submission Not Found.";

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, ApiErrorCode::SUBMISSION_NOT_FOUND);
    }
}