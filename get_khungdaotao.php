<?php
	require "connection.php";

	header('Content-type: application/json');

	$id = $_POST["id"];
	
	class User{
		function User($id,$name,$credits,$id_department){
			$this->id=$id;
			$this->name=$name;
			$this->credits =$credits;
			$this->id_department = $id_department;
		}
	}
	$mang =array();
	$query="select monhoc.id_subject,name,credits,id_department from khungdaotao inner join monhoc on khungdaotao.id_subject=monhoc.id_subject where id_department='".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_subject'],$row['name'],$row['credits'],$row['id_department']));
		}
		if(count($mang)>0){
			$data = [ 'status' => '1', 'data' => $mang];
		}else{
			$data = [ 'status' => '0', 'message' => $mang];
		}
	
	}else{
		echo "error";
	}
	echo json_encode($data);
	

?>