<?php


namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\BaseRequest;
use App\Api\V1\Transformers\QuestionTransformer;
use App\Services\Entities\QuestionService;

class QuestionController extends BaseController {
    public function indexQuestions(BaseRequest $baseRequest, QuestionService $questionService) {
        $questions = $questionService->index();

        return $this->response->collection($questions, new QuestionTransformer());
    }
}