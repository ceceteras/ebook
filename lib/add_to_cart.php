<?php
require_once("../db.php");
session_start();
    if (isset($_SESSION['id'])){

      $user = $_SESSION['id'];
      }else{

    if (isset($_SESSION['unknown_user'])){
      $user = $_SESSION['unknown_user'];
    }

}



if (isset($_POST['id'])){
 
  $bookid=$_POST['id'];  
  echo $bookid;
  $counter=$_POST['counter']; 

  //check the db for prev order to avoid duplicate record
  $readorders="select * from orders where order_id=\"$bookid\" && user_id=\"$user\"";
  $queryorders=mysqli_query($conn, $readorders);
  $roworder=mysqli_fetch_array($queryorders);
  $num = mysqli_num_rows($queryorders);

//for a fresh order,
 if ($num == 0){

  $read="select * from books where book_id=\"$bookid\"";
  $query=mysqli_query($conn, $read);
  $row=mysqli_fetch_array($query);

  $price=$row['price'];
  $item=$row['booktitle'];
  $quantity=1;
  $date=date("Y-m-d H:i:s");


$sql="insert into orders set 
      order_id=\"$bookid\",
      item=\"$item\",
      price=\"$price\" ,       
      date=\"$date\", 
      user_id=\"$user\",
      quantity=\"$quantity\"";

   $querysql=mysqli_query($conn, $sql);  
  

if (!$querysql){
          echo 200;
             }else{
              echo 100;
                 }


              
      }else{

$sql="select * from orders where order_id=\"$bookid\""; 
$query1=mysqli_query($conn, $sql);
$row1=mysqli_fetch_assoc($query1);




      $price=$roworder['price'];
      $item=$roworder['item'];
      $quantity=$roworder['quantity'];
      $date=date("Y-m-d H:i:s");
      $prevcounter=$roworder['quantity'];
      $updatecounter=$prevcounter+1;
      

      $update="update orders set 
              order_id=\"$bookid\",
              item=\"$item\",
              price=\"$price\" ,              
              date=\"$date\",
              user_id=\"$user\", 
              quantity=\"$updatecounter\" where order_id = $bookid";

           $queryupdate=mysqli_query($conn, $update);

          if ($queryupdate ){
          echo 100;
             }else{
              echo 200;
                 }
} 
}


  /*insert into order, set it as unknwn give it a status or unknown id(known or not), den when the person logs in, you update
*/

?>