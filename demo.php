
<?php
session_start();
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,'project');

?>



<!DOCTYPE html>
<html lang="en">
<head>
<?php include('header.php');  ?>




</head>
<body class="hold-transition sidebar-mini layout-fixed">
 



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  


   <div class="container">
  <form action="" method="post" style="margin-left:10px;  padding:5px;">
	  
   
    
    
   <div class="form-group"> <!-- Date input -->
       <th>DOB <td>
		   <input type="date" name="birthday" />
  
      
     
             
              
       
      
             
            
             <div class="form-group">
			<label>Enter Your Address</label>	 
             <input type="text" name="address" required>
           </div>
                                         
 
  <br>

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


 
 
  
  //error_reporting(0);
 


 if (isset($_POST['submit']))
 {
	 
      $birthday	=	$_POST['birthday'];
	  $address	=	$_POST['address'];
	  
	 //echo "<pre>";
	// print_r($_POST);
	// exit();
     

	 
	
		
		
		
		
      
     
 
	 $query="INSERT INTO `employee`(`birthday`,`address`) VALUES ('$birthday','$address')";
	
	 
	 $data=mysqli_query($conn,$query);
	
	
	if($data){
	echo "registerd";
}
 
  else {echo "fail";
	  }
    



}




?>




