<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>SLOCV Unit</title>
	  <link rel="icon"  type="image/png" href="228-2285847_emblem-of-sri-lanka-national-emblem-of-sri.png">

 
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
	  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

 
<body>
	
<?php
	include "DBconnection.php";
	session_start();

	// Check if the user is logged in
	if(!isset($_SESSION['email'])) {
		header("location:adminlogin.php");
		exit();
	}

	// Retrieve user information from the database
	$id = $_SESSION['id'];
	$email = $_SESSION['email'];
	$result = mysqli_query($mysqli, "SELECT * FROM admins WHERE id='$id'");
	if (!$result) {
		die('Invalid query: ' . mysqli_error($mysqli));
	}
	$row = mysqli_fetch_assoc($result);
	$name = $row['name'];
	$password = $row['password'];

	// Retrieve first vaccine requests from the database
	$result_set = $mysqli->query("SELECT * FROM first_vaccine_requests") or die($mysqli->error);
?>
	
	
	
	
<div class="topnav">
	<a href="#"><img src="logo.png" height="60px"></a>
	<h2>SRI LANKAN ONLINE COVID VACCINATION</h2>
	<a href="adminindex.php">Registered Patients</a>
	<a href="requestv1.php">Requests Vaccine 1</a>
	<a href="requestv2.php">Requests Vaccine 2</a>
	<a href="userLogout.php">Log out</a>    
	<h3 align="right">User - <?php echo $name;?></h3>
</div>

<style>
	.topnav {
		margin-top: -20px;
	}
	h2 {
		font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif';
	}
	h3 {
		font-family: Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif';
	}
	.topnav a {
		padding-top: 0;
		padding-bottom: 0;
	}
</style>>
	
	
	
<div class="section2" align="center" style="margin-bottom: 20px; overflow-y: scroll" >
	
<?php
include "DBconnection.php";

if (isset($_POST['updatedata'])) {

    $id = $_POST['update_id'];

    $patientID = mysqli_real_escape_string($conn, $_POST['patientID']);
    $FvaccineLocation = mysqli_real_escape_string($conn, $_POST['FvaccineLocation']);
    $FvaccineTime = mysqli_real_escape_string($conn, $_POST['FvaccineTime']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $stmt = mysqli_prepare($conn, "UPDATE first_vaccine_requests SET FvaccineLocation=?, FvaccineTime=?, status=? WHERE patientID=?");
    mysqli_stmt_bind_param($stmt, "sssi", $FvaccineLocation, $FvaccineTime, $status, $patientID);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo "submitted";
        header('location:requestv1.php');
    } else {
        echo "form not submitted";
    }
} 
?>
	
	
		<!-- update model --> 		  
<div align="left" class="col-md-12" style="margin-top: 5px">    
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                    <button type="button" class="close" data-dismiss="modal">Close</button>
                </div> 
                <form method="post" action="process_form.php" enctype="multipart/form-data">     
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id_input" class="form-control" readonly/>
                        <label for="eid">EID</label>
                        <input type="text" name="eid" id="eid" class="form-control" />
                        <br>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" readonly/>
                        <br>
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" readonly/>
                        <br>
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" readonly/>
                        <br>
                        <label for="vaccinename">Vaccine</label>
                        <input type="text" name="vaccinename" id="vaccinename" class="form-control" readonly/>
                        <br>
                        <label for="patientID">Patient ID</label>
                        <input type="text" name="patientID" id="patientID" class="form-control" readonly/>
                        <br>   
                        <label for="FvaccineLocation">Location</label>    
                        <input type="text" name="FvaccineLocation" id="FvaccineLocation" class="form-control"/>
                        <br>
                        <label for="FvaccineTime">Time</label>    
                        <input type="text" name="FvaccineTime" id="FvaccineTime" class="form-control"/>
                        <br> 
                        <label for="status">Status</label>      
                        <input type="text" name="status" id="status"  class="form-control"/>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="updatedata" class="btn btn-info">Update</button>                 
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                  
                    </div>
                </form>    
            </div>
        </div>
	
<div style="margin-top: 10px"> 
	
 <h1 align="center" >Vaccine 1 Requests</h1><hr>
<table class="table table-bordered"  style=" color: black; font-size: 20px; border:10px ">
  <thead>
    <tr>
      <th scope="col"> ID</th>
		<th scope="col">  Name</th>
		<th   scope="col">Email</th>
      	<th   scope="col">City</th>
		<th  scope="col">Vaccine</th>
   	    <th   scope="col">Patient ID</th>
		<th   scope="col">Location</th>
         <th   scope="col">Date & Time</th>
		<th   scope="col">Status</th>
		<th   scope="col">Edit</th>
 
		
    </tr>
  </thead>
  <tbody>
	  		<?php
		While($rows = $resultSet->fetch_assoc ()):
{	
	$eid = $rows['id'];
	$name = $rows['name'];
	$email = $rows['email'];
	$city = $rows['city'];
	$vaccinename = $rows['vaccinename'];
	$patientID = $rows['patientID'];
	$FvaccineLocation = $rows['FvaccineLocation'];
	$FvaccineTime = $rows['FvaccineTime'];
	 
	$status = $rows['status'];
	 
}	 
	  
	 ?>
	  
    <tr>
        <td><?php echo $eid ; ?></td>
		<td><?php echo $name ; ?></td>
		<td><?php echo $email ; ?></td>
		<td><?php echo $city ; ?></td>
		<td><?php echo $vaccinename ; ?></td>
		<td><?php echo $patientID ; ?></td>
		<td><?php echo $FvaccineLocation ; ?></td>
		<td><?php echo $FvaccineTime ; ?></td>
		 
		<td><?php echo $status ; ?></td>
	   
	   
	  <td><button type="button" class="btn btn-info btn-xs editbtn"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
 	    
    </tr>
  </tbody>

<?php endwhile; ?>
</table>
	<?php
 	 function pre_r( $array ){
 	 	echo '<pre>';
 	 	print_r($array);
 	 	echo '</pre>';
 	 }
 	 ?> 
	 
	 
	
</div>		  

</div></div>	
	
	
	
<footer class="footer-distributed">

			<div class="footer-left">

				<a> </a>

				<p class="footer-links">
					<a  href="index.html">Home</a>
<a  href="index.html">Vaccine Details</a>
				</p>

				<p class="footer-company-name">SLOCV UNIT  © 2021</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
					<p>Epidemiology Unit, Ministry of Health ,<br> De Saram Place, Colombo 10</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+94-11-2681548 Fax : +94-11-2696583</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
						<p><a href="">  chepid@sltnet.lk  , epidunit@sltnet.lk  </a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>Copyright © Epidemiology Unit - 2019</span>
					Last Updated on Thursday, 26 August 2021 03:12, and music festivals.26 August 2021 03:12, and music festivals.26 August 2021 03:12, and music festivals.
				</p>

				 

			</div>

		</footer>
	
 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>	
<script src="js/slider.js"></script>	
	
	
	
<script>
    $(document).ready(function() {
        
        $('.editbtn').on('click', function() {             
            $('#editmodal').modal('show');
            var data = $(this).closest('tr').find('td').map(function() {
                return $(this).text();
            }).get();
            console.log(data);

            $('#update_id').val(data[0]);
            $('#eid, #name, #email, #city, #vaccinename, #patientID, #FvaccineLocation, #FvaccineTime, #status').each(function(index) {
                $(this).val(data[index]);
            });
        });
    });
</script>

</body>
</html>
