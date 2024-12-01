<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('alunos', 'AlunoController::index');
$routes->post('alunos', 'AlunoController::create');
$routes->put('alunos/(:num)', 'AlunoController::update/$1');


$routes->resource('alunos', ['controller' => 'AlunoController']);

