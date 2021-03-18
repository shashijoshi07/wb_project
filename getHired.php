
<?php
 include "lib.php";
 


$departid = $_POST['depart'];
  


 $users_arr = array();
 
 
	$sql = "SELECT id,name FROM employee_detail  WHERE `department`='".$_POST['depart']."'";

    $result = mysqli_query($conn,$sql);
    
    while( $row = mysqli_fetch_array($result) ){
        $userid = $row['id'];
        $name = $row['name'];
    
        $users_arr[] = array("id" => $userid, "name" => $name);
    }

// encoding array to json format
echo json_encode($users_arr);
?>

