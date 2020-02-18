<?php
	require "connection.php";

	class User{
		function User($id,$name){
			$this->id=$id;
			$this->name=$name;
			
		}
	}
	$mang =array();
	$query="select * from khoa";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_department'],$row['name']));
		}
		if(count($mang)>0){
			echo json_encode($mang);
		}else{
			echo "error";
		}
	
	}else{
		echo "null";
	}
	

?>