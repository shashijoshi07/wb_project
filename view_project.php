
<?php

include('function.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
	
<?php include('header.php');   ?>

<script>
function checkdelete()
{
  var x = confirm("Are you sure you want to delete?");
  if (x)
      return true;
  else
    return false;
}
</script>


<style type="text/css">
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 95%;
	}

	td, th {
		border: 1px solid skyblue;
		text-align: left;
		padding: 8px;

	}

	tr:nth-child(even) {
		background-color: white;
	}
</style>

 </head>
 <body class="hold-transition sidebar-mini layout-fixed">
	<?php  // include('slider.php'); 	#dddddd;?>






	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
  
    <h3>&nbsp;&nbsp;List Of Client</h3>
    
    
<?php



	 $projectData = projectData($conn);	
	 if($projectData[0]!=0)
	 {
	
?>
  <table style="padding:10px; margin-left:25px; margin-top:25px;">
  
  <tr>
    <td>ID</td>
    <td>Client_name</td>
    <td>project_title</td>
    <td>date</td>
    <td>up_work_id</td>
    <td>hired_by_name</td>
    <td>department</td>
    <td>project_manager</td>
    <td>team_leader</td>
    <td>site_url</td>
    <td colspan="2"><center>ACTION</center></td>
    
</tr>
	<?php
	$i=1;
	foreach($projectData as $records) {     //records array ko string mai le raha h
	?>
<tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $records["client_name"]; ?></td>
    <td><?php echo $records["project_title"]; ?></td>
    <td><?php echo $records["date"]; ?></td>
    <td><?php echo $records["up_work_id"]; ?></td>
    <td><?php echo $records["hired_by_name"]; ?></td>
    <td><?php echo $records["department"]; ?></td>
    <td><?php echo $records["project_manager"]; ?></td>
    <td><?php echo $records["team_leader"]; ?></td>
    <td><?php echo $records["site_url"]; ?></td>
    <td><?php echo "<a href='http://localhost/project/delete.php?can=$records[id]' onclick='return checkdelete()'>
    <input type='submit' value='DELETE' id='deletebtn'></a>" ?></td>

</tr>
	<?php
	$i++;
	}
	?>
</table>

	 <?php
	}
	else
	{
		echo "No result found";
	}
	?>
 


   
  
          
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





