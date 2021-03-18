<?php

include('lib.php');

/*get all roles*/
function getRole($conn){                            //$conn mai get role tabhi lagya h taki jo file include kri h woh connection read kr sake  
$result=mysqli_query($conn,"SELECT * FROM role_detail WHERE 1=1");	//1=1 status check kr raha h ki true h ya false h sirf 1 ki bejega value zero ki nhi
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$role[]=$row;										//$role har jagah same rahega jaha getrole function call hoga ya sirf function mai same rahega
		}
		}	                                                        
	else{
		
		$role[]=0;
		}
	
   return $role;
   
	}
	
	/*get all department*/
	function getDepartment($conn){                           
$result=mysqli_query($conn,"SELECT * FROM department_detail WHERE 1=1");	
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$role[]=$row;										 
		}
		}	                                                        
	else{
		
		$role[]=0;
		}
	
   return $role;
   
	}
	
  
 /*get all employee data*/
	//~ function employeeData($conn){ 
		                          
//~ $result=mysqli_query($conn,"SELECT * FROM employee_detail WHERE 1=1");	
//~ if(mysqli_num_rows($result)>0)
//~ {	
	//~ while($row=mysqli_fetch_assoc($result)){
 		//~ $role[]=$row;										 
		//~ }
		//~ }	                                                        
	//~ else{
		
		//~ $role[]=0;
		//~ }
	
   //~ return $role;
   
	//~ }
	
	
	//~ function pagination($conn){
		
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
        //~ return $row;
	//~ }
		//~ $pagination=pagination($conn);
		//~ echo $pagination;
		//~ exit();
		
	

	
	/* get client data */

	function clientData($conn){                           
$result=mysqli_query($conn,"SELECT * FROM client_detail WHERE 1=1");	
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$role[]=$row;										 
		}
		}	                                                        
	else{
		
		$role[]=0;
		}
	
   return $role;
   
	}
	
	
		/* get project data */

	function projectData($conn){                           
$result=mysqli_query($conn,"SELECT * FROM add_project WHERE 1=1");	
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$role[]=$row;										 
		}
		}	                                                        
	else{
		
		$role[]=0;
		}
	
   return $role;
   
	}
	
	/* get  bidding department */

	function biddin_dept($conn){                           
$result=mysqli_query($conn,"SELECT * FROM department_detail WHERE `department`='Bidding Php' or `department`='Bidding Seo'");	
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$bidding[]=$row;										 
		}
		}	                                                        
	else{
		
		$bidding[]=0;
		}
	
   return $bidding;
   
	}
	
	/* get  hired by name*/

	function hired_dept($conn){                           
$result=mysqli_query($conn,"SELECT * FROM employee_detail WHERE `department`='Bidding Php' or `department`='Bidding Seo'");	
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$hired[]=$row;										 
		}
		}	                                                        
	else{
		
		$hired[]=0;
		}
	
   return $hired;
   
	}
	
 /*   insert employee  */
function getAddemployee($conn){

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	  $name			=		$_POST['name'];
	  $email		=		$_POST['email'];
	  $password		=		$_POST['password'];
      $mobile		=		$_POST['mobile'];
      $fname		=		$_POST['fname'];
      $fmobile		=		$_POST['fmobile'];
      $birthday		=		$_POST['birhday'];
	  $address		=		$_POST['address'];
	  $department	=		$_POST['department'];
	  $role			=		$_POST['role'];
	  
      	 
	 $query="INSERT INTO `employee_detail`( `name`, `email`, `password`, `birhday`, `mobile`, `fname`, `fmobile`, `address`, `department`,
	 `role`) 
	 VALUES ('$name','$email','$password','$birthday','$mobile','$fname','$fmobile','$address','$department','$role')";
	
	 
	 $data=mysqli_query($conn,$query);
	
	
	if($data){
	 return true;
	
}
 
  else {
	 return false;
				 
    }
   
   }
   
}
   
   
   /* function test_input */ 
   
   function test_input($data) {
  $data	 = 	trim($data);
  $data	 = 	stripslashes($data);
  $data	 = 	htmlspecialchars($data);
 
			  if($data!=''){
				  
			  }
			  return $data;
		
		}
   
   
    /*   insert client data  */
   
   function Addclient($conn)
   {
	
	
	
  if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	 
	  $client_name		=		ucwords($_POST['client_name']);
	  $email			=		$_POST['email'];
	  $phone_number		=		$_POST['phone_number'];
	  $date				=		$_POST['date'];
	  $Department		=		ucwords($_POST['department']);
	  $agency_name		=		ucwords($_POST['agency_name']);
	  
      	 
	 $query="INSERT INTO `client_detail`(`client_name`, `email`, `phone_number`, `date`, `department`, `agency_name`) 
	 VALUES ('$client_name','$email','$phone_number','$date','$Department','$agency_name')";
	
	 
	 $data=mysqli_query($conn,$query);
	
	
		if($data)
		{
		return true;
		
		}
 
	  else 
	  {
		 return false;
					 
		}
   
	}
   
	}

  /*   insert project data  */

  function Addproject($conn){
	
	
	
   if (isset($_POST['submit']))
   
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
	  
	  $file 			= 		$_FILES['file'];
      $file_name	 	= 		$_FILES['file']['name'];
      $file_size 		=		$_FILES['file']['size'];
      $file_tmp 		=		$_FILES['file']['tmp_name'];
      $file_type		=		$_FILES['file']['type'];
      $chkstr			=		implode(",",$file);
      $file_ext			=		strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
      
      
      move_uploaded_file($file_tmp,"file/".$file_name);
      	 
	 $query="INSERT INTO `add_project`(`client_name`, `project_title`, `date`, `up_work_id`, `hired_by_name`, 
	 `department`, `project_manager`, `team_leader`, `site_url`,`file`) 
	 VALUES ('$client_name','$project_title','$start_date','$up_work_id','$hired_by_name','$department',
	 '$project_manager','$team_leader','$site_url','$chkstr')";
	
	 
	 $data	=	mysqli_query($conn,$query);
	
	
		if($data)
		{
		return true;
		
		}
	 
	  else 
	  {
		 return false;
					 
		}
   
    }
   
	 }
   
/*  to delete  department */

  function deleteDepartment($conn){



		$id=$_GET['rn'];

		$query="DELETE FROM `department_detail` WHERE id='$id'";

		$data=mysqli_query($conn,$query);

		if($data)
		{
			echo '<script type="text/javascript"> alert("Data Deleted")</script>';
		
		}
		else 
		{
			echo '<script type="text/javascript"> alert("Not Deleted")</script>';	
		}

	}


/* to delete role   */

  function deleteRole($conn){



		$id=$_GET['nn'];

		$query="DELETE FROM `role_detail` WHERE id='$id'";

		$data=mysqli_query($conn,$query);

		if($data)
		{
			echo '<script type="text/javascript"> alert("Data Deleted")</script>';
			
			
		}
			else 
		{
				echo '<script type="text/javascript"> alert("Not Deleted")</script>';

		}
		
	}

/* to delete employee data   */

  function deleteEmployee($conn)
  {



		$id=$_GET['sn'];

		$query="DELETE FROM `employee_detail` WHERE id='$id'";

		$data=mysqli_query($conn,$query);

		if($data)
		{
			echo '<script type="text/javascript"> alert("Deleted")</script>';
				
			
		}
			else 
			{
				echo '<script type="text/javascript"> alert("Not Deleted")</script>';	
				}

		}



 /* to delete client data   */

	function deleteClient($conn)
	{



		$id=$_GET['cn'];

		$query="DELETE FROM `client_detail` WHERE id='$id'";

		$data=mysqli_query($conn,$query);

		if($data)
		{
			echo '<script type="text/javascript"> alert("Deleted")</script>';
				
			
		}
			else 
			{
				echo '<script type="text/javascript"> alert("Not Deleted")</script>';	
				
				}

	}

  /* to delete project data   */

 function deleteProject($conn){



	$id=$_GET['can'];

	$query="DELETE FROM `add_project` WHERE id='$id'";

	$data=mysqli_query($conn,$query);

	if($data)
	{
		echo '<script type="text/javascript"> alert("Deleted")</script>';
			
		
	}
		else {
			echo '<script type="text/javascript"> alert("Not Deleted")</script>';	
			}

	}

  /*To update role*/            

 function updateRole($conn,$data){
	
	$id=$data['id'];
	
	$role=ucwords($data['role']);
	
	 $query="UPDATE `role_detail` SET `role`='$role' WHERE id=$id";
	 
	 $result=mysqli_query($conn,$query);
	 
	if($data==1)
	{
	
	echo "<script>alert('RECORD Updated FROM DATABASE')</script>";
		
	}
	
	}
	
 

	/*To update department*/            

 function updateDepartment($conn,$data){
	
		$id=$data['id'];
		
		$department=ucwords($data['department']);
		
		 $query="UPDATE `department_detail` SET `department`='$department' WHERE id=$id";
		 
		 $result=mysqli_query($conn,$query);
	 
	if($data==1)
	{
		echo '<script type="text/javascript"> alert("Updated")</script>';
		}
		
	else
	{
			 '<script type="text/javascript"> alert("Fail To Updated")</script>';
		}

	}


	
	  /*TO update Employee data*/
  
  function updateEmployee($conn,$data)
   {
			 $id		=	$data['id'];
			 
			//$department=ucwords($data['department']);
			$name		=	$data['name'];			  
			$email		=	$data['email'];	
			$birthday	=	$data['birhday'];		  
			$mobile		=	$data['mobile'];			  
			$fname		=	$data['fname'];			  
			$fmobile	=	$data['fmobile'];			  			  
			$address	=	$data['address'];			  
			$department =	$data['department'];			  
			$role		=	$data['role'];	
	
		 $query="UPDATE `employee_detail` SET `name`='$name',`email`='$email',`birhday`='$birthday',`mobile`='$mobile',
		 `fname`='$fname',`fmobile`='$mobile',`address`='$address',`department`='$department',`role`='$role' WHERE id=$id";
		 
		 $result=mysqli_query($conn,$query);
		 
		if($data==1)
	
		{
			echo '<script type="text/javascript"> alert("Updated")</script>';
			}
		else{
				 '<script type="text/javascript"> alert("Fail To Updated")</script>';
			}
	
	
	}
	 
	
	
  /*TO update Client data*/
  
	function updateClient($conn,$data)
 {
	 
	  $id				=		$data['id'];
	  $client_name		=		ucwords($data['client_name']);
	  $email			=		$data['email'];
	  $phone_number		=		$data['phone_number'];
	  $date				=		$data['date'];
	  $Department		=		ucwords($data['department']);
	  $agency_name		=		ucwords($data['agency_name']);
	
 	 $query="UPDATE `client_detail` SET`client_name`='$client_name',`email`='$email',`phone_number`='$phone_number',`date`='$date',
	 `department`='$Department',`agency_name`='$agency_name' WHERE id=$id";
	 
	 $result=mysqli_query($conn,$query);
	 
	if($data==1)
	
	{  return true;
		//echo '<script type="text/javascript"> alert("Updated")</script>';
		}
	else{
			  return false;
		  }
	
	
}
//		/////			///* validation */////					///			//
	 

 function validate_emp($conn){
	
	$error=[];
	
	if(empty($_POST["name"]))
	{
	$error[]="Name is required";
	}
	else
	{
	$name = test_input($_POST["name"]);
	if(!preg_match("/^[a-zA-z ]*$/",$name))
	{
		$error[]="only letters are allowed";
	}
  }
			
			
			
	if(empty($_POST["fname"]))
	{
	$error[]="father name is required";
	}
	else
	{
		$fname = test_input($_POST["fname"]);
		if(!preg_match("/^[a-zA-z ]*$/",$fname))
		{
			$error[]="only letters are allowed";
			}
		
	 }
		

		  
	if (empty($_POST["email"])) {
	 $error[] = "email is required";  
	     
	}
	elseif($query="SELECT * FROM  employee_detail WHERE email='".$_POST["email"]."'")
	{
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)>0)
		{
			$error[]='email is used';
		}
		else
		{
			$email = test_input($_POST['email']);
			 if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
			 {
				 $error[]='Invalid email';
					 }
				}
	 }
	

     
	  if (empty($_POST["password"]))
	  {
	  $error[] = "password is required";
	  } 
	  else 
	  {
		  $password = test_input($_POST["password"]);
		  
	  }
		 

     
      if (empty($_POST["birhday"])) 
      {
      $error[] = "birthday date is required";
      } 
      else 
      {
	  $birthday = test_input($_POST["birhday"]);
	  
      }
     

	  if (empty($_POST["address"]))
	  {
	  $error[] = "address is required";
	   } else
	   {
		  $address = test_input($_POST["address"]);  
	   }
	  
     
	  if (empty($_POST["department"])) 
	  {
	  $error[] = "department  is required";
	  } 
	  else 
	  {
		  $department = test_input($_POST["department"]);
		  
	  }

  
	   if (empty($_POST["role"])) 
	   {
		$error[] = "role is required";
	   } 
	   else 
	   {
		  $role = test_input($_POST["role"]);
		  
	   }
     
 
	 
	
        if (empty($_POST["mobile"]))
        {
		$error[] = "phone is required";
		} elseif(strlen($_POST["mobile"])<10)
		{
		$error[] = "invalide phone number";
		}
		else 
		{
		$phone = test_input($_POST["mobile"]);
		}
		
	

		if (empty($_POST["fmobile"])) 
		{
		$error[] = "father phone is required";
		} elseif(strlen($_POST["fmobile"])<10)
		{
		$error[] = "invalide phone number";
		}
		else
	    {
		$phone = test_input($_POST["fmobile"]);
		}
		

	
		return $error;
		
	   } 


////VALIDATE PROJECT/////

 function validateProject($conn) {

		 if ($_SERVER["REQUEST_METHOD"] == "POST")
	  {
		  
		 
		  $client_name  =  ucwords($_POST['client_name']);
			
		  $error=[];
		$expensions= array("jpeg","jpg","png","js");
      // $file = $_FILES['file'];
      //$file_name = $_FILES['file']['name'];
      
      //$chkstr=implode(",",$file);
      
      //$file_ext=strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
      
       if (empty($_FILES["file"]["name"])) 
		{
		$error[] = "file  is required";
		} 
		 
		
		elseif(in_array(strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION)),$expensions)=== false){
         $error[]="extension not allowed, please choose a JPEG or PNG file";
      }
		elseif($_FILES['file']['size'] > 2097152){
         $error[]='File size must be excately 2 MB';
      }
		  
     //$expensions= array("jpeg","jpg","png","js","zip");
      
      //~ if(in_array(strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION)),$expensions)=== false){
         //~ $error[]="extension not allowed, please choose a JPEG or PNG file";
      //~ }
      	
      
      //~ if($_FILES['file']['size'] > 2097152){
         //~ $error[]='File size must be excately 2 MB';
      //~ }
     	
 
      //~ if (empty($_FILES["file"]["name"])) 
		//~ {
		//~ $error[] = "file  is required";
		//~ } 
		//~ else 
		//~ {
		
		//~ }
 
     
	   if (empty($_POST["date"]))
	   {
	   $error[] = " date is required";
	   }
	   else 
	   {
	   $date = test_input($_POST["date"]);
	  
	   }
     
     
     
       
     
		if (empty($_POST["department"])) 
		{
		$error[] = "department  is required";
		} 
		else 
		{
		$department = test_input($_POST["department"]);
		  
		}
  
       if (empty($_POST["project_title"])) 
       {
       $error[] = "project_title  is required";
       } 
       else
      {
	  $project_title = test_input($_POST["project_title"]);
	  
      }
  
	  if (empty($_POST["up_work_id"])) 
	  {
	  $error[] = "up_work_id  is required";
	  } 
	  else
	  {
	   $up_work_id = test_input($_POST["up_work_id"]);
	  
	  }
     
  
      if (empty($_POST["hired_by_name"])) 
      {
      $error[] = "hired_by_name  is required";
      } 
      else 
      {
	  $hired_by_name = test_input($_POST["hired_by_name"]);
	  
      }
  
      if (empty($_POST["project_manager"])) 
      {
      $error[] = "project_manager  is required";
      } 
      else 
      {
	  $project_manager = test_input($_POST["project_manager"]);
	  
      }
  
      if (empty($_POST["team_leader"])) 
      {
     $error[] = "team_leader  is required";
     } 
     else 
     {
	  $team_leader = test_input($_POST["team_leader"]);
	  
     }
  
      if (empty($_POST["site_url"])) 
      {
    $error[] = "site_url  is required";
     } 
     else 
     {
	  $site_url = test_input($_POST["site_url"]);
	  
     }
  
  
     if (empty($_POST["client_name"])) 
     {
		$error[] = "Name is required";
	}
	 else 
	 {
	$client_name = test_input($_POST["client_name"]);

	// check if name only contains letters and whitespace  !preg_match("/^[a-zA-Z ]*$/"
	if (!preg_match("/^[a-zA-Z ]*$/",$client_name))
	 {
	$error[] = "Only letters are allowed in your name";
	}
	}
	
	if (preg_match("/^[a-zA-Z ]*$/",$client_name))
	 {

	  
	} 			

	}

     return $error;

      }   
            
 ?>




