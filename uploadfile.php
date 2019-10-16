<?php
session_start();
$studentid = $_SESSION['s_id'];


				$host="localhost";
				$user="root";
				$pass="";
				$con = mysqli_connect("$host","$user","$pass");
	

				if (!$con)
				  {

				echo "Error in DBConnect() = " . mssql_get_last_message();
				  die('Could not connect: ' . mysqli_error());

				  }

				mysqli_select_db($con,"placement");
	
				$sql = "SELECT * from student_info where sid='{$studentid}'";
				$result = mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
                $name=$row['username'];
//PROPERTIES OF UPLOADED FILE

// To display and store name
//$name ="username";


// To display and store type
$type = $_FILES["myfile"] ["type"];
echo "The type of file is ".$_FILES["myfile"] ["type"]."<br>";

// To display Size
$size = $_FILES["myfile"] ["size"] ;
echo "The size of file is".$_FILES["myfile"] ["size"]." bytes"."<br>";

// To display temporary file where it is stored
$temp = $_FILES["myfile"] ["tmp_name"] ;
echo "It is stored at".$_FILES["myfile"] ["tmp_name"]."<br>";

// To display errors if any
$error = $_FILES["myfile"] ["error"];
//echo "The error in uploading file is ".$_FILES["myfile"] ["error"];

if ($error > 0)
{
die ("Error Uploading file. Code $error");
}

else
{
   if ($type ==  "video/avi" || $size > 5000000) // conditions for file 
   {
   die ("File Format not supported or file size too big");
   }
else
     {
     move_uploaded_file($temp,"uploaded/".$name);
     echo "Upload Completed!!!";
    header("location:updateprofile.php"); // put your home page neme here

     }
}
?>
