
<?php

$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'project');





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
  


	   <div class="container">
	   <h2>WELCOME </h2>
	   <h4>You Can Create A New Department</h4>
	   </div>
	    <div class="container" style="width:60% ; height:auto;">
			<div class="card card-info">
  <form action="" method="post">
	  <br>
	 
	
 
  <div class="mb-3">
   <center style="background-color:blue;"><label class="form-label" style="color:white;">Department</label></center>
    <input type="text" class="form-control"  name="department"	>
  </div>
  
  
  <button type="submit" name="submit" class="btn btn-success btn-block">Insert</button>
  
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

 
 
 
  

  //error_reporting(0);
 


 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	 
	  $department=ucwords($_POST['department']);
	 
	 
	
	 
	 if($query="SELECT * FROM  department_detail WHERE department='$department'")
         $result=mysqli_query($conn,$query);
         
         if(mysqli_num_rows($result)>0){
			 echo "department is used";
			 } 
			 else{
 
	 $query="INSERT INTO `department_detail`(`department`) VALUES ('$department')";
	
	 
	 $data=mysqli_query($conn,$query);
	
	
	if($data){
		
	
	echo '<script type="text/javascript"> alert("department created")</script>';

}
  else {
	  
	  echo '<script type="text/javascript"> alert("department exist")</script>';
	  
	  }
   
   
   
    }



}

?>




