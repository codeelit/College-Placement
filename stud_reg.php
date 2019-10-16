<?php 
session_start();
$host="localhost";
$user="root";
$pass="";
$conn=mysqli_connect("$host","$user","$pass");
mysqli_select_db($conn,"placement");

$username=$_POST['username'];

$user = "SELECT * FROM stud_login as s,comp_login as c WHERE c.username='$username'
or s.username='$username'";

//$user = "SELECT * FROM stud_login where username='$username'";

 $userresult = mysqli_query($conn,$user) or die("cannot execute query");

 $usercount = mysqli_num_rows($userresult);
if($usercount==1)
{
    echo "<center><h3><Font Color=red>Username Already Exist.<br><mark>Please Choose Different Username</mark><br><a href=register.php>Go Back</a></Font></h3></center>";
   die();// put your home page neme here

}
else {
$email=$_POST['email'];
$password=$_POST['password'];
$repeat=$_POST['repeatpassword'];

if($password==$repeat){

$sql="insert into stud_login(username,email,password) values ('$_POST[username]','$_POST[email]',password('$_POST[password]'))";


if(!mysqli_query($conn,$sql))
{
die ('error:'.mysqli_error());
}
 
$mysql = "SELECT * FROM stud_login WHERE username='$username' and password=password('$password') ";

 $result = mysqli_query($conn,$mysql) or die("cannot execute query");

 $count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

//$myname=$row['username'];
 $_SESSION['s_id'] = $row['sid'];

 if($count==1)
 {
 //session_register('username');
	header("location:personaldata.php"); // put your home page neme here

}
else
{
header("location:register.php"); // put your home page neme here

}
    //if password do not match then
}
else {
    echo "Password Do Not Match"; 
    echo "<a href=register.php>"."<br>"."Go Back";
}
}
?>