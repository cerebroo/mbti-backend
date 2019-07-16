<?php

namespace App\Jobs;

use App\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class SubmissionEmailJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Submission
     */
    private $submission;

    /**
     * Create a new job instance.
     *
     * @param Submission $submission
     */
    public function __construct(Submission $submission) {
        $this->submission = $submission;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        // TODO Email HTML Beautification...

        $data = [
            'content' => 'Thanks for taking the test'
        ];

        $emailHeaders = [
            'email' => $this->submission->email
        ];

        Mail::send('emails.submission', $data, function ($message) use ($emailHeaders) {
            $message->to($emailHeaders['email'])->subject('MBTI Team!!');
        });
    }
}
