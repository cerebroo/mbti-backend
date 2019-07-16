<?php


namespace App\Observers;


use App\Jobs\SubmissionEmailJob;
use App\Submission;
use Illuminate\Foundation\Bus\DispatchesJobs;

class SubmissionObserver {

    use DispatchesJobs;

    /**
     * Listen to the Message created event.
     *
     * @param Submission $submission
     * @return void
     */
    public function created(Submission $submission) {
        // This will ensure that for every submission
        // an email will be sent to user with the result.

        // If emails are to be sent conditionally
        // then, place the appropriate checks here.

        $this->dispatch(new SubmissionEmailJob($submission));
    }
}