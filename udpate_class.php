<?php
	require "connection.php";

	header('Content-type: application/json');

	$id=$_POST['id'];
	$name = $_POST['name'];

	$query = "UPDATE `lop` SET `name`='".$name."' WHERE `id_class`= '".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){
		$data = [ 'status' => '1', 'message' => 'Update nghành thành công!!!' ];
	}else{
		$data = [ 'status' => '2', 'message' => 'update nghành không thành công!!' ];
	}
	echo json_encode($data);

?>