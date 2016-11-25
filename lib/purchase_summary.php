<?php
session_start();
require_once("../db.php");

  if (isset($_SESSION['id'])){

      $user = $_SESSION['id'];
      $sql = "select SUM(quantity) as qty from orders where user_id=\"$user\"";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($query);
      $totalqty = $row['qty'];
 
          }else{
      $_SESSION['unknown_user']=0;
      $user = $_SESSION['unknown_user'];
      $sql = "select SUM(quantity) as qty from orders where user_id=\"$user\"";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($query);
      $totalqty = $row['qty'];
      
    }               

 ?>


<!DOCTYPE html >
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOOKS.COM</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


      <link type="text/css" media="all" href="../css/cece.css" rel="stylesheet">
      <link type="text/css" media="all" href="../css/grid.css" rel="stylesheet">
      <link href="../fonts/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet"> 
      <link rel="shortcut icon" href="images/favicon.ico" />
      <link href="https://fonts.googleapis.com/css?family=PT+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">


    
      <script src="../js/jquery-1.12.1.min.js"></script>
      <script src="../js/app.js"></script>
      <script src="../js/validate.js"></script>
      <script src="../js/check.js"></script>

<style type="text/css">
  a:link    { background-color:transparent; color: #0c8074; text-decoration:none}
  a:visited { background-color:transparent; color: #0c8074; text-decoration:none}
  a:hover   { background-color:transparent; color:green; text-decoration:none;}
  a:active  {background-color:transparent; color:yellow; text-decoration:none}
</style>


   </head>   
     
<body style="margin:0">
  <!--  ...............Container...............   -->
    
    <div  id="container">
      <div  class="row">


      <!--  ...............header...............   -->
        <div class= "column-12" id="header">
            <span class="column-6">
        <ul  style="float:left"  class="topnavul">
            <li class="topnavlileft"><i class="fa fa-pinterest"></i></li>
            <li class="topnavlileft"><i class="fa fa-facebook"></i></li>
            <li class="topnavlileft"><i class="fa fa-twitter"></i></li>
            <li class="topnavlileft"><i class="fa fa-youtube"></i></li>
            <li class="topnavlileft"><i class="fa fa-instagram"></i></li>
            <li class="topnavlileft"><i class="fa fa-linkedin"></i></li> 
          </ul>
         </span>
       <span class="column-6 topnavspan ">
          <ul class="topnavul">
            <li class="topnavli"><a href="../lib/cart.php">MY CART</a></li>
            <li class="topnavli"><a href="../login.php">LOGIN</a></li>
            <li class="topnavli"><a href="../lib/signup.php">REGISTER</a></li>
            <li class="topnavli"><a href="../support.php">SUPPORT</a></li>
          </ul>
       </span>
            
        </div>
      <!-- ......header close.....   -->
          <br style="clear:both">


                 <!--...Main header bar.....   -->
          <div  class=" column-12 mainheader">
        
            <span class="column-3 title"><a style="color:#fff;" href="../index.php">Bookz.com </a></span>
              <span class="column-5">  
                  <form action="" method="post" >
                      <input class="search-bar" type="text"  id="searchit" class="form-control" placeholder=" Search for...">
                  </form>
                </span> 
                <div class="column-1">
                <div align="center" style="background-color: #fff; border-radius:50px; width:70px"> 
                    
             <div style="font-size: x-small;color: #070b31;width: 26px;background-color: yellow;border-radius: 50%;text-align: center;padding: 3px;">
             
              <?php
              if(is_null($totalqty)){
              echo "0";
              }else{
              echo $totalqty;
              }
              ?>
             
           </div> 
              <img src="../image/cart_icon.png"  height="35" width="35">
            </div> 
            </div> 

            <div class="column-2">
              <div style="color:#fff;font-size:13px;font-family: 'Open Sans';" > WELCOME  &nbsp;

                <?php 
              if (isset($_SESSION['FIRSTNAME'])){
                  echo $_SESSION['FIRSTNAME']; 
              }else{
                  echo " ";
           }
             ?> 
                <div class="dropdown">
            <i  class="z-icon fa-angle-down fa-lg fa"></i>

              <div style="min-width: 90px;padding: 1px;" class="dropdown-content">
                <a href="../lib/logout.php">Log out</a>                
              </div>
            </div>
             
                       
              </div>
            </div>  
        </div>
         <!--...Main header bar close.....   -->


  <main>


  </main>
</body>
<html>