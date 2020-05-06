<?php
	require "connection.php";

	header('Content-type: application/json');


	$name = $_POST['name'];
	$id = $_POST['id'];

	$mang =array();
	$query1="SELECT * from khoa where id_department ='".$id."'";
	$result1 = mysqli_query($connect,$query1);
	if(mysqli_num_rows($result1)==1){
		$query="INSERT INTO `nghanh`(`name`,`id_department`) VALUES ('".$name."','".$id."')";
		$result = mysqli_query($connect,$query);
		if($result){
			$data = [ 'status' => '1', 'message' => 'Thêm nghành thành công!!!' ];
		}else{
			$data = [ 'status' => '2', 'message' => 'Thêm nghành không thành công!!' ];
		}
	}else{
		$data = [ 'status' => '2', 'message' => 'Mã khoa không tồn tại!!' ];
	}
	echo json_encode( $data );

?>