
<?php

//$conn=mysqli_connect("localhost","root","");
//mysqli_select_db($conn,'project');



//include('function.php');



include('pagination.php');

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
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;

}

tr:nth-child(even) {
    background-color: white;
}
</style>

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php   include('slider.php'); 	?>






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
    <h3>&nbsp;&nbsp;List Of Employees</h3>
    
    
<?php

//$result = mysqli_query($conn,"SELECT * FROM role_detail");

//if (mysqli_num_rows($result) > 0)

//$employeeData = employeeData($conn);	
 //if($employeeData[0]!=0)

?>
  <table style="padding:10px; margin-left:25px; margin-top:25px;">
  
  <tr>
	<td>Serial No</td>
    <td>ID</td>
    <td>Employee Name</td>
    <td>Email</td>
    <td>Date Of Birth</td>
    <td>Mobile</td>
    <td>Father's Name</td>
    <td>Father's Mobile</td>
    <td>Address Detail</td>
    <td>Department Detail</td>
    <td>Role Detail</td>
    <td colspan="2"><center>ACTION</center></td>
    
  </tr>
<?php  
				//~ $records_per_page= 7;
				 
		 //~ $query="SELECT * FROM employee_detail";
		 //~ $result=mysqli_query($conn,$query);	
		 //~ $data=mysqli_num_rows($result);
		 
		 //~ $total_page=ceil($data/$records_per_page);
		 
		//~ if(isset($GET['page']) && $_GET['page']!=1)
		//~ {
		//~ $start_page_no=($GET['page']-1)*$records_per_page;
			//~ }
			//~ else
			//~ {
			//~ $start_page_no=0;	
			//~ }
			
		//~ $sql="SELECT * FROM employee_detail LIMIT $records_per_page OFFSET $start_page_no";
		//~ $result=mysqli_query($conn,$sql);
        //~ $row=mysqli_fetch_assoc($result);
		
 ?>  
  
  
  
<?php

$sql="SELECT * FROM employee_detail LIMIT $records_per_page OFFSET $start_page";
$result=mysqli_query($conn,$sql);

$count=0;
while($records=mysqli_fetch_assoc($result)) {
$count++;	    
?>
<tr>
    <td><?php echo $count; ?></td>
    <td><?php echo $records["id"]; ?></td>
    <td><?php echo $records["name"]; ?></td>
    <td><?php echo $records["email"]; ?></td>
    <td><?php echo $records["birhday"]; ?></td>
    <td><?php echo $records["mobile"]; ?></td>
    <td><?php echo $records["fname"]; ?></td>
    <td><?php echo $records["fmobile"]; ?></td>
    <td><?php echo $records["address"]; ?></td>
    <td><?php echo $records["department"]; ?></td>
    <td><?php echo $records["role"]; ?></td>
    
    <td><?php echo "<a href='http://localhost/project/delete.php?sn=$records[id]' onclick='return checkdelete()'><input type='submit' value='DELETE' id='deletebtn'></a>" ?></td>
    <td><?php echo "<a href='http://localhost/project/update_employee.php?sn=$records[id]&dn=$records[name] &en=$records[email]
     &bn=$records[birhday] &mn=$records[mobile] &fn=$records[fname]  &fm=$records[fmobile]  &an=$records[address] 
      &deptn=$records[department]  &rolen=$records[role]'
    onclick='return checkupdate()'><input type='submit' value='UPDATE' id='deletebtn'></a>" ?></td>

</tr>
<?php
}
?>
</table>
	 <div style="text-align:center;">	 
	   <?php for($start_page = 1; $start_page<= $total_page; $start_page++) { ?> 
		   <?php echo '<a href = "view_employee.php?page=' . $start_page . '">' . $start_page . ' </a>';?>
			<?php  
		}?>
		<?php
	//}
	//else{
	  //  echo "No result found";
	
	?>
 </div>


   
  
          
    </div>
  <!-- /.content-wrapper -->
  
 <?php  include('footer.php');    ?>

  
  <?php  include('js.php');    ?>
</body>
</html>





