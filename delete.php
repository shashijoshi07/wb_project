<?php

include('function.php');

if($departmentid=$_GET['rn']){
$deleteDepartment= deleteDepartment($conn);
header('location:view_department.php');
}

elseif($roleid=$_GET['nn']){
$deleteRole= deleteRole($conn);
header('location:view_role.php');
}

elseif( $id  = $_GET['sn']){
$deleteEmployee= deleteEmployee($conn);
header('location:view_employee.php');
}

elseif( $id  = $_GET['cn']){
$deleteClient= deleteClient($conn);
header('location:view_client.php');
}
elseif( $id  = $_GET['can']){
$deleteProject= deleteProject($conn);
header('location:view_project.php');
}
?>
