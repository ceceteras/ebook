<?php
session_start();
require_once("db.php");
if (isset($_SESSION['id'])){

      $user = $_SESSION['id'];
      $sql = "select SUM(quantity) as qty from orders where user_id=\"$user\"";
      $query = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($query);
      $totalqty = $row['qty'];
 
          }else{

      $_SESSION['unknown_user']= md5(time());
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
<title>BOOKZ.COM</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


      <link type="text/css" media="all" href="css/cece.css" rel="stylesheet">
      <link type="text/css" media="all" href="css/grid.css" rel="stylesheet">
      <link href="fonts/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet"> 
      <link rel="shortcut icon" href="images/favicon.ico" />
      <link href="https://fonts.googleapis.com/css?family=PT+Sans|Raleway|Roboto|Slabo+27px|Taviraj" rel="stylesheet">
      


    
      <script src="js/jquery-1.12.1.min.js"></script>
      <script src="js/app.js"></script>
      <script src="js/validate.js"></script>
      <script src="js/check.js"></script>
      <script type="text/javascript">
        window.onload = function(){
          console.log(document.body.clientWidth);
        }
      </script>


   </head>   
     
<body>
 
  <!--  ...............Container...............   -->
    
    <div  id="container">
      <div class="row">


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
            <li class="topnavli"><a href="lib/cart.php">MY CART</a></li>
            <li class="topnavli"><a href="login.php">LOGIN</a></li>
            <li class="topnavli"><a href="lib/signup.php">REGISTER</a></li>
            <li class="topnavli"><a href="support.php">SUPPORT</a></li>
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
              <img src="image/cart_icon.png"  height="35" width="35">
            </div> 
            </div> 

            <div class="column-2">
                    <?php 
              if (isset($_SESSION['FIRSTNAME'])){
                               ?>
              <div style="color:#fff;font-size:13px;font-family: 'Open Sans';" > WELCOME  &nbsp;
                <div class="dropdown">            
            <?php
             echo $_SESSION['FIRSTNAME']; 
             ?>
             <i  class="z-icon fa-angle-down fa-lg fa"></i>
              <div style="min-width: 90px;padding: 1px;" class="dropdown-content">
                <a href="lib/logout.php">Log out</a>                
              </div>
            </div>
            
            <?php
             }else{ 
             ?>   
             <div style="color:#fff;font-size:13px;font-family: 'Open Sans';" > WELCOME  &nbsp;
             <?php         
                echo " ";
           }
             ?> 
                       
              </div>
            </div>  
        </div>
         <!--...Main header bar close.....   -->



          <!--...Sub header bar.....   -->
         <div class=" column-12" style="background-color:#f6f6f6; height:55px; ">

          <ul class="column-8 headernavul">
            <li class=" activenav">HOME</li>
            <a href="lib/booklist.php"><li class=" headernavli">CATEGORIES</li></a>
            <li class=" headernavli">E-BOOKS</li>
            <li class=" headernavli">SUPPORT</li>
            <li class=" headernavli">CONTACT</li>
          </ul>
            
        </div>

          <!--...Sub header bar close.....   -->




          <!--... Carousel....  -->
          <div class="column-12 carousel">           
                 <div class="carousel_text"> Welcome to our Bookstore</div>
              <h4 style="text-align:center; color:white; font-family: 'Raleway', sans-serif;margin-bottom:200px"> Collection of the Millennium</h4>

                 <!--... Quote....  -->

       <div>      
          <p  align="center"  style="border-bottom: 1px solid  #CCC; border-top: 1px solid  #CCC;" class="boldfont"> <i class="fa fa-quote-left fa-2x"></i>  
          A book you finish reading is not the same book it was before you read it and so
          if you wanna hide anything from a blackman, put it in books....   
            <br>
                      -David Mitchelle
            <i class="fa fa-quote-right fa-2x"></i></p>
         </div>

         <!--... Quote Close....  -->
         
            </p>
          </div>

           <!--... Carousel close....  -->





          <div class="column-12"> 
            <div style="height: 500px;padding-top: 45px;">
           <div align="center" style="color:black;font-size: 24px;text-align: center;margin-bottom: 45px;font-family: 'Raleway', sans-serif;font-weight: bold;">LATEST COLLECTIONS</div><br>

        <div class="column-2">
           <div class="pic-box">
            <img src="image/books/love.jpg"   height="200" width="150">
          </div>
        </div>  

        <div class="column-2">
          <div class="pic-box">
            <img src="image/books/underworld.jpg"   height="200" width="150">
          </div>
        </div>

        <div class="column-2">
          <div class="pic-box">
            <img src="image/books/Essence.png"  height="200" width="150">
          </div>
        </div> 

          <div class="column-2">
            <div class="pic-box">
            <img src="image/books/russia.jpg"  height="200" width="150">
          </div>
        </div> 
          
        <div class="column-2">   
          <div class="pic-box">
            <img src="image/books/romance.jpg"  height="200" width="150">
          </div>
        </div>

         <div class="column-2">
          <div class="pic-box">
            <img src="image/books/Essence.png"  height="200" width="150">
          </div>
         </div>
          
  
            </div>
          </div>







                <!--... Info box....  -->

            <div class="column-12 " style=" background-color:#f1f1f1;  ">
              <div align="center" style="width: 90%;height: 400px; margin: 0 auto;">
           <div class=" column-4 ">
              <div class="floated-box">
             <div class="box-header"> BOOKS.COM </div>
             <p>
             my name is Duru cynthia and i am a developer , funny as it sounds, am wondering wat u are doing on my page, buh i aint gonna say notin now, and u better not screw dis up. i know wat you are reading is gibberish buh i had nothing to type here so dont complain..thanks for reading my rubbish...ciao
             </p>
             </div>
           </div>
           <div class=" column-4 ">
              <div class="floated-box">
             <div class="box-header"> AMAZON BOOKS </div>
             <p>
             my name is Duru cynthia and i am a developer , funny as it sounds, am wondering wat u are doing on my page, buh i aint gonna say notin now, and u better not screw dis up. i know wat you are reading is gibberish buh i had nothing to type here so dont complain..thanks for reading my rubbish...ciao
             </p>
             </div>
           </div>
          
           <div class=" column-4 ">
              <div class="floated-box">
             <div class="box-header"> E-BAY BOOKS </div>
             <p>
             my name is Duru cynthia and i am a developer , funny as it sounds, am wondering wat u are doing on my page, buh i aint gonna say notin now, and u better not screw dis up. i know wat you are reading is gibberish buh i had nothing to type here so dont complain..thanks for reading my rubbish...ciao
             </p>
             </div>
           </div>
         </div>
         </div>
             <!--...Info box close....  -->




            <div class="column-12"> 
            <div  align="center"  style="height: 400px;">

          <div class="column-3">
            <div class="floated-circle">
            <img src="image/circle4.jpg"  height="150" width="150">
            </div>  
          </div>

          <div class="column-3">
            <div class="floated-circle">
            <img src="image/circle2.png"  height="150" width="150">
            </div> 
          </div>

          <div class="column-3">
            <div class="floated-circle">
            <img src="image/circle1.png"  height="150" width="150">
            </div> 
          </div>

          <div class="column-3">
            <div class="floated-circle">
            <img src="image/circle3.png"  height="150" width="150">
            </div> 
          </div> 

           </div>
         </div>

               <?php

      include ('footer.php');
             ?>



         </div><!-- ......row close.....   -->  

              </div><!-- ......Container close.....   -->



</body>

</html>


