<?php
require_once("controller/controller.php");
require_once("model/userManager.php");

class UserController extends Controller{
	private $_userMan;
	
	public function __construct(){
		parent::__construct();
		$this->_userMan = new UserManager();
	}

	public function login($username=null, $password=null){
		if(!empty($username) && !empty($password)){
			if($user = $this->userMan()->getByUsername($username)){
				if(password_verify($password, $user->password())){
					// Connect the user
					
				}else{
					http_response_code(401);
				}
			}else{
				http_response_code(404);
			}
		}else{
			$this->view()->render('userLoginView.php');
		}
	}

	public function register($username=null, $firstname=null, $lastname=null, $password=null){
		if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($password)){
			if(!$this->userMan()->getByUsername($username)){
				$this->userMan()->add(new User(null, $firstname, $lastname, $username, password_hash($password, PASSWORD_DEFAULT), new DateTime('NOW'), 0));
				http_response_code(200);
			}else{
				http_response_code(401);
			}
		}else{
			$this->view()->render('userRegisterView.php');
		}
	}

	public function userMan(){
		return $this->_userMan;
	}
}