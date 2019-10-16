<?php
include "tpomenu.php"; ?>
<?php
					$tpoid = $_SESSION['s_id'];


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
	
				$sql = "SELECT * from tpo_info where tid='{$tpoid}'";
				$result = mysqli_query($con,$sql);
				$row=mysqli_fetch_array($result);
                $name=$row['name'];
                $degree=$row['degree'];
                $email=$row['email'];
                $mobile=$row['mobile'];
                
                                
?>  
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
    
    hr {
margin-top: 20px;
margin-bottom: 20px;
border: 0;
border-top: 1px solid #7C7A7A;
}
</style>

<body>

<div class="container">
	<div id="respond">
<div class="bs-example">
            <table class="table">
                <thead>
                    <tr>
                    <th></th>
                    <th>Tpo Details</th>
                    <th></th>
                    
                    </tr>
                </thead>
                 <tbody>
                     <form action="updateprofile.php" method="post" id="commentform">
                    <tr class="active">
                        <td>Name</td>
                        <td><?php echo $name ?></td>
                        <td></td><td></td>  <td></td> 
                     </tr>
                         <tr class="warning">
                        <td>Degree</td>
                        <td><?php echo $degree ?></td>
                         <td></td>  <td></td><td></td>
                     </tr>
                    <tr class="success">
                        <td>Email</td>
                        <td><?php echo $email ?></td>
                       <td></td><td></td><td></td>
                     </tr>
                    
                    <tr class="info">
                        <td>Mobile</td>
                        <td><?php echo $mobile ?></td>
                    <td></td>
                        <td></td><td></td>
                    </tr>
                    <tr class="active">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-action">Edit Profile</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>
        
    </div>
</div><br><br><br><br><Br>

<br><br><br><br><br><br>
</body>
<?php include "../foot.html"; ?>
