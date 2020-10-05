<?php
require_once("controller/controller.php");

class UserController extends Controller{ //delete user
	public function delete($id){ 
        if(isset($_SESSION["user"])){
            if($_SESSION["user"]->isAdmin()){
				$userSelected = $this->userMan()->getById($id);
				if(!$userSelected->isAdmin()){
					$return = $this->userMan()->delete($id);

					$reponse["status"] = $return;
					$reponse["idUser"] = $id;
					echo json_encode($reponse);
				}else{
					$reponse["status"] = false;
					$reponse["idUser"] = $id;
					echo json_encode($reponse);
				}
            }
        }
	}
	
	public function login($username=null, $password=null){ //user login
		if(!empty($username) && !empty($password)){ 
			if($user = $this->userMan()->getByUsername($username)){ //check if user already exists in db
				if(password_verify($password, $user->password())){
					$_SESSION['user'] = $user;

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

	public function register($username=null, $firstname=null, $lastname=null, $password=null){ //user register
		if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($password)){
			if($this->userMan()->getByUsername($username) === false){ //check if user already exists in db
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

	public function logout(){ //user logout
		$_SESSION["user"] = "";
		session_destroy();

		$result["status"] = true;
		echo json_encode($result);
	}
}