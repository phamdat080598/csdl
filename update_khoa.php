<?php
	require "connection.php";

	header('Content-type: application/json');

	$id=$_POST['id'];
	$name = $_POST['name'];
	$id_user = $_POST['id_user'];

	$query1="SELECT * from taikhoan where id_user ='".$id_user."' and possion='1'";
	$result1 = mysqli_query($connect,$query1);
	if(mysqli_num_rows($result1)==1){
		$query = "UPDATE `khoa` SET `name`='".$name."',`id_user` = '".$id_user."' WHERE `id_department`= '".$id."'";
		$result = mysqli_query($connect,$query);
		if($result){
			$data = [ 'status' => '1', 'message' => 'Update khoa thành công!!!' ];
		}else{
			$data = [ 'status' => '2', 'message' => 'update khoa không thành công!!' ];
		}
	}else{
		$data = [ 'status' => '2', 'message' => 'Mã giảng viên không tồn tại!!' ];
	}

	echo json_encode($data);

?>