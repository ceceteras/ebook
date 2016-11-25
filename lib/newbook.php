<?php
session_start();
require_once("../db.php");
if (isset($_POST['submit'])){

            $booktitle =(filter_var($_POST['booktitle'], FILTER_SANITIZE_STRING));
            $price =(filter_var($_POST['price'], FILTER_SANITIZE_STRING));
            $author= (filter_var($_POST['author'], FILTER_SANITIZE_STRING));
            $language = (filter_var($_POST['language'], FILTER_SANITIZE_EMAIL));
            $publisher =(filter_var($_POST['publisher'], FILTER_SANITIZE_STRING));
            /*  FILTERS AND PREVENTS WRONG CODES FORM ENTERING THE DATABASE*/
            $date= mysql_real_escape_string( $_POST['date']);
            $filesize= mysql_real_escape_string ($_POST['filesize']);// what is d diff btw these two functions?
            $isbn=mysql_real_escape_string( $_POST['isbn']);
            $category= $_POST['isbn'];
            $details= mysql_real_escape_string($_POST['details']);


$check= "select * from books where isbn=\"$isbn\"";
$query=mysqli_query($conn, $check);
$num=mysqli_num_rows($query);

if ($num == 0){  

 
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
             $uploadOk = 1;
        } else {
             header("Location:../lib/booklist.php");
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
          echo "file format error";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
         echo "error";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
           
      
        $input= "insert into books set
               booktitle=\"$booktitle\",
               price=\"$price\",
               author=\"$author\",
               language=\"$language\",
               publisher=\"$publisher\",
               pd=\"$date\",
               isbn=\"$isbn\",
               filesize=\"$filesize\",
               category=\"$category\",
               pic=\"$target_file\",
               details=\"$details\"";
      
    $query2= mysqli_query($conn, $input);
   
    if($query2){
     header("Location:../lib/newbook.php?error=1");
    }
    else{
      header("Location: ../lib/newbook.php?error=2");
    }

}


}
}

 } 


//if (!isset($_SESSION['ADMINID'])){
//session_destroy();
//header("location:index.php"); 
//} 

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
      
      <script src="../js/validate.js"></script>
      <script src="../js/check.js"></script>

<style>
/* The Modal (background) */
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    top:10%;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 30%;
    border-radius: 12px;
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
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close2 {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #00c2ba;
    color: white;
    font-size:12px;
    height:40px;
    border-radius: 10px 10px 0px 0px;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color:#00c2ba;
    color: white;
    font-size:12px;
    height:40px;
    border-radius: 0px 0px 10px 10px;
}
</style>

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
            <li class="topnavli">MY CART</li>
            <li class="topnavli"><a href="../login.html">LOGIN</a></li>
            <li class="topnavli">REGISTER</li>
            <li class="topnavli">SUPPORT</li>
          </ul>
       </span>
            
        </div>
      <!-- ......header close.....   -->
       <br style="clear:both">
         <!--...Main header bar.....   -->
          <div  class=" column-12 mainheader">
        
            <span class="column-3 title">Bookz.com </span>
              <span class="column-5">  
                  <form action="" method="post" >
                      <input class="search-bar" type="text"  id="searchit" class="form-control" placeholder=" Search for...">
                  </form>
                </span> 
              <span class="column-2">
                        
              </span>
        </div>
         <!--...Main header bar close.....   -->

          <!--... Breadcrumb .....   -->
          <div class="column-12" style="border-bottom:1px solid #ccc">
            <ul class="breadcrumb">
            <li class="breadcrumbli"><i class="fa fa-home"></i> Home<span> ></span> </li>
            <li class="breadcrumbli"><i class="fa fa-book"></i> New Book<span>  > </span></li>
          
          </ul>

          <span style="float:right;color:#91cc00;margin-right:100px; padding-top:20px;">
          <!-- #BeginDate format:Am1 -->October 6, 2016<!-- #EndDate -->
           </span>

        </div>
        <!--...Breadcrumb close.....   -->

       
           
      <div align="center" class="column-12" >
         <h2  style="font-weight:500;font-family: Verdana, Geneva, sans-serif;color:#ce2626; margin-right:240px; margin-top:30px"> 
            &rarr; Register New Book:  </h2>

        <div class="column-8"  style="padding-top:10px; margin-left:16%">
          <form action="" method="post" enctype="multipart/form-data" id="uploadForm"> 
         



          <div align="left" style="color:#0c3; width:70%">
             <span><i class="fa fa-upload" >  </i> Image | JPEG | Max. 50KB:</span>

             <div style="width:150px; height:150px; border:1px solid #ccc">             
              
              <span  id="preview" > <img width="150" height="145" src="../image/image-new.png" >        
              </span>
            </div>
             <div>
             <input name="price" class="form-control" type="text"  placeholder="Price &#8358; 0.00" style="width:100px; float:right" >
               &nbsp;
             </div>

          <input type="file" name="fileToUpload" id="fileToUpload">

       </div>


   
          <script>
          function filePreview(input) {
              if (input.files && input.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                      $('#uploadForm + img').remove();
                      $('#preview').before('<img src="'+e.target.result+'" width="150"  align="left" height="150"/>');
                      $('#uploadForm + embed').remove();
                      $('#uploadForm').after('<embed src="'+e.target.result+'" width="450" height="300">');
                  }
                  reader.readAsDataURL(input.files[0]);
              }
          }

          $("#fileToUpload").change(function () {
              filePreview(this);
             $('#fileToUpload').attr("disabled", "disabled");
          });
          </script>
           &nbsp;
           <input class="form-control" name="booktitle" type="text"  required name="booktitle" placeholder="Enter Book Title">
          &nbsp;
           <input class="form-control" name="author" type="text" required name="author" placeholder="Author name(Surname First)">
           &nbsp;
            <input class="form-control" name="language" type="text" required name="language" placeholder=" Language">
              &nbsp;
               <input class="form-control" name="publisher" type="text" required name="publisher" placeholder=" Publisher">
              &nbsp;
               <input class="form-control" name="date" type="text" required name="date" placeholder=" Publication Date">
              &nbsp;
               <input class="form-control" name="filesize" type="text" required name="filesize" placeholder=" File Size">
              &nbsp;
           
              <input class="form-control" name="isbn" type="text" required name="isbn" placeholder=" ISBN">
              &nbsp;
             
              <?php
               $booklist= "select id,s_name from subject";
               $querybook=mysqli_query($conn, $booklist);
              $num=mysqli_num_rows($querybook);
              if($num=0){
                echo "empty";
              }
              else{
               ?>
         <select class="form-control" name="category" required id="category" >
           <option>Select Category...</option>
          
                  <?php
             while($row=mysqli_fetch_array($querybook))
          {   
            ?>
       <option value="<?php echo $row['id']?>"><?php echo $row['s_name']?></option>
       <?php
      }
      }
      ?>
       </select>
         &nbsp;
       <textarea class="form-control" placeholder="Enter detailed book description" required name="details"  rows="10"></textarea>  

          &nbsp;
           <br></br>
     <button class="btn-lg" type="submit" id="save" name="submit"> <span class="fa fa-save"></span> Submit</button>
           
      
   
   
      

 </div>
 </div>
</div>
 </form>
       <p>&nbsp</p>
     
         

</div>



</div>
</div>


      
<!-- The Modal -->
<div id="modal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>ALERT</h2>
    </div>
    <div class="modal-body">
      <p id="p1" >Successfully Added!!!</p>
      <p id="p2" > Well Done!...</p>
    </div>
    <div class="modal-footer">
      <h3>BYE!</h3>
    </div>
  </div>

</div>
                 

         </div><!-- ......row close.....   -->  

              </div><!-- ......Container close.....   -->




<?php
if(isset($_GET['error'])){
if($_GET['error'] == "1"){
?>

 <script type="text/javascript">

var modal = document.getElementById('modal');

var span = document.getElementsByClassName("close")[0];
modal.style.display = "block";


span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
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

var modal = document.getElementById('modal');

var span = document.getElementsByClassName("close")[0];
modal.style.display = "block";

document.getElementById("p1").innerHTML="Unsuccessful!";
document.getElementById("p2").innerHTML="Please fill the blank spaces";

span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<?php
}
}
?> 

<div align="center" class="column-12 copyright">
    &copy; Duru Cynthia</div>
            </body>
            </html>
