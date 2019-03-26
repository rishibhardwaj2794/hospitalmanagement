<?php

namespace App\Controllers;

use App\Models\User;


class HomeController extends Controller{

	public function index($request, $response){
		return $this->view->render($response, 'admin.php');
	}
	
	public function reset($request, $response){
		return $this->view->render($response, 'reset.php');
	}

	public function success($request, $response){
		return $this->view->render($response, 'success.php');
	}
}
