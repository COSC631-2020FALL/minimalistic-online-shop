<?php

	$servername ="localhost";
	$username="root";
	$password="";
	$dbname="eStore";

	//create connection
	$conn = mysqli_connect($servername,$username,$password,$dbname);

	if(!$conn){
		die("Connection failed: ").mysqli_connect_error();
	} 

function getTypeOfItems(){
	global $conn;
	
		$get_types = "select * from product";
		$run_types = mysqli_query($conn,$get_types);
		
		while($row_types = mysqli_fetch_array($run_types)){
			
			$type_id = $row_types['type_id'];
			$type_title = $row_types['type_title'];
			
			echo "<li><a href='index.php?type=$type_id'>$type_title</a></li>";
		}
	
}

?>






