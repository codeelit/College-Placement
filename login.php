 <?php

session_start();
$host="localhost";
$user="root";
$pass="";
$con = mysqli_connect("$host","$user","$pass");


if (!$con)
  {

echo "Error in DBConnect() = " . mysqli_get_last_message();
  die('Could not connect: ' . mysqli_error());

  }
mysqli_select_db( $con,"placement");
$username=$_POST['username'];
$password=$_POST['password'];


				$mysql1="Select * from tpo where username='$username' and password='$password'";
				$result1 = mysqli_query( $con,$mysql1) or die("cannot execute query");
				$count1 = mysqli_num_rows($result1);
 				
				$mysql2="Select * from stud_login where username='$username' and password=password('$password') and approval='yes'";
				$result2 = mysqli_query($con,$mysql2) or die("cannot execute query");
				$count2 = mysqli_num_rows($result2);
 				
 				$mysql3="Select * from comp_login where username='$username' and password=password('$password') and approval='yes'";
				$result3 = mysqli_query($con,$mysql3) or die("cannot execute query");
				$count3 = mysqli_num_rows($result3);
 				
 				$mysql4="Select * from department where username='$username' and password='$password'";
				$result4 = mysqli_query($con,$mysql4) or die("cannot execute query");
				$count4 = mysqli_num_rows($result4);			
					
				$mysql5="Select * from stud_login where username='$username' and password=password('$password') and approval=''";
				$result5 = mysqli_query($con,$mysql5) or die("cannot execute query");
				$count5 = mysqli_num_rows($result5);				
				
				if($count1==1){
						$row1 = mysqli_fetch_array($result1);
						$_SESSION['s_id'] = $row1['tid'];
						header("location:tpo/tpohome.php"); 
				}
				
				elseif($count2==1){
						$row2 = mysqli_fetch_array($result2);
						$_SESSION['s_id'] = $row2['sid'];
						header("location:home.php"); 
				}
				elseif($count3==1){
						$row3 = mysqli_fetch_array($result3);
						$_SESSION['s_id'] = $row3['cid'];
						header("location:company/comphome.php"); 
				}
				elseif($count4==1){
						$row4 = mysqli_fetch_array($result4);
						$_SESSION['s_id'] = $row4['did'];
						header("location:department/dhome.php"); 
				}
				elseif($count5==1){
						header("location:approval.php"); 
				}
				else
				{
				  		header("location:notregister.php"); 
		
				}
				
		      
?>
