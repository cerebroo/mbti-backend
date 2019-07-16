<?php

namespace App\Providers;

use App\Observers\SubmissionObserver;
use App\Submission;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        // Observing the Submission create events to send emails...
        Submission::observe(SubmissionObserver::class);
    }
}
