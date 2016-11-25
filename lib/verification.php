<?php
require_once("db.php");
// this code is to verify sign up by sending an email to the user to confirm
if(isset($_POST['submit']))
{
	
	$firstname= $_POST['firstname'];
	$lastname= $_POST['lastname'];
	$email= $_POST['email'];
	$sex= $_POST['sex'];
	$pass= $_POST['password'];
	$code=substr(md5(mt_rand()),0,15);
	
	
	$insert=mysql_query("insert into verify values('',$sex,'$email','$pass','$code',$firstname,$lastname)");
	$db_id=mysql_insert_id();
	

	$message = "Your Activation Code is ".$code."";
    $to=$email;
    $subject="Activation Code For BOOKS.COM";
    $from = 'durucynthia@gmail.com';
    $body='Your Activation Code is '.$code.' Please Click On This link <a href="verification.php">Verify.php?id='.$db_id.'&code='.$code.'</a>to activate your account.';
    $headers = "From:".$from;
    mail($to,$subject,$body,$headers);
	
	echo "An Activation Code has been sent to your email to verify your account";
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	
	$id=$_GET['id'];
	$code=$_GET['id'];
	require_once("db.php");
	$select=mysql_query("select firstname,lastname,sex,email,password from verify where id='$id' and code='$code'");
	if(mysql_num_rows($select)==1)
	{
		while($row=mysql_fetch_array($select))
		{
			$email=$row['email'];
			$password=$row['password'];
			$sex=$row['sex'];
			$lastname=$row['lastname'];
			$firstname=$row['firstname'];
			
		}
		$insert_user=mysql_query("insert into users values('','$email','$password','$sex','$lastname','$firstname')");
		$delete=mysql_query("delete * from verify where id='$id' and code='$code'");
	}
}

?>