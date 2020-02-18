<?php
	require "connection.php";

	$id = $_POST["id"];
	class User{
		function User($id,$name,$id_specialized,$id_user){
			$this->id=$id;
			$this->name=$name;
			$this->id_specialized =$id_specialized;
			$this->id_user=$id_user;
		}
	}

	$query1 = "select *from lop where id_class = '".$id."'";
	$result1 = mysqli_query($connect,$query1);
	if($result1){
		$row1 = mysqli_fetch_assoc($result1);
		$id_spec=$row1['id_specialized'];
		$mang =array();
		$query="select * from lop where id_specialized='".$id_spec."'";
		$result = mysqli_query($connect,$query);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				array_push($mang, new User($row['id_class'],$row['name'],$row['id_specialized'],$row['id_user']));
			}
			if(count($mang)>0){
				echo json_encode($mang);
			}else{
				echo "null";
			}
	
		}else{
			echo "error";
		}
	}	

?>