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
	<h1 align="center" class="alert-info">Your Vaccine name is  <?php echo $vaccinename ;?></h1>
	
 
	
<div style="margin-top: 80px"> 
	
	<h2><mark>If you want to change the selected vaccine click here...<a href="one.php"><button style="width: 60px" class="btn btn-warning btn-md"><i class="fas fa-shield-virus"></button></a></h2>
		<br>
	 
		<br>
		
		<?php
		
$mysqli = new mysqli('localhost','root','','covidV') or die(mysqli_error($mysqli));
if (isset($_POST['submit'])){
 
 
 
$mysqli->query("INSERT INTO first_vaccine_requests (name, email, city, vaccinename, patientID)VALUES('$name','$email','$city','$vaccinename','$id')") or die($mysqli->error);
header("location:myprofile.php");
}
	

	 
?>	
		
  <form action="" method="post">

<input type="submit" style="width: 400px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, 'sans-serif';font-size: 28px" class="btn btn-Primary btn-lg" value="Request for your first Vaccine" name="submit"/>
</form>	
</div>		  

</div>	
	
	  			 
			  
 	 
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
