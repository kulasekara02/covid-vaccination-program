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
	session_start();
	include "DBconnection.php";
	if(!isset($_SESSION['email']))
	{
		header("location:adminlogin.php");
	}
	else
	{
		$id = $_SESSION['id']; 
		$email = $_SESSION['email'];
		
		$result = mysqli_query($conn,"SELECT * FROM admins WHERE id='" . $id."'");
		$row  = mysqli_fetch_array($result);
		
		if($row >0)
		{
		$name=$row['name'];
		$password =$row['password'];
		 		}
		
	$mysqli = new mysqli('localhost','root','','covidv') or die(mysqli_error($mysqli));
		 $resultSet = $mysqli->query("SELECT * FROM second_vaccine_requests ") or die ($mysqli->erorr);		

	}
	  ?>
	
	
	
	
<div class="topnav" style=" margin-top: -20px  " >
<a style="padding-top:0px; padding-bottom: 0px"><img height="60px" src="228-2285847_emblem-of-sri-lanka-national-emblem-of-sri.png"></a>
<h2 style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'">SRI LANKAN ONLINE COVID VACCINATION</h2>
 	
<a  href="adminindex.php">Registerd Patients</a>
<a  href="requestv1.php">Requests Vacinne 1</a>
<a  href="requestv2.php">Requests Vacinne 2</a>
<a  href="userLogout.php">Log out</a>	
<h3  align="right" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">User - <?php echo $name;?></h3>
 
	
 
</div>
	
	
	
<div class="section2" align="center" style="margin-bottom: 20px; overflow-y: scroll" >
	
	<?php
	include "DBconnection.php";
if (isset($_POST['updatedata'])){
	 
	$id = $_POST['update_id']; 
	
	 
		$patientID = $_POST['patientID'];
		$SvaccineLocation = $_POST['SvaccineLocation'];
		$SvaccineTime = $_POST['SvaccineTime'];
		$Sstatus = $_POST['Sstatus'];
		 

   $query = "UPDATE second_vaccine_requests SET SvaccineLocation='$SvaccineLocation', SvaccineTime='$SvaccineTime', status='$Sstatus' WHERE patientID= $patientID " ;
	$query_run = mysqli_query($conn, $query);
	if($query_run)
	{	
	echo "submitted";	
   header('location:requestv2.php') ;     	
	}
	else
	{
		echo "form not submitted";
	}               
}
?>
	
	
		<!-- update model --> 		  
	<div align="left" class="col-md-12" style="margin-top: 5px" >	
		
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update </h5>
		<form method="post" action=" "  enctype="multipart/form-data"> 	
			
			
       <button type="button" class="close" data-dismiss="modal"> close</button>
		<input type="hidden" name="" value=""> 
      </div> 
	 
      <div class="modal-body">
		  
		  
		 
		  
    <input type="hidden" name="update_id" id="update_id" class="form-control"   readonly/>
	 
		  
    <input  type="text" name="eid" id="eid" class="form-control"   />
  	<br>  <label>Name</label>
     <input type="text" name="name" id="name" class="form-control"   readonly/>
	<br>   <label>Email</label>
     <input type="text" name="email" id="email" class="form-control"   readonly/>
    <br>  <label>City</label>
     <input type="text" name="city" id="city" class="form-control"   readonly/>
    <br>
		    <label>Vaccine</label>
     <input type="text" name="vaccinename" id="vaccinename" class="form-control"   readonly/>
    <br> 
		    <label>Patient ID</label>
     <input type="text" name="patientID" id="patientID" class="form-control"  readonly/>
	<br>   
		  <label>Location</label>	
     <input type="text" name="SvaccineLocation" id="SvaccineLocation" class="form-control"    />
	<br>  
		  <label>Time</label>	
     <input type="text" name="SvaccineTime" id="SvaccineTime" class="form-control"    />
    <br> 
	<label>Status</label>	  
     <input type="text" name="Sstatus" id="Sstatus"  class="form-control"  />
     
      <div class="modal-footer">
                            	
     <button type="submit" value="submit" id="update_id" name="updatedata" class="btn btn-info"> Update </button>                 
       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>                  
      </div>
		</form>	
    </div>
  </div>
</div>		

    </div>
	
<div style="margin-top: 10px"> 
	
 <h1 align="center" >Vaccine 2 Requests</h1><hr>
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
	$SvaccineLocation = $rows['SvaccineLocation'];
	$SvaccineTime = $rows['SvaccineTime'];
	 
	$Sstatus = $rows['status'];
	 
}	 
	  
	 ?>
	  
    <tr>
        <td><?php echo $eid ; ?></td>
		<td><?php echo $name ; ?></td>
		<td><?php echo $email ; ?></td>
		<td><?php echo $city ; ?></td>
		<td><?php echo $vaccinename ; ?></td>
		<td><?php echo $patientID ; ?></td>
		<td><?php echo $SvaccineLocation ; ?></td>
		<td><?php echo $SvaccineTime ; ?></td>
		 
		<td><?php echo $Sstatus ; ?></td>
	   
	   
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
			
			$('.editbtn').on('click', function(){				 
			$('#editmodal').modal('show');				 
			$tr = $(this).closest('tr');	
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();	
				
			console.log(data);
				$('#update_id').val(data[0]);
				$('#eid').val(data[0]);
				$('#name').val(data[1]);
				$('#email').val(data[2]);
				$('#city').val(data[3]);
				$('#vaccinename').val(data[4]);
				$('#patientID').val(data[5]);
				$('#SvaccineLocation').val(data[6]);
				$('#SvaccineTime').val(data[7]);
				$('#Sstatus').val(data[8]);
 	
		});
  
	});
	
 
</script>
</body>
</html>
