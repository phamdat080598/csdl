<?php
	require "connection.php";

	header('Content-type: application/json');


	$name = $_POST['name'];
	$id = $_POST['id'];

	$mang =array();
	$query1="SELECT * from nghanh where id_specialized ='".$id."'";
	$result1 = mysqli_query($connect,$query1);
	if(mysqli_num_rows($result1)==1){
		$query="INSERT INTO `lop`(`name`,`id_specialized`) VALUES ('".$name."','".$id."')";
		$result = mysqli_query($connect,$query);
		if($result){
			$data = [ 'status' => '1', 'message' => 'Thêm class thành công!!!' ];
		}else{
			$data = [ 'status' => '2', 'message' => 'Thêm class không thành công!!' ];
		}
	}else{
		$data = [ 'status' => '2', 'message' => 'Mã nghành không tồn tại!!' ];
	}
	echo json_encode( $data );

?>