<?php
session_start();
require_once('../db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password= md5(mysqli_real_escape_string($conn, $_POST['password']));

sleep(3);
			$sql = "select * from users where username=\"$username\" and password=\"$password\"";
			$query= mysqli_query($conn, $sql);
			if (!$query){
			die ("connection failed: ");
			}
			$num= mysqli_num_rows($query);
			$row= mysqli_fetch_array( $query);

if($num !=1){
	echo 100;
	
}else{


$id=$row['id'];
$u=$row['username'];
$p=$row['password'];
$status= $row['status'];


if ($u != $username and $p!= $password ){
echo 100;
}
elseif ($p != $password ){
	echo 200;
	}
	
	else  if ($u= $username and $p= $password and $status == 1 ){
		
	$_SESSION['ADMINID']=$row['id'];
	$_SESSION['USERNAME']=$row['username'];
	$_SESSION['FIRSTNAME']=$row['firstname'];
	$_SESSION['LASTNAME']=$row['lastname'];
	$_SESSION['EMAIL']=$row['email'];
	$_SESSION['SEX']=$row['sex'];
	$_SESSION['ADDRESS']=$row['address'];
	$_SESSION['PHONE']=$row['phoneno'];
	
	echo 300;
}
elseif ($u= $username and $p= $password and $status == 2 ){
    
	
	
    $_SESSION['id']=$row['id'];
	$_SESSION['USERNAME']=$row['username'];
	$_SESSION['FIRSTNAME']=$row['firstname'];
	$_SESSION['LASTNAME']=$row['lastname'];
	$_SESSION['EMAIL']=$row['email'];
	$_SESSION['SEX']=$row['sex'];
	$_SESSION['ADDRESS']=$row['address'];
	$_SESSION['PHONE']=$row['phoneno'];

//get the total items in the cart
	$user= $_SESSION['id'];
	$sql="select SUM(quantity) from orders where user_id=\"$user\""; 
	$query1=mysqli_query($conn, $sql);
	$row1=mysqli_fetch_assoc( $query1);

	$_SESSION['cart']=$row1['SUM(quantity)'];

	echo 400;
				
			}
			}
			
}
?>