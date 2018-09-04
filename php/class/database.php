<?php 
class Database {
	protected $PDO;
	protected $server = "mysql:host=localhost;dbname=test";
	protected $user = "root";
	protected $password = "";

	function connectDB(){
		try{
			$this->PDO = new PDO($this->server, $this->user, $this->password);
		}catch(PDOException $e){
			echo $e-getMessage();
		}
	}
	function ABC_query($query){
		try{
			$result = $this->PDO->query($query);
		}
		catch(PDOException $e){
			echo $e->e-getMessage();
		}
	}
	function select($query){
		try{
			$result = $this->PDO->query($query);
		}
		catch(PDOException $e){
			echo $e->e-getMessage();
		}
		return $result;
	}
	function disconnectDB(){
		try{
			$this->PDO = NULL;
		}
		catch(PDOException $e){
			echo $e-getMessage();
		}
	}
}

?>