 <?php
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
               category_id=\"$category\",
               pic=\"$target_file\",
               details=\"$details\"";
    	
    $query2= mysqli_query($conn, $input);
    echo $query2;

    if($query2)
    {
    echo "done";
    }
    else {
    	echo "failed";
    }

}
}
}

}

	?>
