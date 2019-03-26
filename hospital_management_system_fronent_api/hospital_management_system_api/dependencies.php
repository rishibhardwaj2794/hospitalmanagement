<?php
use Slim\Views\PhpRenderer;
use App\Controllers;

$container = $app->getContainer();

$container['capsule'] = function($container){
	$capsule = new Illuminate\Database\Capsule\Manager;
	$capsule->addConnection($container['settings']['db']);
	$capsule->setAsGlobal();
	return $capsule;
};

$container['view'] = function($container){
	$templateVariables = [
    "url" => __DIR__
    ];
	$view = new PhpRenderer($container['settings']['template_path'], $templateVariables);
	return $view;
};

$container['mailer'] = function($container){
	return new \PHPMailer();
};

$container['AuthController'] = function($container){
	return new App\Controllers\AuthController($container);
};

$container['auth'] = function(){
	return new App\Auth();
};

$container['HomeController'] = function($container){
  return new App\Controllers\HomeController($container);
};

$container['NewsController'] = function($container){
	return new App\Controllers\NewsController($container);
};

$container['NewsCategoryController'] = function($container){
	return new App\Controllers\NewsCategoryController($container);
};

$container['MobileController'] = function($container){
	return new App\Controllers\MobileController($container);
};
