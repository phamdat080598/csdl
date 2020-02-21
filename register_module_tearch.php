<?php
	require "connection.php";

	header('Content-type: application/json');

	$id_module = $_POST['id_module'];
	$id_user = $_POST['id_user'];


	$query = "UPDATE `hocphan` SET `id_user`='".$id_user."' WHERE id_module = '".$id_module."'";
	$result = mysqli_query($connect,$query);
	if ($result) {
		$data = [ 'status' => '1', 'message' => "Đăng ký giảng dạy thành công"];
	}else{
		$data = [ 'status' => '2', 'message' => 'Đăng ký giảng dạy không thành công' ];
	}

	echo json_encode($data);

?>