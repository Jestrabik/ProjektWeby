<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Veřejná hlavní stránka
$routes->get('/', 'Home::index');

// Skupina chráněná filtrem 'auth'
$routes->group('', ['filter' => 'auth'], function($routes) {
    // Hráči
    $routes->get('players', 'PlayerController::index');
    $routes->get('players/create', 'PlayerController::create');
    $routes->post('players/store', 'PlayerController::store');
    $routes->get('players/edit/(:num)', 'PlayerController::edit/$1');
    $routes->post('players/update/(:num)', 'PlayerController::update/$1');
    $routes->post('players/delete/(:num)', 'PlayerController::delete/$1');

    // Týmy
    $routes->get('teams', 'TeamController::index');
    $routes->get('teams/create', 'TeamController::create');
    $routes->post('teams/store', 'TeamController::store');
    $routes->get('teams/edit/(:num)', 'TeamController::edit/$1');
    $routes->post('teams/update/(:num)', 'TeamController::update/$1');
    $routes->post('teams/delete/(:num)', 'TeamController::delete/$1');
});

// Detail hráče (veřejně přístupný)
$routes->get('players/detail/(:num)/(:any)', 'PlayerController::detail/$1/$2');

// Přihlášení a odhlášení
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::doLogin');
$routes->get('logout', 'AuthController::logout');
