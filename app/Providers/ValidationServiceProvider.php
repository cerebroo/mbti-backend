<?php

namespace App\Providers;


use App\Services\RegexService;
use DateTime;
use Dingo\Api\Provider\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Validator::extend('latitude', function ($attribute, $value) {
            return preg_match(RegexService::REGEX_LATITUDE, $value);
        });

        Validator::extend('longitude', function ($attribute, $value) {
            return preg_match(RegexService::REGEX_LONGITUDE, $value);
        });

        Validator::extend('web_url', function ($attribute, $value) {
            return preg_match(RegexService::REGEX_LINK, $value);
        });

        Validator::extend('date_string', function ($attribute, $value) {
            if ($value instanceof DateTime) {
                return true;
            }

            return !(strtotime($value) === false);
        });

        Validator::extend('alpha_spaces', function ($attribute, $value) {
            return preg_match(RegexService::REGEX_ALPHA_SPACES, $value);
        });

        Validator::extend('day_of_week', function ($attribute, $value) {
            $validTypes = [
                'sunday',
                'monday',
                'tuesday',
                'wednesday',
                'thursday',
                'friday',
                'saturday'
            ];

            return in_array($value, $validTypes);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}