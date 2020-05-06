<?php
	require "connection.php";

	header('Content-type: application/json');


	$name = $_POST['name'];
	$id_user = $_POST['id_user'];

	$mang =array();
	$query1="SELECT * from taikhoan where id_user ='".$id_user."' and possion='1'";
	$result1 = mysqli_query($connect,$query1);
	if(mysqli_num_rows($result1)==1){
		$query="INSERT INTO `khoa`(`name`,`id_user`) VALUES ('".$name."','".$id_user."')";
		$result = mysqli_query($connect,$query);
		if($result){
			$data = [ 'status' => '1', 'message' => 'Thêm khoa thành công!!!' ];
		}else{
			$data = [ 'status' => '2', 'message' => 'Thêm khoa không thành công!!' ];
		}
	}else{
		$data = [ 'status' => '2', 'message' => 'Giảng viên không tồn tại!!' ];
	}
	echo json_encode( $data );

?>