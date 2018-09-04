<?php
require_once 'database.php';
class Users{
	function Create($name, $last_name, $email, $password, $db){
		$db->ABC_query("INSERT INTO users (name, last_name, email, password) 
			VALUES ('$name', '$last_name', '$email', '$password')");
	}
	function Delete($id, $db){
		$db->ABC_query("DELETE FROM users WHERE id='$id'");
	}
}
?>