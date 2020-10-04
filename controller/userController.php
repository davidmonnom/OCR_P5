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
					$_SESSION['connected_user'] = $user;

					$result["status"] = true;
					echo json_encode($result);
				}else{
					$result["status"] = false;
					echo json_encode($result);
				}
			}else{
				$result["status"] = false;
				echo json_encode($result);
			}
		}else{
			$this->view()->render('userLoginView.php');
		}
	}

	public function register($username=null, $firstname=null, $lastname=null, $password=null){
		if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($password)){
			if($this->userMan()->getByUsername($username) === false){
				$return = $this->userMan()->add(new User(null, $firstname, $lastname, $username, password_hash($password, PASSWORD_DEFAULT), new DateTime('NOW'), 0));
				$result["status"] = $return;
				echo json_encode($result);
			}else{
				$result["status"] = false;
				echo json_encode($result);
			}
		}else{
			$this->view()->render('userRegisterView.php');
		}
	}

	public function userMan(){
		return $this->_userMan;
	}
}