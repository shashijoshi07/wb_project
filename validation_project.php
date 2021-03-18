<?php

 //include('function.php');


$client_nameErr = $Up_Work_IdErr = $phone_numberErr = $hired_byErr = $dateErr = $departmentErr =
 $project_managerErr = $team_leaderErr = $site_urlErr = $project_titleErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
	  
	  //$email		=	$_POST['email'];
	  $client_name  =  ucwords($_POST['client_name']);
		
	  $error=[];
      
		  
     
     
 
     
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
  
  if (empty($_POST["project_title"])) {
    $error[] = "project_title  is required";
  } else {
	  $project_title = test_input($_POST["project_title"]);
	  
  }
  
    if (empty($_POST["up_work_id"])) {
    $error[] = "up_work_id  is required";
  } else {
	  $up_work_id = test_input($_POST["up_work_id"]);
	  
  }
  
    if (empty($_POST["hired_by_name"])) {
    $error[] = "hired_by_name  is required";
  } else {
	  $hired_by_name = test_input($_POST["hired_by_name"]);
	  
  }
  
      if (empty($_POST["project_manager"])) {
    $error[] = "project_manager  is required";
  } else {
	  $project_manager = test_input($_POST["project_manager"]);
	  
  }
  
      if (empty($_POST["team_leader"])) {
    $error[] = "team_leader  is required";
  } else {
	  $team_leader = test_input($_POST["team_leader"]);
	  
  }
  
      if (empty($_POST["site_url"])) {
    $error[] = "site_url  is required";
  } else {
	  $site_url = test_input($_POST["site_url"]);
	  
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
	
 
		
		
		//~ if(sizeof($error)<=0){
		  //~ if(Addproject($conn)){
			  //~ echo '<script type="text/javascript"> alert ("Data Inserted sucessfully")</script>';
			  //~ }else{
				  //~ $error[]='Error';
				  //~ }
			  //~ }
			  
} 			

}


?>
