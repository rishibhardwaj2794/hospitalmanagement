<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\MenuItem;
use Carbon\Carbon;
use App\Controllers\Controller;
use Illuminate\Database\Capsule\Manager as DB;


class AuthController extends Controller{

	public function getSignOut($request, $response){
		return $response->withRedirect($this->router->pathFor('home'));
	}

	public function postSignIn($request, $response){
		if(!$this->auth->check()){
			$auth = $this->auth->attemptAdminLogin($request->getParam('email'), $request->getParam('password'));
      if(!$auth){
        return $this->view->render($response, 'admin.php', array("error" => "Login failed! try again"));
      }
    }
    $userDetails = User::all();
    $menu = Menu::all();
    $menuItem = MenuItem::all();
    return $this->view->render($response, 'dashboard.php', array('users' => $userDetails, 'menu' => $menu, 'menuitem' => $menuItem));
	}

	public function viewUser($request, $response){
		if(!$this->auth->check()){
			$auth = $this->auth->attemptAdminLogin($request->getParam('email'), $request->getParam('password'));
      if(!$auth){
        return $this->view->render($response, 'admin.php', array("error" => "Login failed! try again"));
      }
    }
    $userDetails = User::all();
    return $this->view->render($response, 'user.php', array('users' => $userDetails));
	}

	public function resetPassword($request, $response){
		$email = $request->getParam('email');
		// retrive user with this email
		$isMatchedEmail = User::where('email', $email)->first();
		if(!isset($isMatchedEmail)){
			return $this->view->render($response, 'passwordreset.php', array('status' => array("success" => 0)));
		}
		//Generate a token
		$token = bin2hex(openssl_random_pseudo_bytes(16));
		//echo "$token";

		$this->mailer->isSMTP();
		$this->mailer->Host ="send.one.com";
		$this->mailer->SMTPAuth = true;
		$this->mailer->SMTPSecure = 'ssl';
		$this->mailer->Port = "465";
		$this->mailer->Username = "";
		$this->mailer->Password = "";
		$this->mailer->setFrom('', "");
		$this->mailer->addAddress("", "");
		$this->mailer->isHTML(true);
		$this->mailer->Subject = 'User password reset';
		$this->mailer->Body = "<p>Hi,</p> <span>You requested a password reset for this application </span> <p>Click here to reset it:</p>
		<a href='http://nigerianstudentshop.com/churches/public/requestpasswordreset/{$token}/{$email}'>Click to reset password</a>";

		if(!$this->mailer->send()){
			return $this->view->render($response, 'passwordreset.php', array('status' => array("success" => 0)));
		}
		return $this->view->render($response, 'passwordreset.php', array('status' => array("success" => 1)));
	}

	public function requestPasswordReset($request, $response, $args){

		if($request->isGet()){
			$token = $args['token'];
		    $email = $args['email'];

		    return $this->view->render($response, 'requestpasswordreset.php', array('email' => $email));
		}

		$password = $request->getParam('password');
		$email = $request->getParam('email');

		if(isset($email)){
			$password = md5($password);
			// Update user password
            User::where('email', $email)->update(['password' => $password]);

            return $response->withRedirect($this->router->pathFor('success'));
		}

		return $this->view->render($response, 'success.php', array('status' => 0));

	}

	public function addUser($request, $response){

		if($request->isGet()){
			return $this->view->render($response, 'adduser.php');
		}

		if(!$this->auth->check()){
			// admin is not login
			return $response->withRedirect($this->router->pathFor('home'));
		}

		$username = $request->getParam('username');
	  $email = $request->getParam('email');
		$password = $request->getParam('password');
		$address = $request->getParam('address');
		$phone = $request->getParam('phone');

		$registerUser = new User(array(
		 'username' => $username,
		 'email'=> $email,
		 'password' => md5($password),
		 'address' => $address,
		 'phone_number' => $phone
		));

		$registerUser->save();
		return $this->view->render($response, 'adduser.php');
	}

	public function editUser($request, $response, $args){
		if(!$this->auth->check()){
			return $response->withRedirect($this->router->pathFor('home'));
		}

		if($request->isGet()){
			$userId = $args;
      $userEdit = User::find($userId)->first();
	    return $this->view->render($response, 'edituser.php', array('edit' => $userEdit));
		}

		if($request->isPost()){

		$id = $request->getParam('id');
		$username = $request->getParam('username');
	  $email = $request->getParam('email');
	  $address = $request->getParam('address');
		$phone_number = $request->getParam('phone');
		$password = $request->getParam('password');

    User::where('id', $id)->update(['username' => $username, 'email' => $email, 'address' => $address, 'phone_number' => $phone_number, 'password' => md5($password)]);
    return $this->view->render($response, 'edituser.php');
    }
	}

	public function deleteUser($request, $response, $args){
		if(!$this->auth->check()){
			return $response->withRedirect($this->router->pathFor('home'));
		}
		$id = $args['id'];
		$user = User::find($id);

		if($request->isGet()){
			return $this->view->render($response, 'userdelete.php', array('user' => $user->first_name . " " . $user->last_name));
		}
		if($request->isPost()){
			$user->delete();
			return $this->view->render($response, 'userdelete.php', array('deleted' => '1'));
		}
	}

	public function logoutUser($request, $response){
		if($this->auth->check()){
			$this->auth->logout();
			return $response->withRedirect($this->router->pathFor('home'));
		}
	}

	public function signInMobileUser($request, $response, $args){
		$email = $request->getParam('user_email');
		$password = $request->getParam('user_password');

		$filtered_email = "";
		$filtered_password = "";
	
		// sanitize the username and password from the client side
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$filtered_email = filter_var($email, FILTER_VALIDATE_EMAIL);
		}
	
		if(filter_var($password, FILTER_SANITIZE_STRING)){
		    $filtered_password = filter_var($password, FILTER_SANITIZE_STRING);
		}
		
		//check if the user details match information in the database
		$auth = $this->auth->attempt($filtered_email, $filtered_password);
		if($auth){
			$user = DB::table('user')
			->join('city', 'user.user_city', '=', 'city.city_id')
			->join('state', 'user.user_state', '=', 'state.state_id')
			->join('country', 'user.user_country', '=', 'country.country_id')
			->select('user.*', 'city.*', 'state.*', 'country.*')
			->where('user.user_username', $filtered_email)
			->get()[0];
			//$user = User::where('user_username', $filtered_email)->first();
			$mId = $user->user_id;
			$username = $user->user_username;
			$email = $user->user_email;

			return $this->view->render($response, 'signin.php', array('status' => array(
				"loggedIn" => 1, 
				"id" => $mId, 
				"user_username" => $user->user_username, 
				"user_name" => $user->user_name, 
				"user_add1" => $user->user_add1,
				"user_add2" => $user->user_add2, 
				"user_city" => $user->city_name, 
				"user_state" => $user->state_name,
				"user_country" => $user->country_name, 
				"user_mobile" => $user->user_mobile, 
				"user_gender" => $user->user_gender,
				"user_dob" => $user->user_dob, 
				"user_image" => $user->user_image, 
			)));
		}else{
			return $this->view->render($response, 'signin.php', array('status' => array("loggedIn" => 0, "id" => 0, "username" => "", "email" => "", "address" => "", "phone" => "")));
		}
	}

	public function registerMobileUser($request, $response){

		$username = $request->getParam('USERNAME');
	    $email = $request->getParam('EMAIL');
		$password = $request->getParam('PASSWORD');
		$address = $request->getParam('ADDRESS');
		$phone = $request->getParam('PHONE_NUMBER');
		
		if($this->auth->doesEmailExist($email)){
			return $this->view->render($response, 'register.php', array('status' => array("loggedIn" => 0, "id" => 0, "username" => "", "email" => "", "address" => "", "phone" => "")));
		}

		//register a new user in the database
		$registerUser = new User(array(
			'username' => $username,
			'email'=> $email,
			'password' => md5($password),
			'address' => $address,
			'phone_number' => $phone
		));
		$registerUser->save();

		$user = User::where('email', $email)->first();
		$mId = $user->id;
		$name = $user->name;
		$username = $user->username;
		$email = $user->email;

		return $this->view->render($response, 'register.php', array('status' => array("loggedIn" => 1, "id" => $mId, "username" => $username, "email" => $email, "address" => $address, "phone" => $phone)));
	}

}
