<?php
session_start();
$con=mysqli_connect('localhost','root','','inactive_user_logout');
$msg="";
if(isset($_POST['submit'])){
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);
	
	$res=mysqli_query($con,"select * from user where username='$username' and password='$password'");
	if(mysqli_num_rows($res)>0){
		$_SESSION['IS_LOGIN']='yes';
		header('location:dashboard.php');
		die();
	}else{
		$msg="Please enter valid login details";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>Login Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <style type="text/css">
         body {margin: 0;padding: 0;background-color: #17a2b8;height: 100vh;}
         #login .container #login-row #login-column #login-box {margin-top: 60px;max-width: 600px;height: 320px;border: 1px solid #9C9C9C;background-color: #EAEAEA;}
         #login .container #login-row #login-column #login-box #login-form {padding: 40px;}
		   #result{color:red;}
            
      </style>
      <script src="jquery-3.4.1.min.js"></script>
      <script src="bootstrap.min.js"></script>
   </head>
   <body>
      <body>
         <div id="login">
            <div class="container">
            <h3 class="text-center text-white pt-5 ">Login form</h3>
               <div id="login-row" class="row justify-content-center align-items-center">
                  <div id="login-column" class="col-md-6">
                     <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post">
                           <div class="form-group">
                              <label for="username" class="font-weight-bold">Username:</label><br>
                              <input type="text" name="username" id="username" class="form-control" required>
                           </div>
                           <div class="form-group">
                              <label for="password" class="font-weight-bold">Password:</label><br>
                              <input type="password" name="password" id="password" class="form-control" required>
                           </div>
                           <div class="form-group">
                              <input type="submit" name="submit" class="btn btn-primary btn-md" value="Submit">
                           </div>
						         <div id="result">
                              <?php echo $msg?>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </body>
</html>