<?php
$root_doc = 'https://hpiedade.com.br/';

define('DB_HOST', 'localhost' ); // set database host
define('DB_USER', 'root' ); // set database user
define('DB_PASS', 'root' ); // set database password
define('DB_NAME', 'h_piedade' ); // set database name
	

class DB{
    private $link;
	
	public function connect(){
		$this->link = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
        if( mysqli_connect_errno() ){
            echo "FALHA: ", mysqli_connect_error();
            exit();
        }
	}
	
        
    public function __construct(){
	   $this->connect(); 
	}
	
	
	
	public function __destruct(){
		$this->disconnect();
	}
	
	
    
    public function disconnect(){
		mysqli_close( $this->link );
	}
	
	
	
	public function select($query){	
		$result = $this->link->query($query);				
		return $result;		
	}
	
	
	public function rows($query){	
		//error_reporting(0);
		return mysqli_num_rows($query);
		
	}
	
	
	public function expand($query){	
		return mysqli_fetch_array($query,MYSQLI_ASSOC);
	}
	
	
	public function last_id($query){	
		return mysqli_insert_id($this->link);
	}
	
	
	
	public function execute($query){	
		$result = $this->link->query($query);	
	}
	
	
	public function escape($var){
		$result = $this->link->real_escape_string($var);
		return $result;		
	}
	
	

}