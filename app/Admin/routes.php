<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('/messages', MessageController::class);
    $router->resource('/cities', CityController::class);
    $router->resource('/neighborhoods', NeighborhoodController::class);
    $router->resource('/developers', DeveloperController::class);
    $router->resource('/complexes', ComplexController::class);
    $router->resource('/apartments', ApartmentController::class);

});
