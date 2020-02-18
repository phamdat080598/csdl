<?php
	require "connection.php";

	class User{
		function User($id,$name,$time_start,$time_end){
			$this->id=$id;
			$this->name=$name;
			$this->time_start =$time_start;
			$this->time_end = $time_end;
		}
	}
	$mang =array();
	$query="select * from tiethoc";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_lesson'],$row['name'],$row['time_start'],$row['time_end']));
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