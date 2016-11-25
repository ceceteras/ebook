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




  <div align="center">

  <div class="column-5">
    <div style="background: url(../image/cart3.png);background-position: 0px 11px;
      background-repeat: no-repeat; width: 150px; height: 160px;margin: 50px auto 20px;"></div>

  <h1 class="color: #595c5f;font-size: 24px; font-weight: bold; margin-bottom: 30px;text-align: left;"> Your Shopping Cart</h1>
  <p style="class=color: #898e92;line-height: 1.5;max-width: 400px;text-align: justify">
    This is an awesome and responsive shopping cart layout, made by cece. It looks nice on both desktop and mobile browsers. Try it by resizing your window (or opening it on your smartphone and pc).</p>
  </div>

  <div class="column-7" style="margin-top:60px; font-weight: bold; margin-bottom: 30px;text-align: left;">
    <h3 style="text-align:left; margin-left:150px"> Order Details</h3>

  <table width="699" height="80" align="left" >
  <tr>
    <th width="80" height="30" scope="col">&nbsp;S/N </th>
    <th width="364" scope="col">&nbsp;Item</th>
    <th width="118" scope="col">&nbsp;Quantity</th>
    <th width="118" scope="col">&nbsp; Unit Price </th>
    <th width="118" scope="col">&nbsp; Sub Total </th>
    <th width="50" scope="col">&nbsp; Delete </th>
  
  </tr>
   
   <?php
   
   $r = "select * from orders where user_id=\"$user\"";
      $rq = mysqli_query($conn, $r);
      $rn = mysqli_num_rows($rq);
      
      if($rn == 0){
?>
      
  <tr>
    <td colspan="5"> <span style="color:red"> *</span> YOUR CART IS EMPTY  </td>
  </tr>
     <tr>
      <td height="40">&nbsp;</td>
      <td style="text-align:right;padding-right:30px">&nbsp;TOTAL</td>
      <td>&nbsp;</td>
      <td> &#8358;&nbsp; 0</td>
      <td></td>
     </tr>
</table>
<div>
  <a href="../lib/booklist.php"><button style="border:none; font-family: 'Open Sans';background-color: #E91E63; outline:none;padding: 10px;color:#fff; border-radius: 8px; " type="button" >  <span class="fa fa-arrow-left"></span>  Continue Shopping</button></a>
 
      <?php
      }else{
       $i = 1;
       $total = 0;
       $subtotal = 0;
   while($rr = mysqli_fetch_array($rq)){

    $subtotal = $rr['price'] *  $rr['quantity'];
    $total += $rr['price'] * $rr['quantity'];
  
   ?>
   
  <tr>
    <td height="45"><?php echo $i . "."; ?></td>
    <td><?php echo $rr['item']; ?></td>
    <td><input type="number" min="1" style="text-align:center;width:50px; height:30px" value="<?php echo $rr['quantity'] ?>"></td>
    <td>&nbsp; &#8358; <?php echo $rr['price'] ?></td>
    <td>&nbsp; &#8358; <?php echo $subtotal ?></td>
    <td>&nbsp;<a href="delete.php?delete=<?php echo $rr['id'] ?>"><i style="color:red" class="fa fa-close"></i></a></td>

  </tr>
  
  <?php
  $i++;
  }
   ?>
  
        <tr>
    <td height="40" style="border:none !important">&nbsp;</td>
    <td style="border:none !important">&nbsp;</td>
    <td style="border:none !important">&nbsp;</td>
    <td style="text-align:right;padding-right:30px; font-weight:900;">&nbsp; TOTAL </td>
    <td style="border:2px solid #0c3 !important; font-size:15px; font-weight:600; color:#7b7575"> &#8358; &nbsp;<?php echo $total ?></td>
     </tr>
</table>
<div>
 
 

  <a href="../lib/booklist.php"><button style="border:none; font-family: 'Open Sans';background-color: #E91E63; outline:none;padding: 10px;color:#fff; border-radius: 8px; " type="button" >  <span class="fa fa-arrow-left"></span>  Continue Shopping</button></a>
    
   <a href="../index.php"><button style="border:none;font-family: 'Open Sans'; background-color: #ffc107;outline:none; padding:10px;color:#fff ;border-radius: 8px; float:right;margin-right:80px" type="button" >  Proceed to Checkout  <span class="fa fa-arrow-right"></span> </button><br></a>
</div>
<?php
}
?><div>
    
  
  


</div>
</div>
</div>
</div>


</body>
</html> 