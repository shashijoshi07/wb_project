<?php

include('function.php');



$getDepartment = getDepartment($conn);

?>

<?php

$client_nameErr = $emailErr = $phone_numberErr = $dateErr = $agency_nameErr = $departmentErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	  
	  $email		=	$_POST['email'];
	  $client_name  =  ucwords($_POST['client_name']);
		
	  $error=[];
      
		  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  //echo("$email is a valid email address");
	} else {
	  $error[]="$email is not a valid email address";
	}
       if (empty($_POST["email"])) {
     $error[] = "email is required";       //$error=[]and $error[] are same
  }
     if($query="SELECT * FROM  client_detail WHERE email='$email'")
   {      
	   $result=mysqli_query($conn,$query);
         if(mysqli_num_rows($result)>0){
			 $error[]='email is used';}
		 }
     
   else
    {
	  $email = test_input($_POST['email']);
	  
  }
     
     
 
     
      if (empty($_POST["date"])) {
    $error[] = " date is required";
  } else {
	  $date = test_input($_POST["date"]);
	  
  }
     
     
     
       
     
     if (empty($_POST["department"])) {
    $error[] = "department  is required";
  } else {
	  $department = test_input($_POST["department"]);
	  
  }
  
  if (empty($_POST["agency_name"])) {
    $error[] = "department  is required";
  } else {
	  $project_title = test_input($_POST["agency_name"]);
	  
  }
  
  if (empty($_POST["client_name"])) {
		$error[] = "Name is required";
		} else {
		$client_name = test_input($_POST["client_name"]);
  
		// check if name only contains letters and whitespace  !preg_match("/^[a-zA-Z ]*$/"
		if (!preg_match("/^[a-zA-Z ]*$/",$client_name)) {
		$error[] = "Only letters are allowed in your name";
		}
		}
		
		if (preg_match("/^[a-zA-Z ]*$/",$client_name))
		 {
	
     if (empty($_POST["phone_number"])) {
		$error[] = "phone is required";
		} elseif(strlen($_POST["phone_number"])<10){
		$error[] = "invalide phone number";}
		else {
		$phone_number = test_input($_POST["phone_number"]);
		}
		
		
		if(sizeof($error)<=0){
		  if(Addclient($conn)){
			  echo '<script type="text/javascript"> alert ("Data Inserted sucessfully")</script>';
			  }else{
				  $error[]='Error';
				  }
			  }
			  
} 			

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<?php include('header.php');   ?>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php   include('slider.php'); 	?>

  <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<br>
	<div class="container" style="width:60% ; height:auto;">
		<div class="card card-info">
			
			<?php    if(isset($error) && sizeof($error)>0){  ?>
		   <div class="error">
		   <?php   foreach($error as $error_message){
			   echo $error_message."<br>";    }    ?>
		   </div><?php   }  ?>
			
			
		<form action="" method="post">
		<h4 style="background-color:#89CFF0; color:white;" align="center">Enter Client Detail</h4>
		 <span class="error">*<b style='font-size:27px;'>&#8594;</b>Fields Are Required </span>
			<div class="card-body">
				
		
		 <div class="form-group">
				<label for="exampleInputName">Client Name</label>
				<span class="error">* <?php echo $client_nameErr;?> </span>
				<input type="name" class="form-control" id="exampleInputName" placeholder="Enter name" name="client_name">
			  </div>
			  
			  <div class="container">
			  <div class="row">	  
			  <div class="form-group col-md-6">
				<label for="exampleInputEmail1">Email address</label>
				<span class="error">* <?php echo $emailErr;?> </span>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"name="email">
			  </div>
			  
			  <div class="form-group col-md-6">
				<label for="exampleInputPhone">Phone Number</label>
				<span class="error">* <?php echo $phone_numberErr;?> </span>
				<input type="number" class="form-control" id="exampleInputPhone" placeholder="Phone number"name="phone_number">
			  </div>    
				</div><!---row--->
			  </div><!---container--->
			  
			  
			   <div class="container">
			  <div class="row">	  
			  <div class="form-group col-md-6">
				<label for="exampleInputDate">Date</label>
				<span class="error">* <?php echo $dateErr;?> </span>
				<input type="date" class="form-control" id="exampleInputDate" placeholder="dd/mm/yyyy"name="date">
			  </div>
			  
			  <div class="form-group col-md-6">
				<label for="exampleInputPhone">Department</label>
				<span class="error">* <?php echo $departmentErr;?> </span>
				<select class="form-control" name="department">
				<option value="" selected >Select an Option</option>


				<?php  foreach($getDepartment as $records) { ?>
					
				<option value="<?php echo $records['department'];?>" ><?php  echo $records["department"]; ?></option>	

				<?php  }  ?>
				</select>
			  </div>  
			  
			    
				</div><!---row--->
			  </div><!---container--->
			  
			  
			  <div class="form-group">
				<label for="exampleInputAgencyname">Agency Name</label>
				<span class="error">* <?php echo $agency_nameErr;?> </span>
				<input type="text" class="form-control" id="exampleInputAgencyname" placeholder="Enter Agency name" name="agency_name">
			  </div>
			  
			  
			 
			</div> <!-- /.card-body -->
		   

			<div class="card-footer">
			  <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
			</div>
			
		  </form>
				  
	  </div>
	  </div>
	  
			  
		</div> <!-- /.content-wrapper -->

  
 <?php  include('footer.php');    ?>
 
  <?php  include('js.php');    ?>
  
</body>
</html>




