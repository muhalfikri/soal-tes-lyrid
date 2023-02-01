<?php
    $routes->group('log', ['namespace' => '\Modules\Log\Controllers'], function($routes){
        $routes->get('/','LogController::index');
        $routes->get('get_data','LogController::get_data');
    });
?>