<?php
	require "connection.php";

	$id = $_POST["id"];
	class User{
		function User($id,$name,$id_department){
			$this->id=$id;
			$this->name=$name;
			$this->id_department =$id_department;
		}
	}
	$mang =array();
	$query="select * from nghanh where id_department='".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_specialized'],$row['name'],$row['id_department']));
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