<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controllers\AdministrationController;
use app\controllers\AuthController;
use app\controllers\BookingController;
use app\controllers\HomeController;
use app\core\Application;

//Root application
$app = new Application();

/* ------------------------------------------------------------- */

//Home controller routes
$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/home', [HomeController::class, 'index']);



/* ------------------------------------------------------------- */

/*Administration controller rotes*/

//Index page/admin dashboard
$app->router->get('/administration', [AdministrationController::class, 'index']);

//Add routes

$app->router->get('/add/country', [AdministrationController::class, 'addCountryView']);
$app->router->get('/add/city', [AdministrationController::class, 'addCityView']);
$app->router->get('/add/accommodation', [AdministrationController::class, 'addAccommodationView']);
$app->router->post('/add/countryProcess', [AdministrationController::class, 'addCountryProcess']);
$app->router->post('/add/cityProcess', [AdministrationController::class, 'addCityProcess']);
$app->router->post('/add/accommodationProcess' ,[AdministrationController::class, 'addAccommodationProcess']);

//Delete routes
$app->router->get('/delete/country' ,[AdministrationController::class, 'deleteCountryView']);
$app->router->get('/delete/city' ,[AdministrationController::class, 'deleteCityView']);
$app->router->get('/delete/accommodation' ,[AdministrationController::class, 'deleteAccommodationView']);
$app->router->post('/delete/countryProcess' ,[AdministrationController::class, 'countryDelete']);
$app->router->post('/delete/cityProcess' ,[AdministrationController::class, 'cityDelete']);
$app->router->post('/delete/accommodationProcess' ,[AdministrationController::class, 'accommodationDelete']);


//Update routes
$app->router->get("/update/country", [AdministrationController::class, 'updateCountryView']);
$app->router->get("/update/city", [AdministrationController::class, 'updateCityView']);
$app->router->get("/update/accommodation", [AdministrationController::class, 'updateAccommodationView']);
$app->router->post('/update/countryProcess', [AdministrationController::class, 'updateCountry']);
$app->router->post('/update/cityProcess', [AdministrationController::class, 'updateCity']);
$app->router->post('/update/accommodationProcess', [AdministrationController::class, 'updateAccommodation']);
$app->router->post("/update/country/finish", [AdministrationController::class, 'updateCountyFinish']);
$app->router->post("/update/city/finish", [AdministrationController::class, 'updateCityFinish']);
$app->router->post("/update/accommodation/finish", [AdministrationController::class, 'updateAccommodationFinish']);


//Api for graphs
$app->router->get('/api/graph/countries' , [AdministrationController::class, 'getCountriesApi']);
$app->router->get('/api/reservationMonth', [AdministrationController::class, 'getReservationByMonthApi']);
$app->router->get('/api/income', [AdministrationController::class, 'getIncomeApi']);
$app->router->get('/api/totalIncome', [AdministrationController::class, 'getIncomeByMonthApi']);


/* ------------------------------------------------------------- */

/*Booking controller routes*/
$app->router->get('/countries', [BookingController::class, 'index']);
$app->router->get('/api/country/rows/json', [BookingController::class, 'rows']);
$app->router->get('/api/city', [BookingController::class, 'CityRows']);
$app->router->get('/api/destination', [BookingController::class, 'DestinationRows']);
$app->router->post('/reservationProcess', [BookingController::class, 'reservationProcess']);
$app->router->post('/contactProcess', [BookingController::class, 'contactProcess']);

/* ------------------------------------------------------------- */


/*Auth controller routes*/
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->get('/registration', [AuthController::class, 'registration']);
$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/accessDenied', [AuthController::class, 'accessDenied']);
$app->router->post('/registrationProcess', [AuthController::class, 'registrationProcess']);
$app->router->post('/loginProcess', [AuthController::class, 'loginProcess']);

/* ------------------------------------------------------------- */


//app start
$app->run();