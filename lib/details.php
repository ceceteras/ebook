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

if (isset($_SESSION['unknown_user'])){
      $user = $_SESSION['unknown_user'];
      $sql = "select SUM(quantity) as qty from orders where user_id=\"$user\"";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($query);
      $totalqty = $row['qty'];
      
    }               

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
     <!-- <script src="../js/app.js"></script>-->
      <script src="../js_core/app.js"></script>
      <script src="../js_core/widgets.js"></script>
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
    
    <main  id="container">
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
                    
             <div id= "count" style="font-size: x-small;color: #070b31;width: 26px;background-color: yellow;border-radius: 50%;text-align: center;padding: 3px;">
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
              ?>
                <div class="dropdown">
            <i  class="z-icon fa-angle-down fa-lg fa"></i>

              <div style="min-width: 90px;padding: 1px;" class="dropdown-content">
                <a href="../lib/logout.php">Log out</a>                
              </div>
            </div>
            
            <?php
             }else{
                  echo " ";
           }
             ?> 
                       
              </div>
            </div>  
        </div>
         <!--...Main header bar close.....   -->
               

         <!--... Breadcrumb .....   -->
          <div  class="row">
          <div class="column-12 ">
            <ul class="breadcrumb">
            <li class="breadcrumbli"><i class="fa fa-home"></i> Home<span> >&nbsp &nbsp</span> </li>
            <li class="breadcrumbli"><i class="fa fa-user"></i> Category<span>  > &nbsp &nbsp</span></li>
            <li class="breadcrumbli"><i class="fa fa-list"></i> Motivational<span> >&nbsp &nbsp</span></li>
    
          </ul>

          <span style="float:right;color:#0c3;margin-right:100px; padding-top:20px;">
            <!-- #BeginDate format:Am1 -->July 13, 2016<!-- #EndDate -->
           </span>

        </div>
      </div>
        <!--...Breadcrumb close.....   -->
            <?php
              if (isset($_GET['id'])){
               
                $id=$_GET['id'];
                
              $read="select * from books where book_id=\"$id\""; 
              $query=mysqli_query($conn, $read);
              if(!$query){
              echo "error";
              }
              }
              ?>
        <?php
        $row=mysqli_fetch_array( $query);
        ?>
         <div  class="row">
          <div  class="column-12 ">
            <h2  style="font-weight:500;font-family: Verdana, Geneva, sans-serif;padding-top:20px;margin-left: 25%;color:#555"> 
              <?php echo $row['booktitle'] ?>  </h2>
            </div>

           <div align="center" class="column-12">
            <div style="padding-top: 15px;padding-left: 120px;">
              <div class="column-2">
                <img  style="padding-right:50px; border-radius:3px" src="<?php echo $row['pic'] ?>" width="237" height="250">
              </div>

              <div class="column-4" style="text-align:justify;line-height:2.4;margin-left: 70px;font-size:13px;font-size:14px;  font-family: 'Open Sans'">
                  <span style="color:#ce3426; font-size: 20px; font-family: monospace ">Price:     &#8358; <?php echo $row['price']. ".00" ?> 
                  </span>
                  <br>
                  <input type="hidden" id="bookid" value="<?php echo $id ?>"> 

                  Author: <span style="color:#0c3; ">  <?php echo $row['author'] ?></span>
                  <br>
                 
                  Category: <span style="color:#0c3">  <?php echo $row['booktitle'] ?></span>
                  <br>
               

                  Language: <span style="color:#0c3">  <?php echo $row['booktitle'] ?></span>
                  <br>
                
                  Publisher: <span style="color:#0c3">  <?php echo $row['booktitle'] ?></span>
                  <br>
              
                  Publication Date: <span style="color:#0c3">  <?php echo $row['pd'] ?></span>
                  <br>
                  
                  File Size: <span style="color:#0C3">  <?php echo $row['filesize'] ?>MB</span>
                  <br>
                  
                  ISBN: <span style="color:#0C3">  <?php echo $row['isbn'] ?></b></span>
                  <br>

              </div>


              <div class="column-3">
                <button id="addToCartButton" onclick="addToCartButton();" class="btn-lg" ><span class="fa fa-shopping-cart"></span>&nbsp;BUY NOW</button>
              </div>
              </div>
              </div>

                        <br style="clear:both">
               <div>
                <p style="font-family: 'Raleway', sans-serif;text-align:justify;max-width:58%;margin-left: 160px;overflow:hidden;line-height: 28px;font-size: 13px;">
                <?php echo $row['details'] ?> ..... 
                 </p>
               </div>

           <div  class="row">
              <div align="center" class="column-8" style="margin-top:50px;margin-left: 112px;">
              <div class="column-3">
              <button style="cursor:pointer;background-color:#0c3;padding: 10px;color:#fff; border-radius: 8px; " type="button" > <span class="fa fa-download"></span> Instant Download</button>
              <br>
              <br>
             
              <button style="cursor:pointer;background-color:#0c3;padding: 10px;color:#fff; border-radius: 8px; outline:none; border:none" type="button" >  <span class="fa fa-arrow-left"></span>    Continue Shopping</button>
              <br>
              <br>
              </div> 
             
              <div class="column-3" style="float:right">
              <button  type="button" onclick="addToCartButton();" style="cursor:pointer;background-color:#0c3;padding:10px;color:#fff ;border-radius: 8px; outline:none; border:none"   > <span class="fa fa-shopping-cart"></span>   Add to Cart</a></button>
             
              <br>
              <br>
              <a href="cart.php">
              <button style="cursor:pointer;background-color:#0c3;padding:10px;color:#fff ;border-radius: 8px; outline:none; border:none" type="button" >    Proceed to Checkout  <span class="fa fa-arrow-right"></span> </button><br>
              </a>
             
              </div>
              </div>
          </div>

</div>

 <?php
  include ('modal.php');
?>


 </div><!-- ......row close.....   -->  

  </main><!-- ......Container close.....   -->
  
</body>
</html>

