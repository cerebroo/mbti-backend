<?php


namespace App\Services\Entities;


use App;
use App\Question;
use App\Services\CacheService;

class QuestionService {
    public function index() {
        $cacheService = App::make(CacheService::class);

        $_cacheKey = 'questions';

        if ($cacheService->hasCache($_cacheKey)) {
            // Cache Exists
            return unserialize($cacheService->getCache($_cacheKey));
        }

        $questions = Question::query()->orderBy('sort_order')->get();

        // Setting into cache for next retrieval
        $cacheService->setCache($_cacheKey, serialize($questions));

        return $questions;
    }
}