<?php
header("Access-Control-Allow-Origin: *");
if (isset($_SERVER['HTTP_ORIGIN'])) {
    // should do a check here to match $_SERVER['HTTP_ORIGIN'] to a
    // whitelist of safe domains
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}
// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");         

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

}
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


session_cache_limiter('private, must-revalidate');
session_cache_expire(60);

//Start PHP session
session_start();

require '../vendor/autoload.php';

// Instantiate the app
$settings = require __DIR__ . '/../settings.php';
//print_r($settings);

$app = new \Slim\App($settings);

// setting up the dependencies
require __DIR__.'/../dependencies.php';


$app->get('/','HomeController:index')->setName('home');

$app->get('/logout', 'AuthController:logoutUser');

// Student Assinments API ///
$app->map(['POST', 'GET'], '/doctor', 'MobileController:getDoctors');
$app->post('/user/login', 'AuthController:signInMobileUser');
$app->post('/register', 'AuthController:registerMobileUser');
$app->post('/passwordreset', 'AuthController:resetPassword');

$capsule = $app->getContainer()->get('capsule');
//$capsule->setAsGlobal();
$capsule->bootEloquent();

$app->run();
