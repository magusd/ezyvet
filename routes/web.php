<?php

use Illuminate\Routing\Router;

/** @var $router Router */

$router->get('/', 'ProductsController@index');
$router->get('/products', 'ProductsController@index');
$router->get('/cart', 'ProductsController@index');
$router->post('/cart', 'ProductsController@store');