<?php
require_once("controller/controller.php");
require_once("model/userManager.php");

class IndexController extends Controller{
    public function index(){
        $this->view()->render('indexView.php');
    }
}