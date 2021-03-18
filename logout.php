
<?php
session_start();
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'project');


?>

<html>
<head>

<title>LOGOUT</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	
<h4>THANK YOU<br><br>
<?php echo $_SESSION["useremail"];?></h4>
<form action="" method="post">
<input type="submit" name="logout"  value="Log Out">
</form>
 <?php
 if(isset($_POST['logout'])){
	 
	 session_destroy();
	 header('location:login.php');
	 
	 }
 
 
 
 ?>

</body>
</html>
