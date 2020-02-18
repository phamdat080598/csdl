<?php
	require "connection.php";

	class User{
		function User($id,$name,$credits){
			$this->id=$id;
			$this->name=$name;
			$this->credits =$credits;
		}
	}
	$mang =array();
	$query="select * from monhoc";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_subject'],$row['name'],$row['credits']));
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