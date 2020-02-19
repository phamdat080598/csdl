<?php
	require "connection.php";

	header('Content-type: application/json');

	$id_department = $_POST['id'];
	$name = $_POST['name'];
	$credits = $_POST['credits'];

	$mang =array();
	$query="INSERT INTO `monhoc`(`name`, `credits`) VALUES ('".$name."','".$credits."')";
	$result = mysqli_query($connect,$query);
	if($result){
		$last_id = mysqli_insert_id($connect);
		$query="INSERT INTO `khungdaotao`(`id_department`, `id_subject`) VALUES ('".$id_department."','".$last_id."')";
		$result = mysqli_query($connect,$query);
		if($result){
			$data = [ 'status' => '1', 'message' => 'Thêm môn học thành công!!!' ];
		}else{
			$data = [ 'status' => '2', 'message' => 'Thêm môn học không thành công!!' ];
		}
	}else{
		$data = [ 'status' => '2', 'message' => 'Thêm môn học không thành công!!' ];
	}
	echo json_encode( $data );

?>