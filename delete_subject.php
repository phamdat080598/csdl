<?php
	require "connection.php";

	header('Content-type: application/json');

	$id_subject = $_POST['id'];

	$query = "SELECT * FROM `hocphan` WHERE id_module = '".$id_subject."'";
	$result = mysqli_query($connect,$query);
	if (mysqli_num_rows($result)==0) { 
		$query = "DELETE FROM `khungdaotao` WHERE id_subject = '".$id_subject."'";
		$result = mysqli_query($connect,$query);
		if($result){
			$query = "DELETE FROM `monhoc` WHERE id_subject = '".$id_subject."'";
			$result = mysqli_query($connect,$query);
			if($result){
				$data = [ 'status' => '1', 'message' => 'Xóa môn học thành công!!!' ];
			}else{
				$data = [ 'status' => '2', 'message' => 'Xóa môn học không thành công!!' ];
			}
		}else{
				$data = [ 'status' => '2', 'message' => 'Xóa môn học không thành công!!' ];
			}
	}else{
		$data = [ 'status' => '3', 'message' => 'Môn học này không thể xóa vì đã được đăng ký học phần!!' ];
	}

	echo json_encode($data);

?>