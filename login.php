<?php
session_start();
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'project');


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>FORM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="margin-top:87px;">

<div class="container">
  <form class="form-horizontal" action="" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
	  <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"  placeholder="Email">
    </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
       <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password"  value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="Password">
    </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember" id="remember" > Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-primary" name="submit">
      </div>
    </div>
  </form>
</div>

</body>
</html>

<?php

//error_reporting(0);
//$useremail = "amit@gmail.com";
//$userpass = 123456;

//if($_SERVER['REQUEST_METHOD']=='POST')
if(isset($_POST["submit"]))
{
	$email		=	$_POST["email"];
	$password	=	md5($_POST["password"]);
	
	$q1 = "SELECT * FROM user_login WHERE email='$email' && password='$password' ";
	$q2 = mysqli_query($conn, $q1);
	$res = mysqli_fetch_assoc($q2);
	
	
	if($res){
			$_SESSION["useremail"] = $email;
			$_SESSION["password"] = $password;
			$_SESSION["flag"] = $res["flag"];
			if(isset($_POST["remember"])){
			
				$set_email = setcookie("email", $email, time() + 60*60, "/" );
				$set_password = setcookie("password", $password, time() + 60*60, "/" );
				if($set_email && $set_password){
					echo "cookies created successfully";
				}
			}
			
		
			if($_SESSION["flag"] ==0){
			header("location:index.php");
			die();
			}
			else if($_SESSION["flag"]==1){
			header("location:hr.php");
			die();
		
		}
		else
		{
			echo "invalid email or password";
			}
		}
	
}

	
?>



