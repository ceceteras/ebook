<?php
session_start();
require_once("../db.php");

if (!isset($_SESSION['ADMINID'])){
session_destroy();
header("location:index.php");	
} 

	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>BOOKS.COM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 

 
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery-1.12.1.min.js"></script>
  
 <style>
 .topmenu
 {
	color: #FFF;
	width: 170px;
	margin-top: 4px;
	height: 40px;
	background-color:rgba(26, 188, 156,1.0);
	border-radius: 5px;
	padding-top: 2px;
	text-align: center;
	padding-top: 7px;
	 }
 </style>
</head>
<body>


<div>
<div >
<h1 style="margin-left:30%; padding-bottom:0px; font-weight:bold; color:#066;font-size:45px; font-family:'Comic Sans MS', cursive">  
  <span class="glyphicon glyphicon-book" aria-hidden="true" style=" color:#C00"></span> Books.Com</h1>
<div>


<ul class="nav nav-pills" style="margin-left:75%;" >Administrator |  <?php echo $_SESSION['FIRSTNAME']?>
  <li ><img src="../image/q22.png" width="75" height="75"><a href="../index.php">Home</a></li>
  <li class="active"><img src="../image/q1.jpg" width="75" height="75"><a href="../logout.php">Log Out</a> </li>
</ul>
</div>
    <div class="row">
      <div class="span9">
        Level 1 column
        <div class="row">
          <div class="span6">Level 2</div>
          <div class="span3">Level 2</div>
        </div>
      </div>
    </div>


<div class="row" >

<div class="span12">
<img src="../image/circle-512.png" width="150" height="150"> 
</div>

<div >
<img src="../image/circle-xxl.png" width="150" height="150"> 
</div>

<div>
<img src="../image/img-thing.jpg" width="150" height="150">
 </div>
 
<div>
<img src="../image/circle-purple-big.png" width="150" height="150">
</div>

<div>
<img src="../image/U0026_Large_1_Inch_Circle_Punch.jpg" width="150" height="150">
</div>
<div style="margin-top:40px; height:500px; width:100%; border-top:#FFF; background-color:#EFEFEF ">
<div style="float:left">
<ul >
	<li class="topmenu"><a class="pressed" href="../index.php" style="color:#fff; font-weight:bold"> Users</a></li>
	<li class="topmenu"><a href="../admin.php" style="color:#fff; font-weight:bold">Admin Account</a></li>
    <li class="topmenu"><a href="../admin.php" style="color:#fff; font-weight:bold">New Category</a></li>
	<li class="topmenu"><a href="../registrar.php"style="color:#fff; font-weight:bold">New Book</a></li>
	<li class="topmenu"><a href="../dcr.php" style="color:#fff; font-weight:bold"> Stock</a></li>
	<li class="topmenu"><a href="../cr.php" style="color:#fff; font-weight:bold">Sales Summary</a></li>
  </ul>
</div>

<div  style=" background-color:#CCC;  height:70px;width:100%; margin-right:0px;" >
<div style="float:right;">


 <a class="btn btn-block btn-social btn-twitter">
    <span class="fa fa-twitter"></span> Sign in with Twitter
  </a>
    <br style="clear:both">
	</div>
    <div align="center" style=" text-align:center; padding-top:50px; vertical-align:bottom">			
<a > &copy;2016 Duru Cynthia </a>
</div>
</body>
</html>



<?php
if(isset($_GET['success'])){
if($_GET['success'] == "one"){
?>
<script type="text/javascript">
alert("<-- Successfully Added New Record | Entry Successful -->");

</script>
<?php
}
}
?>

<?php
if(isset($_GET['bookexist'])){
if($_GET['bookexist'] == "one"){
?>
<script type="text/javascript">
alert("<-- BOOK ALREADY EXISTS -->");

</script>
<?php
}
}
?><?php
if(isset($_GET['error'])){
if($_GET['error'] == "8"){
?>
<script type="text/javascript">
alert("<--  Upload Error  -->");

</script>
<?php
}
}
?>

