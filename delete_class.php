<?php
	require "connection.php";

	header('Content-type: application/json');

	$id = $_POST['id'];
	$query = "DELETE FROM `lop` WHERE id_class = '".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){
		$data = [ 'status' => '1', 'message' => 'Xóa lớp thành công!!!' ];
	}else{
		$data = [ 'status' => '2', 'message' => 'Xóa lớp không thành công!!' ];
	}

	echo json_encode($data);

?>