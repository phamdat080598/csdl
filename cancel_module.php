<?php
	require "connection.php";

	header('Content-type: application/json');

	$position = $_POST['position'];
	$id_module = $_POST['id_module'];
	$id_user = $_POST['id_user'];
	if($position=='1'){
		$query = "UPDATE `hocphan` SET `id_user`= null WHERE id_module = '".$id_module."'";
		$result = mysqli_query($connect,$query);
		if ($result) {
			$data = [ 'status' => '1', 'message' => "Hủy học phần thành công!!!"];
		}else{
			$data = [ 'status' => '2', 'message' => 'Hủy học phần không thành công!!!' ];
		}
	}else{
			$query = "DELETE FROM `chitiethocphan` WHERE id_user = '".$id_user."' and id_module = '".$id_module."'";
			$result =  mysqli_query($connect,$query);
			if ($result) {
				$query1 ="SELECT quantity_registed,quantity FROM `hocphan` WHERE id_module = '".$id_module."'";
				$result1 = mysqli_query($connect,$query1);
				$row1 = mysqli_fetch_assoc($result1);
				$count = $row1['quantity_registed'] -1;
				if($count<0){
					$data = [ 'status' => '3', 'message' => 'Học phần này đã đầy số lượng' ];
				}else{
					$query = "UPDATE `hocphan` SET quantity_registed = '".$count."' WHERE id_module = '".$id_module."'";
					$result1 =  mysqli_query($connect,$query);
					if($result1){
						$data = [ 'status' => '1', 'message' => "Hủy học phần thành công!!!"];
					}else{
						$data = [ 'status' => '2', 'message' => "Hủy học phần không thành công!!!"];
					}
				}
			}else{
				$data = [ 'status' => '2', 'message' => 'Hủy học phần không thành công!!!'];
			}
	}
	echo json_encode($data);

?>