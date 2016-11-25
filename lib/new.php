<?php
require_once("db.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$page  = $_POST['page'];
	switch ($page){
		
		case 1:
			$lastname = strtoupper(filter_var($_POST['lastname'], FILTER_SANITIZE_STRING));
			$firstname =strtoupper(filter_var($_POST['firstname'], FILTER_SANITIZE_STRING));
			$address= strtoupper(filter_var($_POST['address'], FILTER_SANITIZE_STRING));
			$email = strtoupper(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
			$username =strtoupper(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
			/*  FILTERS AND PREVENTS WRONG CODES FORM ENTERING THE DATABASE*/
			$phoneno= mysql_real_escape_string( $_POST['phoneno']);
	        $sex= mysql_real_escape_string ($_POST['sex']);// what is d diff btw these two functions?
			$password= $_POST['password'];
			$status=2;
		
			$sql= "INSERT INTO users set
					username=\"$username\",
					firstname=\"$firstname\",
					lastname =\"$lastname\", 
					email =\"$email\",
					sex =\"$sex\",
					password=\"$password\", 
					address=\"$address\", 
					phoneno =\"$phoneno\",
					status=\"$status\"";
					
			
			$query = mysql_query($sql) or  die("Failed to perform query: " . mysql_error());
			if (!$query) {
				echo 100;
			}else{
				echo 200;
				$_SESSION['USER']=$username;
			}
		break;
		
		default: echo "NONE";

		
	}
}