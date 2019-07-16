<?php

namespace App;

use App;
use App\Services\Entities\QuestionService;

/**
 * App\Submission
 *
 * @property mixed $id
 * @property string $email
 * @property mixed $answers
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission whereAnswers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Submission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Submission extends BaseModel {
    /*
     * Attribute Mutator
     */
    public function getAnswersAttribute($value) {
        return json_decode($value, true);
    }

    public function setAnswersAttribute($value) {
        $this->attributes['answers'] = json_encode($value, JSON_FORCE_OBJECT);
    }

    public function getConclusion() {
        $questionService = App::make(QuestionService::class);
        $questions       = $questionService->index();

        $eiRegister = 0;
        $snRegister = 0;
        $tfRegister = 0;
        $jpRegister = 0;

        foreach ($questions as $question) {
            $diff   = $this->answers[$question->id] - 4;
            $factor = ($diff * $question->direction);

            switch ($question->dimension) {
                case Question::DIMENSION_EI :
                    {
                        $eiRegister += $factor;
                        break;
                    }
                case Question::DIMENSION_SN :
                    {
                        $snRegister += $factor;
                        break;
                    }
                case Question::DIMENSION_TF :
                    {
                        $tfRegister += $factor;
                        break;
                    }
                case Question::DIMENSION_JP :
                    {
                        $jpRegister += $factor;
                        break;
                    }
            }
        }

        $resultBreakdown = [];

        if ($eiRegister <= 0) {
            $resultBreakdown[Question::DIMENSION_EI] = 'E';
        } else {
            $resultBreakdown[Question::DIMENSION_EI] = 'I';
        }

        if ($snRegister <= 0) {
            $resultBreakdown[Question::DIMENSION_SN] = 'S';
        } else {
            $resultBreakdown[Question::DIMENSION_SN] = 'N';
        }

        if ($tfRegister <= 0) {
            $resultBreakdown[Question::DIMENSION_TF] = 'T';
        } else {
            $resultBreakdown[Question::DIMENSION_TF] = 'F';
        }

        if ($jpRegister <= 0) {
            $resultBreakdown[Question::DIMENSION_JP] = 'J';
        } else {
            $resultBreakdown[Question::DIMENSION_JP] = 'P';
        }

        return $resultBreakdown;
    }
}
