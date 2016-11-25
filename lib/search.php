<?php
require_once("db.php");
 if($_SERVER['REQUEST_METHOD'] == "POST"){

$search = $_POST['searchit'];
$selectdata = "select *  from books where bookname like '%". $search . "%' ";
$query = mysql_query($selectdata) or die("Failed to perform query: " . mysql_error());

$num = mysql_num_rows($query);


if ($num = 0){
	echo "there are no records";
	}else{
while($row = mysql_fetch_array($query))
{	
  $option = '<div  class="opto" >' .$row['bookname']. '</div>';
    echo($option);
	}
	}
}


?>