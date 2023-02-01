<?php
    $routes->group('users', ['namespace' => '\Modules\Users\Controllers'], function($routes){
        $routes->get('/','UsersController::index');
        $routes->add('data_list','UsersController::data_list');
        $routes->add('save','UsersController::save');
        $routes->post('get_data','UsersController::get_data');
        $routes->add('update','UsersController::update');
        $routes->add('ubah_password','UsersController::ubah_password');
        $routes->get('delete/(:any)/(:any)','UsersController::delete/$1/$2');
    });
?>