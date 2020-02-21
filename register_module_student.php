<?php
	require "connection.php";

	header('Content-type: application/json');

	$id_module = $_POST['id_module'];
	$id_user = $_POST['id_user'];
	$date_register = $_POST['date_register'];

	$query = "INSERT INTO `chitiethocphan`(`id_user`, `id_module`, `date_register`) VALUES ('".$id_user."','".$id_module."','"$date_register"')";
	$result = mysqli_query($connect,$query);
	if ($result) {
		$data = [ 'status' => '1', 'message' => "Đăng ký học phần thành công!!!"];
	}else{
		$data = [ 'status' => '2', 'message' => 'Đăng ký học phần không thành công!!!' ];
	}

	echo json_encode($data);

?>