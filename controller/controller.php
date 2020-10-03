<?php
require_once("class/View.php");
class Controller{
    private $_view;

    public function __construct(){
        $this->_view = new View();
    }

    public function view(){
        return $this->_view;
    }
}