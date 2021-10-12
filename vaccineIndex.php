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
		 		}

	}
	  ?>
	
	
	
	
<div class="topnav" style=" margin-top: -20px  " >
<a style="padding-top:0px; padding-bottom: 0px"><img height="60px" src="228-2285847_emblem-of-sri-lanka-national-emblem-of-sri.png"></a>
<h2 style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, 'sans-serif'">SRI LANKAN ONLINE COVID VACCINATION</h2>
 	
<a  href="VaccineIndex.php">Home</a>
<a  href="Vaccinedetails.php">Vaccine Details</a>
<a  href="myprofile.php">My Profile</a>	
<a  href="about.php">About SLOC-V Unit</a>	
<a  href="userLogout.php">Log out</a>	
<h3  align="right" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', 'serif'">User - <?php echo $name;?></h3>
 
	
 
</div>
	
	
	
<div class="section1" align="center" style="  margin-bottom: 20px;" >
	
<div style="margin-top: 10px"> 
	
 
<!--
	<br>	<br>	<br>	<br>
	<a href="one.php"> <button style="width: 200px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';font-size: 28px" class="btn btn-Primary btn-lg">First Vaccine</button></a>
-->
	  
<!--	<a href="secondVACCINE.php"> <button style="width: 200px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';font-size: 28px"  class="btn btn-Primary btn-lg">Second Vaccine</button></a>-->
	
	
	
	<?php

include "DBconnection.php";
$result = mysqli_query($conn,"SELECT * FROM first_vaccine_requests WHERE patientID='" . $id."'");
$row  = mysqli_fetch_array($result);	
		
		ob_start(); 
		$f1 = "<a href='one.php'><button style='width: 200px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';font-size: 28px'  class='btn btn-Primary btn-lg'>  First Vaccine</button></a>"; 
	
		$f2 = "<a href='secondVACCINE.php'><button style='width: 200px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';font-size: 28px'  class='btn btn-Primary btn-lg'>Second Vaccine</button></a>";
	
		echo $f1;	 
	 
		if($row >0)
		{
         $FvaccineLocation=$row['FvaccineLocation'];
         $FvaccineTime=$row['FvaccineTime'];
		 $status1=$row['status']; 

		if($status1 == "") {
  		ob_end_clean();
			
		echo "<h1 class='alert-warning'>PENDING VACCINE 1</h1>";
		echo "<h2 class='alert-info'>Location - $FvaccineLocation</h12>";
		echo "<h2 class='alert-info'>Date/Time - $FvaccineTime</h2>";	
		ob_start(); 	
		}
		if($status1 == "compleated") {
		ob_end_clean();	
		 
		ob_start(); 	
  		echo $f2; 
		 
		}
    	 
}
	
	include "DBconnection.php";
$result = mysqli_query($conn,"SELECT * FROM second_vaccine_requests WHERE patientID='" . $id."'");
$row  = mysqli_fetch_array($result);	
		

		if($row >0)
		{
         $SvaccineLocation=$row['SvaccineLocation'];
         $SvaccineTime=$row['SvaccineTime'];
		 $status2=$row['status']; 

		if($status2 == "") {
  		ob_end_clean();
		echo "<h1 class='alert-warning'>PENDING VACCINE 2</h1>";
		echo "<h2 class='alert-info'>Location - $SvaccineLocation</h2>";
		echo "<h2 class='alert-info'>Date/Time  - $SvaccineTime</h2>";	
			ob_start(); 
		}
		if($status2 == "compleated") {
			
		ob_end_clean();
  		 
		echo "<h1 class='alert-success'>YOU WERE AMONG THOSE WHO COMPLEATED THE VACCINE</h1>";
		echo "<button class='btn btn-info'><a href='certificate.php'>Get Your Certificate</a></button>";
		echo "<h2 class='alert-danger'>Share below Image with your love ones</h2>";	
		echo "<img src='images/IGotMyShot_Logo-FINAL.jpg' width=480px>";	
		}
    	 
}
	 
?>

	 
	
</div>		  

</div>	
	
	
	
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
	
	

	
	
<script src="js/slider.js"></script>	
</body>
</html>
