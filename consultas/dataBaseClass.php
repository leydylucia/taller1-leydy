<?php
/*@acces las variables host,dbname,pot,user,password,driver,
*connect son privadas
//@var $db = new PDO ($dsn,$username,$password);
//@var $dsn= 'mysql:host=localhost;dbname=test;port=3306';
**@AUTOR LEYDY LUCIA CASTILLO ficha 545715 pradera mañana
*/
class DataBaseClass {
  private $host,
          $dbname,
		  $port,
		  $user,
		  $password,
		  $driver,
		  $connect;
		  
  public function __construct($host,$dbname,$user,$password,$port=3306,$driver= 'mysql'){
    $this->host= $host;
    $this->dbname= $dbname;
	$this->port= $port;
	$this->user=$user;
	$this->password=$password;
	$this->driver=$driver;
  }	
public function getInstance(){
 if(!$this->connect){
    try {
	$dsn= $this->driver
	        . ':host='
            . $this->host
            . ';dbname=' . $this->dbname
            . ';port=' . $this->port;
   		$this->connect = new PDO($dsn,
                    $this->user,
                    $this->password);					

	} catch(PDOExepcion $exc){
	  echo $exc->getMessage();
	}    
 }
 return $this->connect;
}  

}