<?php


namespace App\Api\V1\Transformers;


use App\Question;
use League\Fractal\TransformerAbstract;

class QuestionTransformer extends TransformerAbstract {
    public function transform(Question $question) {
        return [
            'id'         => $question->id,
            'question'   => $question->question,
            'sort_order' => $question->sort_order,
        ];
    }
}