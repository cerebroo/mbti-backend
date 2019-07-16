<?php


namespace App\Services\Entities;


use App;
use App\Api\V1\Exceptions\Submission\SubmissionInvalidQuestionException;
use App\Services\Contracts\SubmissionCreateContract;
use App\Services\HelperService;
use App\Submission;

class SubmissionService {
    public function showByToken($submissionToken) {
        return Submission::whereToken($submissionToken)->first();
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
}