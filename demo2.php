<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
      $errors=[];
      
       // Count total uploaded files
 $totalfiles = count($_FILES['file']['name']);

 // Looping over all files
 for($i=0;$i<$totalfiles;$i++){
 //~ $filename = $_FILES['file']['name'][$i];
      $file = $_FILES['file'];
      $file_name = $_FILES['file']['name'][$i];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $file_ext=strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
      //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      //$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      
      $expensions= array("jpeg","jpg","png","js");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
		  
		   $query="INSERT INTO `student_s` (`file`) VALUES('$file')";
      $result=mysqli_query($conn,$query);
      if($result)
      {
		  echo "registered";
		  }
		 
         move_uploaded_file($file_tmp,"file/".$file_name);
        // echo "Success";
      }
      else
      {
         print_r($errors);
         echo "<br>";
         echo "not";
      }
      
      //~ $query="INSERT INTO `student_s` (`file`) VALUES('$file')";
      //~ $result=mysqli_query($conn,$query);
      //~ if($result)
      //~ {
		  //~ echo "registered";
		  //~ }
		  //~ else
		  //~ {
			  //~ echo "not";
		  //~ }
   }}
   ?>
   NEXT CODE
   
   -------CODE-----
   <?php
      if(isset($_POST['submit'])){
	$file = $_FILES['file']['name'];
	$chkstr=implode(",",$file);
 // Count total uploaded files
 $totalfiles = count($_FILES['file']['name']);

 // Looping over all files
 for($i=0;$i<$totalfiles;$i++){
 $filename = $_FILES['file']['name'][$i];
 
// Upload files and store in database
if(move_uploaded_file($_FILES["file"]["tmp_name"][$i],'file/'.$filename))
{
		// Image db insert sql
		$insert = "INSERT INTO `student_s`(`file`) VALUES('$chkstr')";
		if(mysqli_query($conn, $insert)){
		  echo 'Data inserted successfully';
		}
		else
		{
		  echo 'Error: '.mysqli_error($conn);
		}
	}
	else
	{
		echo 'Error in uploading file - '.$_FILES['file']['name'][$i].'<br/>';
	}
 
 }
} 
