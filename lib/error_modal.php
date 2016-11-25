<!DOCTYPE html >
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BOOKS.COM</title>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


     
      <link type="text/css" media="all" href="../css/grid.css" rel="stylesheet">
      <link href="../fonts/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet"> 
      <link rel="shortcut icon" href="images/favicon.ico" />
      <link href="https://fonts.googleapis.com/css?family=PT+Sans|Raleway|Roboto|Slabo+27px" rel="stylesheet">


    
      <script src="../js/jquery-1.12.1.min.js"></script>
      <script src="../js/app.js"></script>
      <script src="../js/validate.js"></script>
      <script src="../js/check.js"></script>

<style type="text/css">

.modal {
   display: block;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}
/* Modal Content */
.modal-content {
    position: relative;
    top:10%;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 26%;
    height: 220px;
    font-family: 'Taviraj', serif;
    border-radius: 10px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: #000;
    float: right;
    font-size: 19px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
 text-align: center;
    padding: 3px 16px;
    color: #E91E63;
    font-size: 16px;
    height: 40px;
    border-bottom: 1px solid #ccc;
    font-family: 'Taviraj', serif;
}
.modal-body {
    height: 100px;
    /* line-height: 10; */
    font-size: 13px;
    padding-top: 27px;
    color: #009688;
  }

.modal-footer {
    padding: 2px 16px;
    background-color:#00c2ba;
    color: white;
    font-size:12px;
    height:40px;
    font-family: 'Taviraj', serif;
    border-radius: 0px 0px 10px 10px;
}


</style>


   </head>   

    <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
        <span id="exit" class="close">×</span>
        <div style="padding-top: 16px;">Oopz! Something Went Wrong!</div>
     </div> 
         <div class="modal-body">
       <h3 style="text-align:center">  Your Cart is Empty</h3>
     </div>
    <div>
      <button id="ok" style="width: 136px;height: 34px;background-color: #00c2ba;color: #fff;border: none;margin-left:100px">OK</button>&nbsp;
  </div>
  </div>
</div>

<script type="text/javascript">
var modal = document.getElementById('myModal');
// When the user clicks on <span> (x), close the modal
$("#exit").click(function(){
    window.location.href = "../index.php"; 
});

$("#ok").click(function(){
   //  modal.style.display = "none";
      window.location.href = "../index.php";
});
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
      //  modal.style.display = "none";
         window.location.href = "../index.php";
    }
}

</script>

        









         </div><!-- ......row close.....   -->  

              </div><!-- ......Container close.....   -->



</body>

</html>


