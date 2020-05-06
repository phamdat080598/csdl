<?php
	require "connection.php";

	header('Content-type: application/json');

	$position = $_POST['position'];
	$id_module = $_POST['id_module'];
	$id_user = $_POST['id_user'];
	$today = date("d/m/Y");

	$queryM = "SELECT * FROM `thoikhoabieu` WHERE id_module='".$id_module."'";
	$resultM =  mysqli_query($connect,$queryM);
	if($rowM = mysqli_fetch_assoc($resultM)){

		if($position=='2'){
			$queryC = "select * from chitiethocphan WHERE id_user= '".$id_user."' and id_module = '".$id_module."'";
			$resultC =  mysqli_query($connect,$queryC);
			if(mysqli_num_rows($resultC)==0){
				$query = "select * from chitiethocphan inner join thoikhoabieu on chitiethocphan.id_module=thoikhoabieu.id_module WHERE id_user='".$id_user."' and id_lesson = '".$rowM['id_lesson']."' and id_weekday = '".$rowM['id_weekday']."' and id_room = '".$rowM['id_room']."'";
				$result =  mysqli_query($connect,$query);
				if(mysqli_num_rows($result)==0){
					$query1 ="SELECT quantity_registed,quantity FROM `hocphan` WHERE id_module = '".$id_module."'";
					$result1 =  mysqli_query($connect,$query1);
					$row1 = mysqli_fetch_assoc($result1);
					$count = $row1['quantity_registed'] + 1;
					$quantity = $row1['quantity'];
					if($count>$quantity){
						$data = [ 'status' => '3', 'message' => 'Học phần này đã đầy số lượng' ];

					}else{
						$query2 = "INSERT INTO `chitiethocphan`(`id_user`, `id_module`, `date_register`) VALUES ('".$id_user."','".$id_module."','".$today."')";
						$result2 = mysqli_query($connect,$query2);
						$query3 = "UPDATE `hocphan` SET quantity_registed = '".$count."' WHERE id_module = '".$id_module."'";
						$result3 =  mysqli_query($connect,$query3);
						if($result3 && $result2){
							$data = [ 'status' => '1', 'message' => "Đăng ký học phần thành công!!!"];
						}else{
							$data = [ 'status' => '0', 'message' => "Đăng ký học phần không thành công!!!"];
						}
					
					}
				}else{
					$data = [ 'status' => '0', 'message' => 'Trùng thời khóa biểu!!!' ];
				}
			}else{
					$data = [ 'status' => '0', 'message' => 'Bạn đã đăng ký học phần này!!!' ];
				}
		}else{
			$queryC = "select * from hocphan WHERE id_user= '".$id_user."' and id_module = '".$id_module."'";
			$resultC =  mysqli_query($connect,$queryC);
			if(mysqli_num_rows($resultC)==0){
				$query = "select * from hocphan WHERE id_user is NULL and id_module = '".$id_module."'";
				$result =  mysqli_query($connect,$query);
				if(mysqli_num_rows($result)!=0){
					$query = "select * from hocphan inner join thoikhoabieu on hocphan.id_module=thoikhoabieu.id_module WHERE  id_user='".$id_user."' and id_lesson = '".$rowM['id_lesson']."' and id_weekday = '".$rowM['id_weekday']."' and id_room = '".$rowM['id_room']."'";
					$result =  mysqli_query($connect,$query);
					if(mysqli_num_rows($result)==0){
						$query1 = "UPDATE `hocphan` SET `id_user`='".$id_user."' WHERE id_module = '".$id_module."'";
						$result1 = mysqli_query($connect,$query1);
						if ($result1) {
							$data = [ 'status' => '1', 'message' => "Đăng ký giảng dạy thành công!!!"];
						}else{
							$data = [ 'status' => '1', 'message' => 'Đăng ký giảng dạy không thành công!!!' ];
						}
					}else{
						$data = [ 'status' => '1', 'message' => 'Trùng lịch giảng dạy!!!' ];
					}
				}else{
					$data = [ 'status' => '0', 'message' => 'Học phần giảng dạy này đã được đã đăng ký!!!' ];
				}
			}else{
				$data = [ 'status' => '0', 'message' => 'Bạn đã đăng kí học phần giảng dạy này !!!' ];
			}
		}
	}

	

	
	echo json_encode($data);

?>