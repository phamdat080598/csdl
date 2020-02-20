<?php
	require "connection.php";

	header('Content-type: application/json');


	class Day{
		function Day($id,$name){
			$this->id=$id;
			$this->name=$name;
		}
	}

	$mang =array();
	$query = "select * from thutrongtuan";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new Day($row['id_weekday'],$row['name']));
		}
		if(count($mang)>0){
			$data = [ 'status' => '1', 'day' => $mang ];
		}else{
			$data = [ 'status' => '2', 'day' => $mang ];
		}
	
	}else{
		$data = [ 'status' => '2', 'day' => $mang ];
	}
	echo json_encode($data);
?>