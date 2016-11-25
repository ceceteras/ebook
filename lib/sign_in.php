<?php
session_start();
require_once("db.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	
$username= mysql_real_escape_string ($_POST['username']);
$password=md5(mysql_real_escape_string ($_POST['password']));


$chek = "select * from users where username=\"$username\"  ";
$query= mysql_query($chek);
$num= mysql_num_rows($query);
$row= mysql_fetch_array($query);



if($num !=1){
	echo 1;
	
} 
else{
$id=$row['id'];

$u=$row['username'];
$p=$row['password'];
$status= $row['status'];

}


if ($u != $username and $p!= $password ){

		echo 1;
}
elseif ($p != $password ){
	echo 2;
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
	
	echo 3;
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
	echo 4;
	
}
else {	
 header("location:sign_in.php");
}


}



?> 



<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Library</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
   <link href="fonts/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet"> 
<link href="css/cece.css"  rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script  src="js/app.js"> </script>
   
 
</head>

<body>




<div>
<div >
<h1 style="margin-left:30%; padding-bottom:0px; font-weight:bold; color:#066;font-size:45px; font-family:'Comic Sans MS', cursive">  
  <span class="glyphicon glyphicon-book" aria-hidden="true" style=" color:#C00"></span> Books.Com</h1>
<div>


<ul class="nav nav-pills" style="margin-left:65%; margin-bottom:15px" >
  <li ><a href="index.php">Home</a></li>
  <li class="active"><a href="sign_in.php">Sign In</a></li>
  <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Contact Us <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li role="separator" class="divider"></li>
          <li><a href="#">Separated link</a></li>
     </ul>
    </li>
</ul>
</div>
</div>
</div>
<div style="width:50%; margin-top:50px ;height:420px ;background-color: #EFEFEF; border-bottom-left-radius:15px; border-bottom-right-radius:15px; border-top-left-radius:15px; border-top-right-radius:15px;margin-left:20%; ">
<p align="center"><img src="image/11.png" width="124" height="152"><img src="image/10.png" width="181" height="96"></p>

<form action="" method="post" class="form-horizontal" style=" width:35%; padding-top:30px; margin-left:auto; margin-right:auto">
 
  <div class="form-group">
    <input class="form-control" type="text" id="username" placeholder="Username" >
	<div class="error" id="username"></div>
	</div>
 
    <div class="form-group">
  <input class="form-control" type="password"  id="password" placeholder="Password">
  <div class="error" id="password"></div>
  </div>
 
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
       
          <input type="checkbox"> Remember me
     
      </div>
    </div>
  </div>

 <button  type="submit" name="submit"  value="submit"  id="login" style ="margin-left:60%" class="btn btn-primary active">Log In </button>
</form>
</div>
</body>
</html>
<?php
if(isset($_GET['error'])){
if($_GET['error'] == "1"){
?>
<script type="text/javascript"> 
alert("<-- ERROR!   |   Incorrect Username and Password -->");

</script>
<?php
}
}
?>

<?php
if(isset($_GET['error'])){
if($_GET['error'] == "2"){
?>
<script type="text/javascript">
alert("<-- ERROR!   |   Incorrect Password   -->");

</script>
<?php
}
}
?>