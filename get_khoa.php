<?php
	require "connection.php";

	class User{
		function User($id_department,$name,$id_user){
			$this->id_department=$id_department;
			$this->name=$name;
			$this->id_user=$id_user;
		}
	}
	$mang =array();
	$query="select * from khoa";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_department'],$row['name'],$row['id_user']));
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