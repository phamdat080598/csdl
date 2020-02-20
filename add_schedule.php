<?php
	require "connection.php";

	header('Content-type: application/json');

	class Schedule{
		function Schedule($id_lesson,$name_lesson,$id_room,$name_room,$id_weekday,$name_weekday,$time_start,$time_end,$id_module){
			$this->id_lesson=$id_lesson;
			$this->name_lesson=$name_lesson;
			$this->id_room=$id_room;
			$this->name_room=$name_room;
			$this->id_weekday = $id_weekday;
			$this->name_weekday = $name_weekday;
			$this->time_start=$time_start;
			$this->time_end = $time_end;
			$this->id_module =$id_module;
		}
	}

	$id_module = $_POST['id_module'];
	$id_lesson = $_POST['id_lesson'];
	$id_room = $_POST['id_room'];
	$id_weekday = $_POST['id_weekday'];

	$query = "INSERT INTO `thoikhoabieu`(`id_lesson`, `id_room`, `id_weekday`, `id_module`) VALUES ('".$id_lesson."','".$id_room."','".$id_weekday."','".$id_module."')";
	$result = mysqli_query($connect,$query);
	if($result){
		$query ="SELECT `name` FROM `thutrongtuan` WHERE `id_weekday` = '".$id_weekday."'";
		$result = mysqli_query($connect,$query);
		if($result){
			$row = mysqli_fetch_assoc($result);
			$name_weekday = $row['name'];
		}


		$query ="SELECT `name` FROM `phonghoc` WHERE `id_room` = '".$id_room."'";
		$result = mysqli_query($connect,$query);
		if($result){
			$row = mysqli_fetch_assoc($result);
			$name_room = $row['name'];
		}

		$query ="SELECT `name`, `time_start`, `time_end` FROM `tiethoc` WHERE `id_lesson` = '".$id_lesson."'";
		$result = mysqli_query($connect,$query);
		if($result){
			$row = mysqli_fetch_assoc($result);
			$name_lesson = $row['name'];
			$time_start = $row['time_start'];
			$time_end= $row['time_end'];
		}

		$data = [ 'status' => '1', 'schedule' => new Schedule($id_lesson,$name_lesson,$id_room,$name_room,$id_weekday,$name_weekday,$time_start,$time_end,$id_module) ];
	}else{
		$data = [ 'status' => '2', 'schedule' => null ]; //new Schedule(null,null,null,null,null,null,null,null,null) 
	}
	echo json_encode($data);
?>