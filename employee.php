
<?php
session_start();

 include('function.php');

/*
if(!isset($_SESSION["flag"])){
	 header('location:login.php');
	die();
}
*/


	//error_reporting(0);
	
	
$nameErr = $emailErr = $passwordErr = $mobileErr = $fnameErr = $fmobileErr = $birthdayErr = $addressErr = $departmentErr = $roleErr  = "";
$name = $email = $password = $mobile = $birthday = $fname = $fmobile = $address = $department = $role =	"";
	

 
 ?>			  
	
 <?php
 
 $getRole = getRole($conn);
 $getDepartment = getDepartment($conn);
 
 

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	  $name=$_POST['name'];
	  $email=$_POST['email'];
	  $password=$_POST['password'];
      $mobile=$_POST['mobile'];
      $fname=$_POST['fname'];
      $fmobile=$_POST['fmobile'];
      $birthday=$_POST['birhday'];
	  $address=$_POST['address'];
	  $department=$_POST['department'];
	  $role=$_POST['role'];


 $error=validate_emp($conn);
 
 
 //~ echo"<pre>";
 //~ print_r($validate_emp);
//~ exit();

 	

	
 
 if(empty($error)){
	 
     $getAddemployee=getAddemployee($conn);
     echo '<script type="text/javascript"> alert ("Data Inserted sucessfully")</script>';

}else{
	$error[]="Error".mysqli_error($conn);
	
	}

}

?>



<!DOCTYPE html>
<html lang="en">
<head>


 <?php // if($_SESSION["flag"] ==0){?><?php include('header.php'); // } ?>
 
 
 <?php // if($_SESSION["flag"] ==1){ include('header_hr.php');  } ?>


  <style>
		.error {color: #FF0000;}
  </style>


  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
		<?php //if($_SESSION["flag"] ==0){ ?><?php// include('slider.php');  //} ?>

		<?php // if($_SESSION["flag"] ==1){ include('slider_hr.php');  } ?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  


   <div class="container">
	 <div class="card-card-warning">   
	 <div class="card-header" style="width:80%">   
	   
	   
	   <?php    if(isset($error) && sizeof($error)>0){  ?>
		   <div class="error">
		   <?php   foreach($error as $error_message){
			   echo $error_message."<br>";    }    ?>
		   </div><?php   }  ?>
		   
		  </div> <br>
		  
		    <span class="error">*<b style='font-size:27px;'>&#8594;</b>Fields Are Required </span>
             
			<form action="" method="post" style="margin-left:10px;  padding:5px;">
			<h4 style="background-color:#2B547E; color:white;" align="center">Enter Employee Detail</h4>
				<div class="card-body">
				
		
					<div class="form-group">
					<label for="exampleInputName">Employee Name:</label>
					<span class="error">* <?php echo $nameErr;?> </span>
					<input type="name" class="form-control" id="exampleInputName" placeholder="Enter name" name="name">
					</div>
			  
		  <div class="container">
		  <div class="row">	  
				  
			  <div class="form-group col-md-12">
				<label for="exampleInputEmail1">Email address</label>
				 <span class="error">* <?php echo $emailErr;?> </span>
				<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email"name="email">
			  </div>
			  
		</div><!---row--->
		</div><!---container--->
					  
					  <div class="form-group">
			  <label for="pwd">Password:</label>
			   <span class="error">* <?php echo $passwordErr;?> </span>
			  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
			 
			</div>  
			  
			   <div class="container">
			  <div class="row">	  
				  
			 <div class="form-group col-md-6"> <!-- Date input -->
        <label >Date of Birth</label>
        <span class="error">* <?php echo $birthdayErr;?> </span>
        <input  class="form-control" name="birhday" placeholder="dd/mm/yyyy" type="date" />
      </div>
      
      <div class="form-group col-md-6"> <!-- mobile input -->
        <label class="control-label" for="mobile">MOBILE</label>
        <span class="error">* <?php echo $mobileErr;?> </span>
        <input class="form-control"  id="mobile" name="mobile" placeholder="mobile number" type="number"/>
      </div>
		</div><!---row--->
			  </div><!---container--->
			  
			  
			  <div class="container">
			  <div class="row">	
				    
			   
      <div class="form-group col-md-6"> <!-- mobile input -->
        <label class="control-label" for="mobile">Father's Name:</label>
        <span class="error">* <?php echo $mobileErr;?> </span>
        <input type="name" class="form-control" id="fname" placeholder="Enter father's name" name="fname">
      </div>
      
      <div class="form-group col-md-6"> <!-- mobile input -->
        <label class="control-label" for="mobile">Father's MOBILE</label>
        <span class="error">* <?php echo $mobileErr;?> </span>
        <input class="form-control"  id="mobile" name="fmobile" placeholder="fathers mobile number" type="number"/>
      </div>
		</div><!---row--->
			  </div><!---container--->
			  
			  
			  <div class="form-group">
				<label for="exampleInputAddressname">Enter Your Address</label>
				 <span class="error">* <?php echo $addressErr;?> </span>
				<input type="address" class="form-control" id="exampleInputAddressname" placeholder="Enter Address" name="address">
			  </div>
			  
			  
			  
			  <div class="container">
			  <div class="row">	  
				  
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
      
					  <div class="form-group col-md-6">
				   <label for="exampleInputPhone">Role</label>
				   <span class="error">* <?php echo $roleErr;?> </span>
				<select class="form-control" name="role">
				<option value="" selected >Select an Option</option>


				<?php  foreach($getRole as $records) { ?>
					
				<option value="<?php echo $records['role'];?>" ><?php  echo $records["role"]; ?></option>	

				<?php  }  ?>
				</select>
				
				  </div><br>
						</div><!---row--->
							  </div><!---container--->
							  
			  <div class="card-footer">
			  <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
			</div>
			
		  </form>
		
			 
			 
			</div> <!-- /.card-body -->
		   

			
  
  
  

  
  </div>
  
          
    </div>
    </div><!-- /.content-wrapper -->
  
  
	<?php  include('footer.php');    ?>

   <?php  include('js.php');    ?>
  
</body>
</html>







