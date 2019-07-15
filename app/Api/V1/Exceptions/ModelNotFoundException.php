<?php

namespace App\Api\V1\Exceptions;


class ModelNotFoundException extends HttpException {

    public function __construct($message, $errorCode) {
        parent::__construct($message, $errorCode, 404);
    }
}