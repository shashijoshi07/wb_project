
<?php
session_start();
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'project');


if(!isset($_SESSION["flag"])){
	 header('location:login.php');
	 die();
	}

$nameErr = $emailErr = $passwordErr = $mobileErr = $fnameErr = $fmobileErr = $birthdayErr = $addressErr = $employeeErr = "";
$name = $email = $password = $mobile = $birthday = $fname = $fmobile = $address = $employee = 	"";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  //error_reporting(0);
 
 			  
	
 


 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	  $name=$_POST['name'];
	  $email=$_POST['email'];
	  $password=$_POST['password'];
      $mobile=$_POST['mobile'];
      $fname=$_POST['fname'];
      $fmobile=$_POST['fmobile'];
      $birthday=$_POST['birthday'];
	  $address=$_POST['address'];
	  $employee=$_POST['employee'];
	   
     
     
     
      if (empty($_POST["email"])) {
    $emailErr = "email is required";
  } else {
	  $email = test_input($_POST["email"]);
	  
  }
     
      if (empty($_POST["password"])) {
    $passwordErr = "field is required";
  } else {
	  $password = test_input($_POST["password"]);
	  
  }
     
     
      if (empty($_POST["mobile"])) {
    $mobileErr = "number is required";
  } else {
	  $mobile = test_input($_POST["mobile"]);
	  
  }
     
     
      if (empty($_POST["fmobile"])) {
    $fmobileErr = "Father mobile is required";
  } else {
	  $fmobile = test_input($_POST["fmobile"]);
	  
  }
     
     
      if (empty($_POST["birthday"])) {
    $birthdayErr = "birthday date is required";
  } else {
	  $birthday = test_input($_POST["birthday"]);
	  
  }
     
     
     
       if (empty($_POST["address"])) {
    $addressErr = "address is required";
  } else {
	  $address = test_input($_POST["address"]);
	  
  }
     
     if (empty($_POST["employee"])) {
    $employeeErr = "field is required";
  } else {
	  $employee = test_input($_POST["employee"]);
	  
  }
     
     
       if (empty($_POST["fname"])) {
    $fnameErr = "Father name is required";
  } else {
	   $fname = test_input($_POST["fname"]);
   }
	   
	  
  
     
     
     

	 
	 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
   
 
    if (preg_match("/^[a-zA-Z-' ]*$/",$name)) 
    {
		
		
	
		 
		
		
		
      $phn=strlen($_POST['mobile']);
  if($phn<10)
  {
	  echo $phn;
	  echo "phone is invalid";
	  }
   elseif($phn>10)
   {
	   echo "invalid";
	   echo $phn;
	   }
  else{
	 
	  $fmobile=$_POST['fmobile'];
	  {
		
		
		$fphn=strlen($_POST['fmobile']);
  if($fphn<10)
  {
	  echo $fphn;
	  echo "phone is invalid";
	  }
   elseif($fphn>10)
   {
	   echo "invalid";
	   echo $fphn;
	   }
  else{
	 
	  $fmobile=$_POST['fmobile'];
	  {
		
		
		
		if($query="SELECT * FROM  employee_detail WHERE email='$email'")
         $result=mysqli_query($conn,$query);
         
         if(mysqli_num_rows($result)>0){
			 echo "email is used";
			 } 
			 else{
				 
				  
				  
				  
	
		
	/*		
	if (empty($_POST["address"])) {
    echo "address is required";
  } else {  
	 
      if (empty($_POST["email"])) {
    echo "email is required";
  } else {
     
     
     
     if (empty($_POST["password"])) {
    echo "password is required";
  } else {
     
     
     if (empty($_POST["birhday"])) {
    echo "birthday is required";
  } else {
     
     
     if (empty($_POST["name"])) {
    echo "name is required";
  } else {
     
     
       if (empty($_POST["fname"])) {
    echo "fathername is required";
  } else {
     
     
      if (empty($_POST["fmobile"])) {
    echo "fathernumber is required";
  } else {
     
     
     if (empty($_POST["mobile"])) {
    echo "mobile number is required";
  } else {
     
     */
     
     
 
	 $query="INSERT INTO `employee_detail`( `name`, `email`, `password`, `birhday`, `mobile`, `fname`, `fmobile`, `address`, `employee`) 
	 VALUES ('$name','$email','$password','$birthday','$mobile','$fname','$fmobile','$address','$employee')";
	
	 
	 $data=mysqli_query($conn,$query);
	
	
	if($data){
	echo '<script type="text/javascript"> alert("REgistered")</script>';
	//echo "<script>alert('Registered')</script>";
}
 
  else {
	  echo '<script type="text/javascript"> alert("NoT REgistered")</script>';
	  //echo "<script>alert('Registered')</script>";
	  }
    }}
    
  }
}
  }
}
} 
 }
  
 
 /*
 }
}


}  }
 }
   }
 }
  }

*/



?>



<!DOCTYPE html>
<html lang="en">
<head>


 <?php if($_SESSION["flag"] ==0){ include('header.php');  } ?>
 
 
 <?php if($_SESSION["flag"] ==1){ include('header_hr.php');  } ?>


<style>
.error {color: #FF0000;}
</style>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
 <?php if($_SESSION["flag"] ==0){ include('slider.php');  } ?>

<?php if($_SESSION["flag"] ==1){ include('slider_hr.php');  } ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  


   <div class="container">
  <form action="" method="post" style="margin-left:10px;  padding:5px;">
	   <div class="form-group">
      <label for="pwd">Employee Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" >
      <span class="error">* <?php echo $nameErr;?> </span>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      <span class="error">* <?php echo $emailErr;?> </span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      <span class="error">* <?php echo $passwordErr;?> </span>
    </div>
    
   <div class="form-group"> <!-- Date input -->
        <label >Date of Birth</label>
        <input  name="birthday" placeholder="dd/mm/yyyy" type="date" />
        <span class="error">* <?php echo $birthdayErr;?> </span>
      </div>
      
      <div class="form-group"> <!-- mobile input -->
        <label class="control-label" for="mobile">MOBILE</label>
        <input  id="mobile" name="mobile" placeholder="mobile number" type="number"/>
        <span class="error">* <?php echo $mobileErr;?> </span>
      </div>
             
              <div class="form-group">
      <label for="pwd">Father's Name:</label>
      <input type="name" class="control-label" id="fname" placeholder="Enter father's name" name="fname">
      <span class="error">* <?php echo $fnameErr;?> </span>
    </div>
       
       <div class="form-group"> <!-- mobile input -->
        <label class="control-label" for="mobile">FATHER'S MOBILE</label>
        <input  id="mobile" name="fmobile" placeholder="fathers mobile number" type="number"/>
        <span class="error">* <?php echo $fmobileErr;?> </span>
      </div>
             
             <div class="form-group">
			<label>Enter Your Address</label>	 
             <input type="address" name="address"/>
             <span class="error">* <?php echo $addressErr;?> </span>
           </div>
                                         
  <div class="dropdown">
    <label>Add field </label>
<select name="employee">
<option name="employee" value="PHP_TRAINEE">PHP_TRAINEE</option>
<option name="employee" value="BIDDER">BIDDER</option>
<option name="v" value="SEO">SEO</option>
</select>
  </div><br>

  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  </form>
  </div>
  
          
    </div>
  <!-- /.content-wrapper -->
  
 <?php  include('footer.php');    ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>


<?php

/*
 
 
  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  //error_reporting(0);
 


 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	  $name=$_POST['name'];
	  $email=$_POST['email'];
	  $password=$_POST['password'];
      $mobile=$_POST['mobile'];
      $fname=$_POST['fname'];
      $fmobile=$_POST['fmobile'];
      $birthday=$_POST['birthday'];
	  $address=$_POST['address'];
	  $employee=$_POST['employee'];
	 
     

	 
	 if (empty($_POST["name"])) {
    $usernameErr = "Name is required";
  } else {
    $username = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
   
 
    if (preg_match("/^[a-zA-Z-' ]*$/",$username)) 
    {
		
		
		 if (empty($_POST["fname"])) {
    $usernameErr = "Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $usernameErr = "Only letters and white space allowed";
    }
		 if (preg_match("/^[a-zA-Z-' ]*$/",$fname)) 
    {
		
		
		
      $phn=strlen($_POST['mobile']);
  if($phn<10)
  {
	  echo $phn;
	  echo "phone is invalid";
	  }
   elseif($phn>10)
   {
	   echo "invalid";
	   echo $phn;
	   }
  else{
	 
	  $fmobile=$_POST['fmobile'];
	  {
		
		
		$fphn=strlen($_POST['fmobile']);
  if($fphn<10)
  {
	  echo $fphn;
	  echo "phone is invalid";
	  }
   elseif($fphn>10)
   {
	   echo "invalid";
	   echo $fphn;
	   }
  else{
	 
	  $fmobile=$_POST['fmobile'];
	  {
		
		
		
		if($query="SELECT * FROM  employee_detail WHERE email='$email'")
         $result=mysqli_query($conn,$query);
         
         if(mysqli_num_rows($result)>0){
			 echo "email is used";
			 } 
			 else{
				 
				  
	 if (empty($_POST["name"])) {
    $nameErr = "field is required";
  } else {
	  $name = test_input($_POST["name"]);
	  
  }
		
			
	if (empty($_POST["address"])) {
    echo "address is required";
  } else {  
	 
      if (empty($_POST["email"])) {
    echo "email is required";
  } else {
     
     
     
     if (empty($_POST["password"])) {
    echo "password is required";
  } else {
     
     
     if (empty($_POST["birhday"])) {
    echo "birthday is required";
  } else {
     
     
     if (empty($_POST["name"])) {
    echo "name is required";
  } else {
     
     
       if (empty($_POST["fname"])) {
    echo "fathername is required";
  } else {
     
     
      if (empty($_POST["fmobile"])) {
    echo "fathernumber is required";
  } else {
     
     
     if (empty($_POST["mobile"])) {
    echo "mobile number is required";
  } else {
     
     
     
     
 
	 $query="INSERT INTO `employee_detail`( `name`, `email`, `password`, `birhday`, `mobile`, `fname`, `fmobile`, `address`, `employee`) 
	 VALUES ('$name','$email','$password','$birthday','$mobile','$fname','$fmobile','$address','$employee')";
	
	 
	 $data=mysqli_query($conn,$query);
	
	
	if($data){
	echo "registerd";
}
 
  else {echo "fail";}
    }}
    
  }
}
  }
}
} }
 }
 } }
}


}  }
 }
   }
 }
  }


*/

?>




