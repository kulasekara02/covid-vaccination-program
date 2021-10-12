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

 
	  <style>
	
        
#login .container #login-row #login-column #login-box {
  margin-top: 220px;
  max-width: 600px;
  height:550px;
  color: white;
	 
	align: center;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 10px;
  text-align: left;
}
#login .container #login-row #login-column #login-box #login-form #register-link {
 margin-top: 15px;
text-align: right;
	color: aliceblue;

}
        
 
	
	</style>

	  
  </head>
	
  <body style="background-color: grey;  ">
	<?php
session_start();
$message="";

if(isset($_POST['submit'])){ 

if(count($_POST)>0) {
 include 'DBconnection.php'; 
 
$result = mysqli_query($conn,"SELECT * FROM patients WHERE patientEmail='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$row  = mysqli_fetch_array($result);

if(is_array($row)) {
	
$_SESSION["id"] = $row['id'];	
$_SESSION["email"] = $row['patientEmail'];
$_SESSION["name"] = $row['name'];
	
} else {
$message = "Invalid ID or Password!";
}
}
if(isset($_SESSION["id"])) {
header("Location:vaccineindex.php");
}

}
	?>  
 
 <div class="div_content_login">  
		  
		<div class="login_index">
		   
		<div id="login">
  		  <div class="container">
            <div id="login-row" align="center">
                <div id="login-column" align="center">
                    <div id="login-box" align="center">
                        
                        
                        <form id="login-form" class="form" method="post">
                            
                          
                          <h1  align="center"><i class="fas fa-shield-virus"></i> Login</h1>
                            
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-"><i class="fas fa-shield-virus"></i> Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label"><i class="fas fa-shield-virus"></i> Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
								
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Log In">
								<div class="alert-danger"><h4> <?php if($message!="") { echo $message; } ?></h4>
								 
                            </div>
                             
                            
                         
                        </form>
							<button class="btn btn-danger btn-block" ><a style="color: white" href="index.php">Back To Main Menu</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
		  
		  
	  </div>


	  
	  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>