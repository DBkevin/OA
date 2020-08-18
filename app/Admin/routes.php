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
    $router->resource('departmernts', DepartmerntController::class,[
        'except'=>['destroy','show']
    ]); //科室
    $router->resource('doctors', DoctorControlle::class,[
        'except'=>['destroy','show']
    ]);
     $router->resource('users', UserController::class); //用户-->咨询
});
