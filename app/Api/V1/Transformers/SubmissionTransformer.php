<?php


namespace App\Api\V1\Transformers;


use App\Submission;
use League\Fractal\TransformerAbstract;

class SubmissionTransformer extends TransformerAbstract {
    public function transform(Submission $submission) {
        return [
            'id'         => $submission->id,
            'conclusion' => $submission->getConclusion(),
            'token'      => $submission->token,
            'created_at' => $submission->created_at_dt,
        ];
    }
}