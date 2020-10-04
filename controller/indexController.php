<?php
require_once("controller/controller.php");
require_once("model/userManager.php");

class IndexController extends Controller{
    public function index(){
        $this->view()->render('indexView.php');
    }
    public function error($error){
        $this->view()->render('errorView.php', array(
            'error' => $error
        ));
    }
}