<?php
	require "connection.php";

	header('Content-type: application/json');

	$id_subject = $_POST['id'];
	$name = $_POST['name'];
	$credits = $_POST['credits'];

	$query = "SELECT * FROM `hocphan` WHERE id_subject = '".$id_subject."'";
	$result = mysqli_query($connect,$query);
	if (mysqli_num_rows($result)==0) { 
			$query = "UPDATE `monhoc` SET `name`='".$name."',`credits` = '".$credits."' WHERE `id_subject`= '".$id_subject."'";
			$result = mysqli_query($connect,$query);
			if($result){
				$data = [ 'status' => '1', 'message' => 'Update môn học thành công!!!' ];
			}else{
				$data = [ 'status' => '2', 'message' => 'update môn học không thành công!!' ];
			}
			
	}else{
		$data = [ 'status' => '3', 'message' => 'Môn học này không thể update vì đã được đăng ký học phần!!' ];
	}

	echo json_encode($data);

?>