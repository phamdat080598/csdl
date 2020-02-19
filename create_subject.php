<?php
	require "connection.php";

	$name = $_POST['name'];
	$credits = $_POST['credits'];

	class User{
		function User($id,$name,$credits){
			$this->id=$id;
			$this->name=$name;
			$this->credits =$credits;
		}
	}
	$mang =array();
	$query="INSERT INTO `monhoc`(`name`, `credits`) VALUES (".$name.",".$credits.")";
	$result = mysqli_query($connect,$query);
	if($result){
		$data = [ 'status' => 'Thêm môn học thành công', 'user' => $id ];
		header('Content-type: application/json');
		echo json_encode( $data );
	}else{
		$data = [ 'status' => 'Thêm môn học thành công', 'user' => $id ];
	}
	

?>