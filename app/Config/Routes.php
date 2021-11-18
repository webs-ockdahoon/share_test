<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Main');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Main::index');

/*
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * WebsBoard Routing
 * --------------------------------------------------------------------
 */
$routes->group("board",function($routes){
   $routes->add("(:alphanum)","Board::index/list/$1");
   $routes->add("(:alphanum)/read/(:num)","Board::index/read/$1/$2");
   $routes->add("(:alphanum)/write/","Board::index/write/$1");
   $routes->add("(:alphanum)/write/(:num)","Board::index/write/$1/$2");
   $routes->add("(:alphanum)/reply/(:num)","Board::index/reply/$1/$2");
   $routes->add("(:alphanum)/delete/(:num)","Board::index/delete/$1/$2");
   $routes->add("(:alphanum)/download/(:num)/(:num)","Board::index/download/$1/$2/$3");
});
$routes->group("master/board/board",function($routes){
    $routes->add("(:alphanum)","Board::index/list/$1");
    $routes->add("(:alphanum)/read/(:num)","Board::index/read/$1/$2");
    $routes->add("(:alphanum)/write/","Board::index/write/$1");
    $routes->add("(:alphanum)/write/(:num)","Board::index/write/$1/$2");
    $routes->add("(:alphanum)/reply/(:num)","Board::index/reply/$1/$2");
    $routes->add("(:alphanum)/delete/(:num)","Board::index/delete/$1/$2");
    $routes->add("(:alphanum)/download/(:alphanum)","Board::index/download/$1/$2");
});


/*
 * --------------------------------------------------------------------
 * Language Routing
 * --------------------------------------------------------------------
 */
$uri = service('uri');
$segments = $uri->getSegments();
if(isset($segments[0])) {
    if ($segments[0] == 'kor' || $segments[0] == 'rus') {

        $routes->add("{locale}/board/(:alphanum)", "Board::index/list/$1");
        $routes->add("{locale}/board/(:alphanum)/read/(:num)", "Board::index/read/$1/$2");
        $routes->add("{locale}/board/(:alphanum)/write/", "Board::index/write/$1");
        $routes->add("{locale}/board/(:alphanum)/write/(:num)", "Board::index/write/$1/$2");
        $routes->add("{locale}/board/(:alphanum)/reply/(:num)", "Board::index/reply/$1/$2");
        $routes->add("{locale}/board/(:alphanum)/delete/(:num)", "Board::index/delete/$1/$2");
        $routes->add("{locale}/board/(:alphanum)/download/(:num)/(:num)", "Board::index/download/$1/$2/$3");

        $routes->add("{locale}/", "Custom_route::index");
        $routes->add("{locale}/(:alphanum)/", "Custom_route::index/$1");
        $routes->add("{locale}/(:alphanum)/(:alphanum)", "Custom_route::index/$1/$2");
        $routes->add("{locale}/(:alphanum)/(:alphanum)/(:alphanum)", "Custom_route::index/$1/$2/$3");
        $routes->add("{locale}/(:alphanum)/(:alphanum)/(:alphanum)/(:alphanum)", "Custom_route::index/$1/$2/$3/$4");
    }
}