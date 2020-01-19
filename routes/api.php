<?php

use Illuminate\Routing\Router;

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

/** @var Router $api */
$api = app(Router::class);

$api->group(['prefix' => 'v1'], static function (Router $api) {
    $api->get('health-check', ['as' => 'healthCheck', 'uses' => 'HealthCheckController']);

    // Auth
    $api->group(['namespace' => 'Auth', 'prefix' => 'auth'], function (Router $api) {
        $api->group(['middleware' => ['auth:api']], function (Router $api) {
            $api->delete('logout', ['as' => 'logout', 'uses' => 'LogoutController']);
        });
    });

    // Posts
    $api->group(['namespace' => 'Post', 'prefix' => 'posts'], static function (Router $api) {
        $api->get('', ['as' => 'listPosts', 'uses' => 'ListController']);

        $api->group(['middleware' => ['auth:api']], function (Router $api) {
            $api->post('', ['as' => 'create', 'uses' => 'CreateController']);
            $api->put('', ['as' => 'update', 'uses' => 'UpdateController']);
            $api->delete('', ['as' => 'delete', 'uses' => 'DeleteController']);
        });
    });
});
