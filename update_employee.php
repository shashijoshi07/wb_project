
<?php
include('function.php');
$getDepartment = getDepartment($conn);	


$getRole = getRole($conn);	


//~ if(!isset($_SESSION["flag"])){
	 //~ header('location:login.php');
	 //~ die();
	//~ }
 $id  = $_GET['sn'];
 $name=$_GET['dn'];			  
 $email=$_GET['en'];	
 $birthday=$_GET['bn'];		  
 $mobile=$_GET['mn'];			  
 $fname=$_GET['fn'];			  
 $fmobile=$_GET['fm'];			  			  
 $address=$_GET['an'];			  
 $department=$_GET['deptn'];			  
 $role=$_GET['rolen'];			  
	


//~ $urole=$_GET['dn'];

if(isset($_POST['submit']))
{
			//$id 			   = 	$_GET['sn'];
			//$employeeid	   =	$_GET['rn'];
			$updatename		   = 	$_POST['name'];
			$updateemail	   = 	$_POST['email'];
			$updatebirthday	   = 	$_POST['birhday'];
			$updatemobile      =    $_POST['mobile'];
			$updatefname	   = 	$_POST['fname'];
			$updatefmobile	   = 	$_POST['fmobile'];
			$updateaddress	   =	$_POST['address'];
			$updatedepartment  =    $_POST['department'];
			$updaterole		   = 	$_POST['role'];
		
    $array=['id'=>$id,'name'=>$updatename,'email'=>$updateemail,'birhday'=>$updatebirthday,'mobile'=>$updatemobile,'fname'=>$updatefname,'fmobile'=>$updatefmobile,'address'=>$updateaddress,'department'=>$updatedepartment,'role'=>$updaterole];
    if(updateEmployee($conn,$array))
    {
		
		echo "<script>alert('RECORD Updated FROM DATABASE')</script>";
		
		}
    
    	else{
			echo "error";
			}
	}
	
 
?>



 
 



<!DOCTYPE html>
<html lang="en">
<head>


 <?php /*if($_SESSION["flag"] ==0){*/ include('header.php'); // } ?>
 
 
 <?php //if($_SESSION["flag"] ==1){ include('header_hr.php');  } ?>


<style>
.error {color: #FF0000;}
</style>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
 <?php /*if($_SESSION["flag"] ==0){*/ include('slider.php');  //} ?>

<?php //if($_SESSION["flag"] ==1){ include('slider_hr.php');  } ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  


   <div class="container">
  <form action="" method="post" style="margin-left:10px;  padding:5px;">
	   <div class="form-group">
      <label for="pwd">Employee Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php  echo $name     ?>" >
    
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"value="<?php  echo $email;     ?>">
    
    </div>
  
    
   <div class="form-group"> <!-- Date input -->
        <label >Date of Birth</label>
        <input value="<?php  echo $birthday;  ?>" name="birhday" placeholder="dd/mm/yyyy"    type="date" />
        
      </div>
      
      <div class="form-group"> <!-- mobile input -->
        <label class="control-label" for="mobile">MOBILE</label>
        <input  id="mobile" name="mobile" placeholder="mobile number" type="number"value="<?php  echo $mobile     ?>"/>
        
      </div>
             
              <div class="form-group">
      <label for="pwd">Father's Name:</label>
      <input type="name" class="control-label" id="fname" placeholder="Enter father's name" name="fname"value="<?php  echo $fname     ?>">
      
    </div>
       
       <div class="form-group"> <!-- mobile input -->
        <label class="control-label" for="mobile">FATHER'S MOBILE</label>
        <input  id="mobile" name="fmobile" placeholder="fathers mobile number" type="number"value="<?php  echo $fmobile    ?>"/>
       
      </div>
             
             <div class="form-group">
			<label>Enter Your Address</label>	 
             <input type="address" name="address"value="<?php  echo $address     ?>"/>
             
           </div>
                                         
   <div class="dropdown">
    <label> Department </label>
<select name="department">
<option value="" selected >Select an Option</option>


<?php  foreach($getDepartment as $records) { ?>
	
<option value="<?php echo $records['id'];?>" ><?php  echo $records["department"]; ?></option>	

<?php  }  ?>
</select>
  </div><br>
  
  
  
  <div class="dropdown">
    <label> Role </label>
<select name="role">
<option selected >Select an Option</option>


<?php  foreach($getRole as $records) { ?>
	
<option value="<?php echo $records['id'];?>" ><?php  echo $records["role"]; ?></option>	

<?php  }  ?>
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





 		  
      

 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 
	
	// $id        =	$_POST['id'];
	$name		=	$_POST['name'];			  
	$email		=	$_POST['email'];	
	$birthday	=	$_POST['birthday'];		  
	$mobile		=	$_POST['mobile'];			  
	$fname		=	$_POST['fname'];			  
	$fmobile	=	$_POST['fmobile'];			  			  
	$address	=	$_POST['address'];			  
	$department =	$_POST['department'];			  
	$role		=	$_POST['role'];	
	
	 
	
 
	 $query="UPDATE `employee_detail` SET `name`='$name',`email`='$email',`birhday`='$birthday',`mobile`='$mobile',
	 `fname`='$fname',`fmobile`='$mobile',`address`='$address',`department`='$department',`role`='$role' WHERE id=$id";
	
	 
	 $data=mysqli_query($conn,$query);
	  

if($data)
{
	echo "<script>RECORD UPDATE FROM DATABASE</script>";
		
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0 URL=http://localhost/project/view_employee.php">
	
	<?php 
}
	else {
		echo "<script>RECORD UPDATED FROM DATABASE</script>";	
		}


}
*/ 

?>




