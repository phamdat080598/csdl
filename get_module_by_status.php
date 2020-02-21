<?php
	require "connection.php";

	header('Content-type: application/json');

	$status = $_POST['status'];

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

	$query = "SELECT * FROM `hocphan` WHERE status = '".$status."'";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$query1 = "SELECT name FROM `monhoc` WHERE id_subject = '".$row['id_subject']."'";
			$result1 = mysqli_query($connect,$query1);
			$row1 = mysqli_fetch_assoc($result1);
			array_push($mang, new Module($row['id_module'],$row['id_subject'],$row1['name'],$row['id_user'],$row['date_register'],$row['date_start'],$row['date_end'],$row['quantity'],$row['quantity_registed'],$row['status']));
		}
		if(count($mang)>0){
			$data = [ 'status' => '1', 'modules' => $mang ]; 
		}else{
			$data = [ 'status' => '2', 'modules' => $mang ]; 
		}
	
	}else{
		$data = [ 'status' => '3', 'modules' => $mang ]; 
	}
	echo json_encode($data);

?>