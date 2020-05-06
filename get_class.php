<?php
	require "connection.php";

	class User{
		function User($id,$name,$id_specialized){
			$this->id=$id;
			$this->name=$name;
			$this->id_specialized=$id_specialized;
		}
	}
	$id_spec=$_POST["id"];
	$mang =array();
	$query="select * from lop where id_specialized='".$id_spec."'";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_class'],$row['name'],$row['id_specialized']));
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