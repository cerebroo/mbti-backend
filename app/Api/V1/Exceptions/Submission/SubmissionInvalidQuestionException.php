<?php


namespace App\Api\V1\Exceptions\Submission;


use App\Api\V1\Exceptions\ApiErrorCode;
use App\Api\V1\Exceptions\HttpException;

class SubmissionInvalidQuestionException extends HttpException {
    const ERROR_MESSAGE = "Question Invalid.";

    public function __construct($message = self::ERROR_MESSAGE) {
        parent::__construct($message, ApiErrorCode::SUBMISSION_INVALID_QUESTION, 422);
    }
}