<?php

namespace App\Api\V1\Exceptions\Auth;


use App\Api\V1\Exceptions\ApiErrorCode;
use App\Api\V1\Exceptions\HttpException;

class InvalidCredentialException extends HttpException {
    const ERROR_MESSAGE = "Incorrect login details.";

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, ApiErrorCode::AUTH_INVALID_CREDENTIAL, 401);
    }
}