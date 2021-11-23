<?php

use Illuminate\Routing\Router;

\Encore\Admin\Admin::routes();

\Illuminate\Support\Facades\Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->get('/members', 'HomeController@getMembers');

});
