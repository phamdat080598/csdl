<?php
	require "connection.php";

	header('Content-type: application/json');

	class Schedule{
		function Schedule($id_lesson,$id_room,$id_weekday){
			$this->id_lesson=$id_lesson;
			$this->id_room=$id_room;
			$this->id_weekday=$id_weekday;
		}
	}
	$mang = array();

	$id_lesson = $_POST['id_lesson'];
	$id_room = $_POST['id_room'];
	$id_weekday = $_POST['id_weekday'];

	$query = "SELECT * FROM `thoikhoabieu` where `id_lesson`='".$id_lesson."' and `id_room`='".$id_room."' and `id_weekday`='".$id_weekday."'";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new Schedule($row['id_lesson'],$row['id_room'],$row['id_weekday']));
			$id_lesson = $row['id_lesson'];
			$id_room = $row['id_room'];
			$id_weekday = $row['id_weekday'];
		}
		if(count($mang)>0){
			$data = [ 'status' => '2', 'schedule' => new Schedule($id_lesson,$id_room,$id_weekday)];
		}else{
			$data = [ 'status' => '1', 'schedule' =>  new Schedule($id_lesson,$id_room,$id_weekday) ];
		}
	
	}else{
		$data = [ 'status' => '3', 'schedule' => null];
	}
	echo json_encode($data);
?>