<?php
	require "connection.php";

	header('Content-type: application/json');

	$id_subject = $_POST['id_subject'];
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$quantily = $_POST['quantily'];


	$query = "INSERT INTO `hocphan`(`id_subject`, `id_user`, `date_register`, `date_start`, `date_end`, `quantity`) VALUES ('".$id_subject."',null,'".date("Y/m/d")."','".$date_start."','".$date_end."','".$quantily."')";
	$result = mysqli_query($connect,$query);
	if ($result) {
		$last_id = mysqli_insert_id($connect);
		$data = [ 'status' => '1', 'id_module' => $last_id];

	}else{
		$data = [ 'status' => '2', 'message' => 'Tạo học phần không thành công!!' ];
	}

	echo json_encode($data);

?>