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
                    
             <div id= "count" class="cart-value">

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
              <div style="color:#fff;font-size:13px;font-family: 'Open Sans';" > WELCOME&nbsp;

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

         <main>
               <!--...Breadcrumb .....   -->
         <div class="row">
          <div class="column-12 ">
            <ul class="breadcrumb">
            <li class="breadcrumbli"><a  href="../index.php"><i class="fa fa-home"></i> Home</a><span> >&nbsp &nbsp</span> </li>
               <div class="dropdown">
            <li id="show" class="breadcrumbli"><i class="fa fa-user"></i> Category<span>&nbsp &nbsp</span></li>

              
            </div>
            <li class="breadcrumbli"><i class="fa fa-list"></i> Motivational<span> >&nbsp &nbsp</span></li>
    
          </ul>
        </div>
      </div>
            <!--Breadcrumb close -->
            <div align="center" style="background-color:#f9f9f9; height:50px; margin-bottom:20px">
                <select style="width:250px; height:40px; margin-top:5px; border:none;border-radius:4px;border: 1px solid #ccc; outline:none;padding-left:30px" >                  
                  <option value="volvo">CHOOSE AN OPTION</option>
                  <option value="audi">Pre-School Books</option>
                  <option value="audi">Nursery School Books</option>
                  <option value="saab">Primary School Books</option>
                  <option value="opel">Secondary School Books</option>
                </select>
            </div>
            <!-- Start Book list -->
        <div class="row">
          <div class="column-12"  >
           <div class="column-3">
              <ul class="left-nav-listul">
                <li class="left-nav-list" style="background-color: #00c2ba;color:white;">CATEGORY</li>
                <li class="left-nav-list"><a href="#">Inspirational</a></li>
                <li class="left-nav-list"><a href="#">School Books</a></li>
                <li class="left-nav-list"> <a href="#">Motivational</a></li>
                <li class="left-nav-list"> <a href="#">Academic</a></li>
                <li class="left-nav-list"><a href="#">Science</a></li>
                <li class="left-nav-list"><a href="#">Newspaper</a></li>
                <li class="left-nav-list"><a href="#">Spiritual</a></li>
                <li class="left-nav-list"><a href="#">History</a></li>
                <li class="left-nav-list"><a href="#">Literature</a></li>
                <li class="left-nav-list"><a href="#">Comic</a></li>
                <li class="left-nav-list"><a href="#">Motivational</a></li>
                <li class="left-nav-list"><a href="#">Academic</a></li>
                <li class="left-nav-list"><a href="#">Science</a></li>
                <li class="left-nav-list"><a href="#">Newspaper</a></li>
                <li class="left-nav-list"><a href="#">Spiritual</a></li>
                <li class="left-nav-list"><a href="#">History</a></li>
                <li class="left-nav-list"><a href="#">Literature</a></li>
                <li class="left-nav-list"><a href="#">Academic</a></li>
                <li class="left-nav-list"><a href="#">Science</a></li>
                
              </ul>
            </div>

          <div class="column-9 listbox"> 

          <?php
          $book="select * from books";
          $query= mysqli_query($conn, $book);            
          while($row=mysqli_fetch_array($query)) {
          $bookid =$row['book_id'];
                ?>

            <input type="hidden" id="bookid_<?php echo $bookid ?>" > <?php echo $bookid ?>
            <div  align="center" class="book-row">            
            <a href="details.php?id=<?php echo $bookid;  ?>">
             <img  style=" border-radius:1px;" src="<?php echo $row['pic'] ?>" width="130" height="180"></a>
             <br> 
            <div style="font-family: 'Open Sans', sans-serif; font-size:11px"><?php echo $row['booktitle'] ?><br></div>
            <div  style="color:red"> &#8358;<?php echo $row['price'] ?></div>
            <div  id="addToCartButton" onclick="addToCartButton();" style="cursor:pointer;width: 110px;background-color: #ffc107;color: #fff;padding: 7px;letter-spacing: 1px;font-family: 'Open Sans';font-weight:600;border-radius: 2px;border:none;outline:none;"><i class="fa fa-shopping-cart" ></i>&nbsp;  BUY NOW</div>
                
            </div>

              <?php
                  }

              ?>
            </div>

         </div>
           <!--...Book list close.....   -->
         </div>

       </div>


            <br style="clear:both">
            <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
           <p>&nbsp;</p>
            <?php

      include ('../footer.php');
             ?>

<?php
  include ('modal.php');
?>
         </div><!-- ......row close.....   -->  

              </div><!-- ......Container close.....   -->
            </main>  
            </body>
            </html>


