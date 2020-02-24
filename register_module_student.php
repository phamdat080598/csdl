<?php
	require "connection.php";

	header('Content-type: application/json');

	$position = $_POST['position'];
	$id_module = $_POST['id_module'];
	$id_user = $_POST['id_user'];
	$today = date("d/m/Y");
	if($position=='2'){
		$query = "INSERT INTO `chitiethocphan`(`id_user`, `id_module`, `date_register`) VALUES ('".$id_user."','".$id_module."','".$today."')";
		$result = mysqli_query($connect,$query);
		if ($result) {
			$query1 ="SELECT quantity_registed,quantity FROM `hocphan` WHERE id_module = '".$id_module."'";
			$result1 =  mysqli_query($connect,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			$count = $row1['quantity_registed'] + 1;
			$quantity = $row1['quantity'];
			echo $count;
			if($count>$quantity){
				$data = [ 'status' => '3', 'message' => 'Học phần này đã đầy số lượng' ];
			}
			else{
				$query = "UPDATE `hocphan` SET quantity_registed = '".$count."' WHERE id_module = '".$id_module."'";
				$result1 =  mysqli_query($connect,$query1);
				if($result1){
					$data = [ 'status' => '1', 'message' => "Đăng ký học phần thành công!!!"];
				}else{
					$data = [ 'status' => '2', 'message' => "Đăng ký học phần không thành công!!!"];
				}
			}
		}else{
			$data = [ 'status' => '2', 'message' => 'Đăng ký học phần không thành công!!!' ];
		}
	}else{
		$query = "select * from hocphan WHERE id_user= '".$id_user."' and id_module = '".$id_module."'";
		$result =  mysqli_query($connect,$query);
		if(mysqli_num_rows($result)==0){
			$query1 = "UPDATE `hocphan` SET `id_user`='".$id_user."' WHERE id_module = '".$id_module."'";
			$result1 = mysqli_query($connect,$query1);
			if ($result1) {
				$data = [ 'status' => '1', 'message' => "Đăng ký giảng dạy thành công"];
			}else{
				$data = [ 'status' => '2', 'message' => 'Đăng ký giảng dạy không thành công' ];
			}
		}else{
			$data = [ 'status' => '3', 'message' => 'Học phần này đã có người đăng ký' ];
		}
	}
	echo json_encode($data);

?>