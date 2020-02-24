<?php
	require "connection.php";

	header('Content-type: application/json');

	$id = $_POST['id_module'];

	$query = "UPDATE `hocphan` SET `status`= 1 WHERE id_module='".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){
		$data = [ 'status' => '1', 'message' => 'Kết thúc đăng kí học phần thành công!!!' ];
	}else{
		$data = [ 'status' => '2', 'message' => 'Kết thúc đăng kí học phần không thành công!!' ];
	}

	echo json_encode($data);

?>