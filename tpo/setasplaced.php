<?php 
session_start();
$tpoid = $_SESSION['s_id'];

$sid=$_POST['sid'];
$comp=$_POST['company'];
$job=$_POST['job_role'];
$salary=$_POST['salary'];

	            $host="localhost";
				$user="root";
				$pass="";
				$con = mysqli_connect("$host","$user","$pass");
	

				if (!$con)
				  {

				echo "Error in DBConnect() = " . mssql_get_last_message();
				  die('Could not connect: ' . mysqli_error($con));

				  }

				mysqli_select_db($con,"placement");
	

$sql1="UPDATE student_info SET  placed='yes',salary='$salary',job_role='$job',company='$comp' WHERE sid='$sid'"; 


if (!mysqli_query($con,$sql1))
{
die('Error: ' . mysqli_error($con));
}
header('Location:approvedstud.php');

?>