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

    // Posts
    $api->group(['namespace' => 'Post', 'prefix' => 'posts'], static function (Router $api) {
        $api->get('', ['as' => 'listPosts', 'uses' => 'ListController']);
    });
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
