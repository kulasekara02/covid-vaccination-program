<?php error_reporting(0); ?>
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
		header("location:loginindex.php");
	}
	else
	{
		$id = $_SESSION['id']; 
		$email = $_SESSION['email'];

		$result = mysqli_query($conn,"SELECT * FROM patients WHERE id='" . $id."'");
		$row  = mysqli_fetch_array($result);
		
		if($row >0)
		{
		$name=$row['name'];
		$password =$row['password'];
		$city =$row['city'];		 
		$vaccinename =$row['vaccinename'];
		$email =$row['patientEmail'];
		$nic =$row['nic'];	
		 }
		$result = mysqli_query($conn,"SELECT * FROM first_vaccine_requests WHERE patientID='" . $id."'");
		$row  = mysqli_fetch_array($result);
		
		
		if($row >0)
		{
		$FL = $row['FvaccineLocation'];
		$FD = $row['FvaccineTime'];
		$status1 = $row['status'];	
		 }
		$result = mysqli_query($conn,"SELECT * FROM second_vaccine_requests WHERE patientID='" . $id."'");
		$row  = mysqli_fetch_array($result);
		
		
		
		if($row >0)
		{
		$SD = $row['SvaccineTime'];
		$SL = $row['SvaccineLocation'];
		$status2 = $row['status'];
	}
	}
	  ?>
<div class="printable">	
<div class="topnav" style=" margin-top: -20px  " >
<a style="padding-top:0px; padding-bottom: 0px"><img height="60px" src="228-2285847_emblem-of-sri-lanka-national-emblem-of-sri.png"></a>
<h2 style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'">SRI LANKAN ONLINE COVID VACCINATION</h2>
 	

 
	
 
</div>
	
	
	
<div align="center" style="padding: 30px; "  >
	
<h1 align="center" >Certification Of Covid Vaccine</h1>
<table class="table table-hover table-primary" align="center"  style="margin-top: -100px; color: black; font-size: 14px; border:10px ">
  <thead>
    <tr>
     
      
    </tr>
  </thead>
  <tbody>
	   
	   <tr>
	  <th  scope="row">Name</th>
      <th scope="row"><?php echo $name;?></th>
     
      
    </tr>
	  <tr class="table-primary">
      <th  scope="row">Email</th>
      <td ><?php echo $email; ?></td>
      <br>
	
    </tr>
	 
    <tr class="table-primary">
      <th scope="row">City</th>
      <td ><?php echo $city; ?> </td>
      <br>
    </tr>
	   <tr class="table-primary">
      <th scope="row">National Identity Card Number</th>
      <td ><?php echo $nic; ?> </td> 
    </tr>
    <tr>
      <th scope="row">Vaccine Name</th>
      <td><?php echo $vaccinename ?></td>
     
    </tr>
    <tr>
      <th scope="row">First Vaccine Location</th>
      <td><?php echo $FL; ?></td>
      
    </tr>
     <tr class="table-primary">
      <th scope="row">First Vaccine Date</th>
      <td><?php echo $FD; ?></td>
      
    </tr>
	 
	  
	   <tr>
      <th scope="row">Second Vaccine Location</th>
      <td ><?php echo $SL; ?></td>
      <br>
	
    </tr>
	  
	 <tr class="table-primary">
      <th scope="row">Second Vaccine Date</th>
      <td ><?php echo $SD; ?></td>
      <br>
	
    </tr>
	  <tr class="table-primary">
      <th scope="row">First Vaccine Status</th>
      <td ><?php echo $status1; ?></td>
      <br>
	
    </tr> 
	   <tr class="table-primary">
      <th scope="row">Second Vaccine Status</th>
      <td ><?php echo $status2; ?></td>
      <br>
	
    </tr>   
	    
	  
  </tbody>


</table>
	<h3 align="center" >Here by, We certify the above details are correct and We confirm it - Ministry of Health, Sri Lanka Government. </h3>
	<h5 align="center" >DR. Ajith Jayawardene (MBBS,Phil,JKAF) </h5>	
 
	</div>	
	</div>	
	<div align="center"><button onClick="window.print();" class="btn btn-info">Certificate</button></div> 
 	

	 
 	
<script src="js/slider.js"></script>	
</body>
</html>
