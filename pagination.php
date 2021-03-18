<?php
 
   include('function.php');
   
   //$countEmployee= countEmployee($conn);
 


	 
		$records_per_page= 7;
		//$employee=employee_count($conn);
		
		 $query="SELECT * FROM employee_detail";
		 $result=mysqli_query($conn,$query);	
		 $data=mysqli_num_rows($result);
		
		$total_page=ceil($data/$records_per_page);


		//~ if(isset($_GET['page']) && $_GET['page']!=1)
		//~ {
			//~ $start_page_no=($_GET['page']-1)*$records_per_page;
			
		//~ }
			//~ else
			//~ {
			//~ $start_page_no=0;	
			
			//~ }
			
			
		
	//~ if (!isset ($_GET['page']) ) {  
        //~ $page = 1;  
    //~ } else {  
        //~ $page = $_GET['page'];  
    //~ }  
		
		
		if (isset ($_GET['page']))
		{
			$page =$_GET['page'];
			}else{
				$page=1;
				}
		
		
		
		$start_page=($page-1)*$records_per_page;
		
		
		
		//~ print_r($start_page);
		//~ exit();
		
		//~ $sql="SELECT * FROM employee_detail LIMIT $records_per_page OFFSET $start_page";
		//~ $result=mysqli_query($conn,$sql);
       // $records=mysqli_fetch_assoc($result);



		//~ $sql="SELECT * FROM employee_detail LIMIT $records_per_page OFFSET $start_page_no";
		//~ $result=mysqli_query($conn,$sql);
        //~ $records=mysqli_fetch_assoc($result);




?>
