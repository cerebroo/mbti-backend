<?php


namespace App\Api\V1\Requests;


use App\Services\Contracts\SubmissionCreateContract;

class SubmissionCreateRequest extends BaseRequest implements SubmissionCreateContract {
    const EMAIL     = "email";
    const RESPONSES = "responses";

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            self::EMAIL            => 'required|email',
            self::RESPONSES        => 'submission_responses',
            self::RESPONSES . '.*' => 'required|numeric|min:1|max:7',

        ];
    }

    public function messages() {
        return [
            'submission_responses' => "Question Id must be numeric and unique."
        ];
    }

    public function getEmail() {
        return $this->input(self::EMAIL);
    }

    public function getResponses() {
        return $this->input(self::RESPONSES);
    }
}