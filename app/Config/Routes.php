<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */




// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Routes for User Authentication
$routes->get('/login', 'UserController::login');
$routes->post('/authenticate', 'UserController::authenticate');
$routes->get('/logout', 'UserController::logout');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);


// Routes for Event Management
$routes->get('/events', 'EventController::index');       // Menampilkan semua event
$routes->get('/events/create', 'EventController::create');  // Menampilkan form buat event baru
$routes->post('/events/create', 'EventController::create'); // Proses buat event baru
$routes->post('/events', 'EventController::store');
$routes->get('/events/edit/(:num)', 'EventController::edit/$1');  // Menampilkan form edit event
$routes->post('/events/edit/(:num)', 'EventController::edit/$1'); // Proses edit event
$routes->post('/events/update/(:num)', 'EventController::update/$1');
$routes->get('/events/delete/(:num)', 'EventController::delete/$1'); // Hapus event

$routes->group('participants', function($routes) {
    $routes->get('/', 'ParticipantController::index');
    $routes->get('create', 'ParticipantController::create');
    $routes->post('create', 'ParticipantController::create');
    $routes->get('edit/(:num)', 'ParticipantController::edit/$1');
    $routes->post('update/(:num)', 'ParticipantController::update/$1');
    $routes->get('delete/(:num)', 'ParticipantController::delete/$1');
});




$routes->group('schedules', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'ScheduleController::index');
    $routes->get('create', 'ScheduleController::create');
    $routes->post('create', 'ScheduleController::create');
    $routes->get('edit/(:num)', 'ScheduleController::edit/$1');
    $routes->post('update/(:num)', 'ScheduleController::update/$1');
    $routes->get('delete/(:num)', 'ScheduleController::delete/$1');
});


$routes->group('feedbacks', function($routes) {
    $routes->get('/', 'FeedbackController::index');
    $routes->get('create', 'FeedbackController::create');
    $routes->post('create', 'FeedbackController::create');
    $routes->get('edit/(:num)', 'FeedbackController::edit/$1');
    $routes->post('update/(:num)', 'FeedbackController::update/$1');
    $routes->get('delete/(:num)', 'FeedbackController::delete/$1');
});


$routes->group('tickets', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'TicketController::index');
    $routes->get('create', 'TicketController::create');
    $routes->post('create', 'TicketController::create');
    $routes->get('edit/(:segment)', 'TicketController::edit/$1');
    $routes->post('update/(:segment)', 'TicketController::update/$1');
    $routes->get('delete/(:segment)', 'TicketController::delete/$1');
});


$routes->group('organizers', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'OrganizerController::index'); // Menampilkan daftar organizer
    $routes->get('create', 'OrganizerController::create'); // Menampilkan form tambah organizer
    $routes->post('create', 'OrganizerController::create'); // Proses tambah organizer
    $routes->get('edit/(:num)', 'OrganizerController::edit/$1'); // Menampilkan form edit organizer
    $routes->post('update/(:num)', 'OrganizerController::update/$1'); // Proses edit organizer
    $routes->get('delete/(:num)', 'OrganizerController::delete/$1'); // Menghapus organizer
});




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * If you need additional routing, you can require additional route files here
 * to override any defaults. You will have access to the $routes object within
 * that file without needing to reload the object.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
