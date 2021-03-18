<?php

include('function.php');



$getDepartment = getDepartment($conn);
$clientData=clientData($conn);
$biddin_dept=biddin_dept($conn);
$hired_dept=hired_dept($conn);
?>


<?php

$client_nameErr = $Up_Work_IdErr = $phone_numberErr = $hired_byErr = $dateErr = $departmentErr =
 $project_managerErr = $team_leaderErr = $site_urlErr = $project_titleErr = "";

// include('validation_project.php');

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	  $client_name		=		ucwords($_POST['client_name']);
	  $project_title	=		$_POST['project_title'];
	  $start_date		=		$_POST['date'];
	  $up_work_id		=		$_POST['up_work_id'];
	  $hired_by_name	=		ucwords($_POST['hired_by_name']);
      $department		=		ucwords($_POST['department']);
	  $project_manager	=		ucwords($_POST['project_manager']);
	  $team_leader		=		ucwords($_POST['team_leader']);
	  $site_url			=		$_POST['site_url'];
      $file      		=		$_FILES['file'];
		
			//~ // Count total files
			 //~ $countfiles = count($_FILES['file']['name']);
			 
			 //~ // Looping all files
			 //~ for($i=0;$i<$countfiles;$i++)
			 //~ {
			   //~ $filename = $_FILES['file']['name'][$i];
			   
			   //~ // Upload file
			   //~ move_uploaded_file($_FILES['file']['tmp_name'][$i],'file/'.$filename);
				
			 //~ }
			 
			 
   //~ if(isset($_FILES['file'])){
      //~ $errors= array();
      //~ $file_name = $_FILES['file']['name'];
      //~ $file_size = $_FILES['file']['size'];
      //~ $file_tmp = $_FILES['file']['tmp_name'];
      //~ $file_type = $_FILES['file']['type'];
      //~ $file_ext=strtolower(end(explode('.', $file_name)));
      
      //~ $expensions= array("jpeg","jpg","png");
      
      //~ if(in_array($file_ext,$expensions)=== false){
         //~ $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      //~ }
      
      //~ if($file_size > 2097152) {
         //~ $errors[]='File size must be excately 2 MB';
      //~ }
      
      //~ if(empty($errors)==true) {
         //~ move_uploaded_file($file_tmp,"file/".$file_name);
         //~ echo "Success";
      //~ }else{
         //~ print_r($errors);
      //~ }
   //~ }
    
   //~ $file = $_FILES['file'];
      //~ $file_name = $_FILES['file']['name'];
      //~ $file_size =$_FILES['file']['size'];
      //~ $file_tmp =$_FILES['file']['tmp_name'];
      //~ $file_type=$_FILES['file']['type'];
      //~ $chkstr=implode(",",$file);
      //~ $file_ext=strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));

	  
      
      //~ if(empty($errors)==true) {
         //~ $path="images/".$image;
	     //~ move_uploaded_file($tempimagename,"$path");
	//~ }
	
	 $error=validateProject($conn);

 
 //~ echo"<pre>";
 //~ print_r($validateAddproject);
//~ exit();

 	

	
 
 if(empty($error)){
	 
     $Addproject=Addproject($conn);
     echo '<script type="text/javascript"> alert ("Data Inserted sucessfully")</script>';
}else{
	$error[]="Error".mysqli_error($conn);
	
	}

}



?>



	<!DOCTYPE html>
	<html lang="en">
	<head>
	<?php include('header.php');   ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
	<?php //  include('slider.php'); 	?>

   <!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<br>
	<div class="container" style="width:60% ; height:auto;">
		<div class="card card-info">
			
				<?php  if(isset($error) && sizeof($error)>0){  ?>
		<div class="error">
			   <?php   foreach($error as $error_message){
				       echo $error_message."<br>";    }        ?>
	   </div> <?php   } 									   ?>
			
			
	   <form action="" method="post" enctype="multipart/form-data" style="padding:7px;padding-left:3px;padding-right:5px;">
				 <h4 style="background-color:#89CFF0; color:white;" align="center">Enter Client Detail</h4>
				 <span class="error">*<b style='font-size:27px;'>&#8594;</b>Fields Are Required </span>
		 <div class="card-body">
				
		 <div class="container">
		 <div class="row">
				<div class="form-group col-md-6">
					<label for="exampleInputName">Client Name</label>
					<span class="error">* <?php echo $client_nameErr;?> </span>
					<select class="form-control" name="client_name">
						<option value="" selected >Select an Option</option>


						<?php foreach($clientData as $records) { ?>
					
						<option value="<?php echo $records['client_name'];?>" ><?php  echo $records['client_name']; ?></option>	

						<?php  }  ?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="exampleInputProjectTitle">Project Title</label>
					<span class="error">* <?php echo $project_titleErr;?> </span>
					<input type="name" class="form-control" id="exampleInputProjectTitle" placeholder="Enter project title" name="project_title">
				</div>
				
		 </div><!---row--->
		 </div><!---container--->  
			  
			  
		  <div class="container">
		  <div class="row">	  
			  <div class="form-group col-md-6">
			 <label for="exampleInputDate">Start Date</label>
			 <span class="error">* <?php echo $dateErr;?> </span>
					<input type="date" class="form-control" id="exampleInputDate" placeholder="dd/mm/yyyy"name="date">
				   </div>
			  
				<div class="form-group col-md-6">
					<label for="exampleUpWorkId">Up Work Id</label>
					<span class="error">* <?php echo $Up_Work_IdErr;?> </span>
					<input type="number" class="form-control" id="exampleUpWorkId" placeholder="Up Work Id "name="up_work_id">
				</div>    
		  </div><!---row--->
		  </div><!---container--->
			  
			 
                    
		   <div class="container">
		   <div class="row">	  
			  <div class="form-group col-md-6">
					<label for="exampleInputPhone">Program Department</label>
				<span class="error">* <?php echo $departmentErr;?> </span>
					<select class="form-control" name="department" id="depart">
						 
                   <option value="0">- Select -</option>
					<?php 
					// Fetch Department
					$sql_department ="SELECT * FROM department_detail WHERE `department`='Bidding Php' or `department`='Bidding Seo'";
					$department_data = mysqli_query($conn,$sql_department);
					while($row = mysqli_fetch_assoc($department_data) ){
						
						$departid = $row['id'];
						$depart_name = $row['department'];
					  
						// Option
						echo "<option value='".$depart_name."' >".$depart_name."</option>"; 
					}
					?>

					</select>
			  
			  </div>
			  
		    <div class="form-group col-md-6">
				 <label for="exampleHiredBy">Hired By</label>
					<span class="error">* <?php echo $hired_byErr;?> </span>
				    <select class="form-control" name="hired_by_name" id="hire">
						 
                    <option value="0">- Select -</option>
				    </select>
			  </div>  
			  
			    
		  </div><!---row--->
		  </div><!---container--->
			  
		 <div class="container">
		 <div class="row">	  
				<div class="form-group col-md-6">
					<label for="exampleInputProejectManager">Project Manager</label>
					<span class="error">* <?php echo $project_managerErr;?> </span>
					<input type="text" class="form-control" id="exampleInputProejectManager" placeholder="Enter project manager name" name="project_manager">
					</div>
			  
				<div class="form-group col-md-6">
					<label for="exampleInputProejectManager">Team Leader</label>
					<span class="error">* <?php echo $team_leaderErr;?> </span>
					<input type="text" class="form-control" id="exampleInputTeamLeader" placeholder="Team leader name is" name="team_leader">
				</div>
			  
			  
		  </div><!---row--->
		  </div><!---container--->
		  
		  
		 <div class="container">
		 <div class="row">	
				<div class="form-group col-md-6">
					<label for="exampleSiteURL">Site URL</label>
					<span class="error">* <?php echo $site_urlErr;?> </span>
					<input type="text" class="form-control" id="exampleSiteURL" placeholder="Enter name" name="site_url">
				</div>
                <div class="form-group col-md-6">
					<label for="exampleSiteURL">Upload File</label>
					<span class="error">* <?php echo $site_urlErr;?> </span>
					<input type="file" name="file" class="" id="exampleSiteURL" placeholder="Enter name" multiple>
				</div>
		  </div><!---row--->
		  </div><!---container---> 
			 
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
				
   <script type="text/javascript">
        $(document).ready(function(){

            $("#depart").change(function(){
                var uid = $(this).val();

                $.ajax({
                    url: 'getHired.php',
                    type: 'POST',
                    data: {depart:uid},
                    dataType: 'json',
                    success:function(response){
    
                        var len = response.length;
                        
					
					
                        $("#hire").empty();
                        for( var i = 0; i<len; i++){
							
                           var id = response[i]['id'];
                            var name = response[i]['name'];

                            $("#hire").append("<option value='"+id+"'>"+name+"</option>");

                        }
                    }
                  
                    
                });
            });

			});
    </script>
    
	</body>
	</html>




