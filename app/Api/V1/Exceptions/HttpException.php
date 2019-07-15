<?php

namespace App\Api\V1\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException as SymphonyHttpException;

class HttpException extends SymphonyHttpException {

    public function __construct($message, $errorCode, $statusCode = 422) {
        parent::__construct($statusCode, $message, null, array(), $errorCode);
    }
}

class ApiErrorCode {
    // All Auth Related Error Follows here
    const AUTH_GENERIC            = 100;
    const AUTH_INVALID_CREDENTIAL = 101;
}