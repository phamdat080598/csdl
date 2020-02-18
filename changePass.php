<?php
	require "connection.php";

	header('Content-type: application/json');

	$id = $_POST["id"];
	$password = $_POST["password"];

	$query = "UPDATE `taikhoan` SET `password`='".$password."' where `id_user`='".$id."'" ;

	$result = mysqli_query($connect,$query);
	if($result){
		$data = [ 'status' => '1', 'message' => 'Đổi mật khẩu thành công!!!' ];
	}else{
		$data = [ 'status' => '0', 'message' => 'Đổi mật khẩu không thành công!!!!' ];
	}

	echo json_encode($data);

?>