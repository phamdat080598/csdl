<?php
	require "connection.php";

	header('Content-type: application/json');

	$id_depart = $_POST['id'];
	$query = "DELETE FROM `khoa` WHERE id_department = '".$id_depart."'";
	$result = mysqli_query($connect,$query);
	if($result){
		$data = [ 'status' => '1', 'message' => 'Xóa khoa thành công!!!' ];
	}else{
		$data = [ 'status' => '2', 'message' => 'Xóa khoa không thành công!!' ];
	}

	echo json_encode($data);

?>