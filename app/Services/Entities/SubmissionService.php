<?php


namespace App\Services\Entities;


use App;
use App\Api\V1\Exceptions\Submission\SubmissionInvalidQuestionException;
use App\Services\CacheService;
use App\Services\Contracts\SubmissionCreateContract;
use App\Services\HelperService;
use App\Submission;

class SubmissionService {
    public function showByToken($submissionToken) {
        $cacheService = App::make(CacheService::class);

        $_cacheKey = $this->_getSubmissionCacheKey($submissionToken);

        if ($cacheService->hasCache($_cacheKey)) {
            // Cache Exists
            return unserialize($cacheService->getCache($_cacheKey));
        }

        $submission = Submission::whereToken($submissionToken)->first();

        // Setting into cache for next retrieval
        $cacheService->setCache($_cacheKey, serialize($submission));

        return $submission;
    }

    public function submit(SubmissionCreateContract $contract) {
        $questionService = App::make(QuestionService::class);

        $questions         = $questionService->index();
        $filteredQuestions = $questions->filter(function ($question, $key) use ($contract) {
            return isset($contract->getResponses()[$question->id]);
        });

        if (count($filteredQuestions) !== count($questions)) {
            throw new SubmissionInvalidQuestionException('Question Count do not match');
        }

        $submission = new Submission();

        $submission->email   = $contract->getEmail();
        $submission->answers = $contract->getResponses();
        $submission->token   = HelperService::generateUniqueId(8);

        $submission->save();

        return $submission;
    }

    private function _getSubmissionCacheKey($submissionToken) {
        return "submissions_" . $submissionToken;
    }
}