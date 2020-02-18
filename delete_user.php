<?php
	require "connection.php";

	header('Content-type: application/json');

	$id=$_POST['id'];
	$image=$_POST['image'];
	$query = "DELETE FROM `taikhoan` WHERE `id_user` = '".$id."'";

	$result = mysqli_query($connect,$query);
	if($result){
		unlink("images".$image);
		$data = [ 'status' => '1', 'message' => 'delete thành công!!!' ];
	}else{
		$data = [ 'status' => '0', 'message' => 'delete không thành công!!!' ];
	}

	echo json_encode($data);

?>