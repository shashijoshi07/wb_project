<?php

 $conn=mysqli_connect('localhost','root','');
 mysqli_select_db($conn,'project');

   //~ if(isset($_POST['submit'])){
	//~ $file = $_FILES['file']['name'];
	//~ $chkstr=implode(",",$file);
	//~ $errors=[];
	
if($_SERVER["REQUEST_METHOD"] == "POST"){
      $errors=[];
      
       // Count total uploaded files
 //$totalfiles = count($_FILES['file']['name']);

 
 
 //~ $filename = $_FILES['file']['name'][$i];
      $file = $_FILES['file'];
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $chkstr=implode(",",$file);
      $file_ext=strtolower(pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION));
   
      
      $expensions= array("jpeg","jpg","png","js");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
		  
		   $query="INSERT INTO `student_s` (`file`) VALUES('$chkstr')";
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
      
   }
?>




<html>
   <body>
      
      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="file" value="file" multiple />
         <input type="submit" name="submit"/>
      </form>
      
   </body>
</html>
<?php 




?>
