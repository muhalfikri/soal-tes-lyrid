<?php
    $routes->group('pegawai', ['namespace' => '\Modules\Pegawai\Controllers'], function($routes){
        $routes->get('/','PegawaiController::index');
        $routes->add('data_list','PegawaiController::data_list');
        $routes->add('save','PegawaiController::save');
        $routes->post('get_data','PegawaiController::get_data');
        $routes->add('update','PegawaiController::update');
        $routes->get('delete/(:any)/(:any)','PegawaiController::delete/$1/$2');
    });
?>