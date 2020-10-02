<?php
 
class Database{
	private $PDOInstance = null;
	private static $instance = null;
	const DEFAULT_SQL_USER = 'admin';
	const DEFAULT_SQL_HOST = 'localhost';
	const DEFAULT_SQL_PASS = 'Poisson01*';
    const DEFAULT_SQL_DTB = 'projet5b';
    
	private function __construct(){
		$this->PDOInstance = new PDO('mysql:dbname=' . self::DEFAULT_SQL_DTB.';host=' . self::DEFAULT_SQL_HOST, self::DEFAULT_SQL_USER , self::DEFAULT_SQL_PASS);    
    }
    
	public static function getInstance(){  
		if(is_null(self::$instance)){
	        self::$instance = new Database();
	    }
		return self::$instance;
    }
    
	public function query($query){
		return $this->PDOInstance->query($query);
    }
    
	public function prepare($prepare){
		return $this->PDOInstance->prepare($prepare);
	}
}

