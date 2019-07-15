<?php

$api = app('Dingo\Api\Routing\Router');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$basePath     = "App\Api\V1\Controllers\\";
$webhooksPath = $basePath . "Webhooks\\";

$api->version('v1', function ($api) use ($basePath, $webhooksPath) {
    $api->get('test', function () {
        return 'PUBLIC_ROUTE';
    });

    // Questions Index
    $api->get('questions', $basePath . 'QuestionController@indexQuestions');

    // Webhooks
    $api->group(['prefix' => 'webhooks'], function ($api) use ($webhooksPath) {
        // AWS
        $api->group(['prefix' => 'aws'], function ($api) use ($webhooksPath) {
            //
        });
    });
});


// All Authenticated Routes Goes Here.
$api->version('v1', ['middleware' => 'api.custom-auth'], function ($api) use ($basePath) {
    // Protected Routes
});