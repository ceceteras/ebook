<!DOCTYPE html >
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOOKS.COM</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- this is the html login -->
      <link type="text/css" media="all" href="css/cece.css" rel="stylesheet">
      <link type="text/css" media="all" href="css/grid.css" rel="stylesheet">
      <link href="fonts/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet"> 
      <link rel="shortcut icon" href="images/favicon.ico" />
      <link href="https://fonts.googleapis.com/css?family=PT+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">


    
      <script src="js/jquery-1.12.1.min.js"></script>
      <script src="js/app.js"></script>
      <script src="js/carousel.js"></script>
      <script src="js/validate.js"></script>
      <script src="js/check.js"></script>

      <style type="text/css">
        .input,[type=password],[type=text]{
                width: 100%;
                height: 47px;
                padding: 10px;
                border: 0px;
                display: block;
                margin-top: 30px;
                background-color: #fff;
                outline: none;
                       }
      </style>

   </head>   
     
<body>
  <!--  ...............Container...............   -->
    
    <div  id="container">
      <div class="row">

<!--... Carousel....  -->
          <div class="column-12 carousel" style="background-image:url(image/book.jpeg);background-attachment:fixed;opacity:0.9;position: fixed;">       
            <div class="logintxt" style="margin-top:50px">Welcome to Bookz.com</div>
              <h5 class="logintxt" style="font-size:14px"> LOGIN TO YOUR ACCOUNT</h5>
               <div class="row">
           <div align="center"  class="column-12">
             <form  action="POST">
                <div class="row">
                  <div align="center"style="border-bottom: 3px solid #ccc; width:250px">
                    <input type="text"  id="username" autocomplete="off" placeholder="Email Address">
                    <div class="error" id="usernameerror"></div>
                    <input type="password" id="password"  placeholder="Password">
                    <div class="error" id="passworderror"></div>
                    <button class="loginbutton" type="button" id="login"> Log in</button>
                    <br><br/>
                    <div style="color:white"> Forgot Password</div>
                    <br>
                 </div>
               </div>
             </form>
            </div>

            </div>
          </div>

           <!--... Carousel close....  -->

    <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span id="exit" class="close">×</span>
           <h3>ERROR!</h3>
          </div>
    <div class="modal-body">
      <div >INCORRECT USER NAME AND PASSWORD</div>
     </div>
    
      <button id="ok" style="width: 136px;height: 34px;background-color: #00c2ba;color: #fff;border: none;margin-left:100px">OK</button>&nbsp;
  
  </div>
</div>

<script type="text/javascript">
var modal = document.getElementById('myModal');
// When the user clicks on <span> (x), close the modal
$("#exit").click(function(){
     modal.style.display = "none";
});

$("#ok").click(function(){
     modal.style.display = "none";
});
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>

        









         </div><!-- ......row close.....   -->  

              </div><!-- ......Container close.....   -->



</body>

</html>


