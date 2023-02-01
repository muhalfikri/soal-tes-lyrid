<?php
    $routes->group('student', ['namespace' => '\Modules\Student\Controllers'], function($routes){
        $routes->get('/','StudentController::index');
        $routes->get('add','StudentController::add');
    });
?>