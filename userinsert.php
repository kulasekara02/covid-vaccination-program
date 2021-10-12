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

 
 
	  
  </head>
	
  <body style="background-color: grey">
	  
 
	  

 <div class="div_content_login"> 
	 <div style="margin-top: 250px"> 
 
	  <?php
	;
	extract($_POST);

include("DBconnection.php");

$sql=mysqli_query($conn,"SELECT * FROM patients where patientEmail='$email'");
if(mysqli_num_rows($sql)>0)
{
    echo "<h1 align='center' class='alert-info'>This Email Id Already Exists</h1>"; 
	echo "<button class='btn btn-danger btn-block' ><a style='color: white' href='register.php'>Back to Register</a></button>";
	exit;
}
if(isset($_POST['submit'])) 
{
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$city=$_POST['city'];
$nic=$_POST['nic'];
 
       
	$sql = "INSERT INTO patients "."(name, patientEmail, password, city, nic)"."VALUE('$name','$email','$password','$city','$nic')";
	
	$results = mysqli_query($conn, $sql);
	
	if(!$results) {
	  die('Could not enter data: '.mysqli_error($conn));
	}
	else
	{
 
	header("Location:loginindex.php");
	}
   }
 

 

?>
	  
	 </div>
	  
	 </div>

	  
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>