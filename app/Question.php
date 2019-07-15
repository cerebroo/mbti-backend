<?php

namespace App;

/**
 * App\Question
 *
 * @property int $id
 * @property string $question
 * @property string $dimension
 * @property int $direction
 * @property int $sort_order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereDimension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereDirection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereQuestion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereSortOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Question whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Question extends BaseModel {
    protected $casts = [
        'direction' => 'int'
    ];

    const DIMENSION_EI = 'EI';
    const DIMENSION_SN = 'SN';
    const DIMENSION_TF = 'TF';
    const DIMENSION_JP = 'JP';
}
