<?php
	require "connection.php";

	header('Content-type: application/json');

	$id = $_POST['id_user'];
	$status = $_POST['status'];
	$key = $_POST['key'];
	$position = $_POST['position'];

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
	$mang=array();

	if($position!=0){
		if($position==1){
			$query = "SELECT * FROM `hocphan` inner join `monhoc` on hocphan.id_subject = monhoc.id_subject  WHERE status = '".$status."' and id_user = '".$id."' AND (id_module LIKE '%".$key."%' or name LIKE '%".$key."%')";
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
			$query = "SELECT * FROM `hocphan` inner join `monhoc` on hocphan.id_subject = monhoc.id_subject inner join chitiethocphan on hocphan.id_module = chitiethocphan.id_module WHERE chitiethocphan.status = '".$status."' and chitiethocphan.id_user = '".$id."' AND (chitiethocphan.id_module LIKE '%".$key."%' or name LIKE '%".$key."%')";
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
		}
	}else{
		$query = "SELECT * FROM `hocphan` inner join `monhoc` on hocphan.id_subject = monhoc.id_subject  WHERE status = '".$status."' AND (id_module LIKE '%".$key."%' or name LIKE '%".$key."%')";
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
	}
	echo json_encode($data);

?>