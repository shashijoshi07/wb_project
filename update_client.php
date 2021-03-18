


<?php

include('function.php');
$getDepartment = getDepartment($conn);

 
 
 $uclient=$_GET['cn'];
 $client_name=$_GET['ccn'];			  
 $email=$_GET['cen'];			  
 $mobile=$_GET['cpn'];	
 $date=$_GET['cdtn'];		  
 $department=$_GET['cdn'];			  
 $agency_name=$_GET['can'];			  			  
 

if(isset($_POST['submit']))
{
	  //$uclient			=		$_POST['id'];
	  $client_namem		=		ucwords($_POST['client_name']);
	  $email			=		$_POST['email'];
	  $phone_number		=		$_POST['phone_number'];
	  $date				=		$_POST['date'];
	  $Department		=		ucwords($_POST['department']);
	  $agency_name		=		ucwords($_POST['agency_name']);
    
    $array=['id'=>$uclient,'client_name'=>$client_namem,'email'=>$email,'phone_number'=>$phone_number,
    'date'=>$date,'department'=>$Department,'agency_name'=>$agency_name];
    
    if(updateClient($conn,$array))
    {
		
		 
		echo '<script type="text/javascript"> alert("Updated")</script>';
		  
		}
    
    	else
    	{
			echo "err";
			
			}
	}

?>









<!DOCTYPE html>
<html lang="en">
<head>
	<?php  if($data==1)    { ?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/project/view_client.php">	
<?php   }	 ?>
<?php include('header.php');   ?>




</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php  // include('slider.php'); 	?>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  


	   <div class="container">
	   
	   <h4> Update A  Client Data</h4>
	   </div>
	    <div class="container" style="width:60% ; height:auto;">
			<div class="card card-info">
				
			<form action="" method="post">
		<h4 style="background-color:#89CFF0; color:white;" align="center">Update Client Detail</h4>
			<div class="card-body">
				
		
		 <div class="form-group">
				<label for="exampleInputName">Client Name</label>
				<input type="name" class="form-control" id="exampleInputName" placeholder="Enter name" value="<?php  echo $client_name;?>" name="client_name">
			  </div>
			  
			  <div class="container">
			  <div class="row">	  
			  <div class="form-group col-md-6">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="exampleInputEmail1" value="<?php  echo $email ?>"  placeholder="Enter email" name="email">
			  </div>
			  
			  <div class="form-group col-md-6">
				<label for="exampleInputPhone">Phone Number</label>
				<input type="number" class="form-control" id="exampleInputPhone" value="<?php  echo $mobile ?>" name="phone_number">
			  </div>    
				</div><!---row--->
			  </div><!---container--->
			  
			  
			   <div class="container">
			  <div class="row">	  
			  <div class="form-group col-md-6">
				<label for="exampleInputDate">Date</label>
				<input type="date" class="form-control" id="exampleInputDate" value="<?php  echo $date ?>" name="date">
			  </div>
			  
			  <div class="form-group col-md-6">
				<label for="exampleInputPhone">Department</label>
				<select class="form-control" name="department">
				<option> <?php  echo $department ?> </option>


				<?php  foreach($getDepartment as $records) { ?>
					
				<option value="<?php echo $records['department'];?>" ><?php  echo $records["department"]; ?></option>	

				<?php  }  ?>
				</select>
			  </div>  
			  
			    
				</div><!---row--->
			  </div><!---container--->
			  
			  
			  <div class="form-group">
				<label for="exampleInputAgencyname">Agency Name</label>
				<input type="text" class="form-control" id="exampleInputAgencyname" value="<?php  echo $agency_name ?>" name="agency_name">
			  </div>
			  
			  
			 
			</div> <!-- /.card-body -->
		   

			<div class="card-footer">
			  <center><button type="submit" class="btn btn-primary" name="submit">Submit</button></center>
			</div>
			
		  </form>
  </div>
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

 
 
 
  

 
?>





