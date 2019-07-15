<?php


namespace App\Services\Entities;


use App\Question;

class QuestionService {
    public function index() {
        return Question::query()->orderBy('sort_order')->get();
    }
}