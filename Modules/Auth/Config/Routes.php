<?php
    $routes->group('auth', ['namespace' => '\Modules\Auth\Controllers'], function($routes){
        // $routes->get('/','AuthController::index');
        $routes->get('index','AuthController::index');
        $routes->get('login','AuthController::login');
        $routes->post('login_process','AuthController::login_process');
        $routes->get('logout','AuthController::logout');
    });
?>