<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Group related Perjadin routes
$routes->group('perjadin', function ($routes) {
    $routes->get('/', 'PerjadinController::index', ['as' => 'perjadin_index']);
    $routes->get('create', 'PerjadinController::create', ['as' => 'perjadin_create']);
    $routes->post('store', 'PerjadinController::store', ['as' => 'perjadin_store']);
    $routes->get('edit/(:segment)', 'PerjadinController::edit/$1', ['as' => 'perjadin_edit']);
    $routes->put('update/(:segment)', 'PerjadinController::update/$1', ['as' => 'perjadin_update']);
    $routes->delete('delete/(:segment)', 'PerjadinController::delete/$1', ['as' => 'perjadin_delete']);
});
