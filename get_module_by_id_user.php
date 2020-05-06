<?php
	require "connection.php";

	header('Content-type: application/json');


	class Module{
		function Module($id_module,$id_subject,$name_subject,$id_user,$date_register,$date_start,$date_end,$quantity,$quantity_registed,$status){
			$this->id_module=$id_module;
			$this->id_subject=$id_subject;
			$this->name_subject=$name_subject;
			$this->id_user =$id_user;
			$this->date_register=$date_register;
			$this->date_start=$date_start;
			$this->date_end =$date_end;
			$this->quantity=$quantity;
			$this->quantity_registed=$quantity_registed;
			$this->status =$status;
		}
	}



	$id_user = $_POST['id_user'];
	$position = $_POST['position'];
	$status = $_POST['status'];

	$mang=array();
	if($position==1){
		$query = "SELECT * FROM `hocphan` inner join `monhoc` on hocphan.id_subject = monhoc.id_subject  WHERE status = '".$status."' AND id_user = '".$id_user."'";
		$result = mysqli_query($connect,$query);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				array_push($mang, new Module($row['id_module'],$row['id_subject'],$row['name'],$row['id_user'],$row['date_register'],$row['date_start'],$row['date_end'],$row['quantity'],$row['quantity_registed'],$row['status']));
			}
			if(count($mang)>0){
				$data = [ 'status' => '1', 'modules' => $mang ]; 
			}else{
				$data = [ 'status' => '2', 'modules' => $mang ]; 
			}
		}else{
			$data = [ 'status' => '3', 'modules' => $mang ]; 
		}
	}else{
		$query = "SELECT id_module FROM `chitiethocphan` WHERE id_user = '".$id_user."'";
		$result = mysqli_query($connect,$query);
		if($result){
			while($row = mysqli_fetch_assoc($result)){
				$query1 = "SELECT * FROM `hocphan` inner join `monhoc` on hocphan.id_subject = monhoc.id_subject  WHERE status = '".$status."' AND id_module = '".$row['id_module']."'";
				$result1 = mysqli_query($connect,$query1);
				$row1 = mysqli_fetch_assoc($result1); 
				if($row1['id_module']!=null){
					array_push($mang, new Module($row1['id_module'],$row1['id_subject'],$row1['name'],$row1['id_user'],$row1['date_register'],$row1['date_start'],$row1['date_end'],$row1['quantity'],$row1['quantity_registed'],$row1['status']));
				}
			}
			if(count($mang)>0){
				$data = [ 'status' => '1', 'modules' => $mang ]; 
			}else{
				$data = [ 'status' => '2', 'modules' => $mang ]; 
			}
		}else{
			$data = [ 'status' => '3', 'modules' => $mang ]; 
		}
	}
	echo json_encode($data);

?>