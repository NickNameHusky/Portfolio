<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');
$routes->group('', ['filter' => 'login'], function ($routes) {
	$routes->get('/dashboard', 'AboutController::index');
	$routes->get('/about', 'AboutController::about');
	$routes->get('/about/edit/(:segment)', 'AboutController::edit/$1');
	$routes->get('/education', 'EducationController::index');
	$routes->get('/education/create', 'EducationController::create');
	$routes->get('/education/edit/(:segment)', 'EducationController::edit/$1');
	$routes->get('/education/delete/(:segment)', 'EducationController::delete/$1');
	$routes->get('/skill', 'SkillController::index');
	$routes->get('/skill/create', 'SkillController::create');
	$routes->get('/skill/edit/(:segment)', 'SkillController::edit/$1');
	$routes->get('/skill/delete/(:segment)', 'SkillController::delete/$1');
	$routes->get('/experience', 'ExperienceController::index');
	$routes->get('/experience/create', 'ExperienceController::create');
	$routes->get('/experience/edit/(:segment)', 'ExperienceController::edit/$1');
	$routes->get('/experience/delete/(:segment)', 'ExperienceController::delete/$1');
	$routes->get('/portfolio', 'PortfolioController::index');
	$routes->get('/portfolio/create', 'PortfolioController::create');
	$routes->get('/portfolio/edit/(:segment)', 'PortfolioController::edit/$1');
	$routes->get('/portfolio/delete/(:segment)', 'PortfolioController::delete/$1');
});
$routes->add('(:segment)', 'ResumeController::index/$1');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
