<?php
session_start();
include ('../db.php');

if(isset($_GET['delete'])){ 
 
       $delete= $_GET['delete'];  
        
$sql="DELETE FROM orders WHERE id='$delete'";
$query= mysqli_query($conn,$sql);
if(!$query){
        echo "error";
      }else{
         header("location: cart.php");
    } 
  
 }
?>
