<?php
	require "connection.php";

	header('Content-type: application/json');


	class Room{
		function Room($id,$name){
			$this->id=$id;
			$this->name=$name;
	}
}

	$mang =array();
	$query = "select * from phonghoc";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new Room($row['id_room'],$row['name']));
		}
		if(count($mang)>0){
			$data = [ 'status' => '1', 'room' => $mang ];
		}else{
			$data = [ 'status' => '2', 'room' => $mang ];
		}
	
	}else{
		$data = [ 'status' => '2', 'room' => $mang ];
	}
	echo json_encode($data)
	;
?>