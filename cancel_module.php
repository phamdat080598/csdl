<?php
	require "connection.php";

	header('Content-type: application/json');

	$position = $_POST['position'];
	$id_module = $_POST['id_module'];
	$id_user = $_POST['id_user'];
	if($position=='1'){
		$query = "UPDATE `hocphan` SET `id_user`= null WHERE id_module = '".$id_module."'";
		$result = mysqli_query($connect,$query);
		if ($result) {
			$data = [ 'status' => '1', 'message' => "Hủy học phần thành công!!!"];
		}else{
			$data = [ 'status' => '2', 'message' => 'Hủy học phần không thành công!!!' ];
		}
	}else{
		$query = "DELETE FROM `chitiethocphan` WHERE id_user = '".$id_user."' and id_module = '".$id_module."'";
		$result =  mysqli_query($connect,$query);
		if ($result) {
			$data = [ 'status' => '1', 'message' => "Hủy giảng dạy thành công!!!"];
		}else{
			$data = [ 'status' => '2', 'message' => 'Hủy giảng dạy không thành công!!!'];
		}
	}
	echo json_encode($data);

?>