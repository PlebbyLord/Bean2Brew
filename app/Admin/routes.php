<?php

use App\Admin\Controllers\UserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use Encore\Admin\Facades\Admin;
use App\Admin\Controllers\VerifyController;
use App\Admin\Controllers\SpeciesController;
use App\Admin\Controllers\GrowController;
use App\Admin\Controllers\LocationController;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
    $router->resource('verify', VerifyController::class);
    $router->resource('species', SpeciesController::class);
    $router->resource('grows', GrowController::class);
    $router->resource('location', LocationController::class);

    $router->get('verify/accept/{id}', [VerifyController::class, 'accept'])->name('verify.accept');
    $router->get('verify/reject/{id}', [VerifyController::class, 'reject'])->name('verify.reject');
});
