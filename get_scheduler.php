<?php
	require "connection.php";

	header('Content-type: application/json');

	$id = $_POST['id_user'];
	
	class Scheduler{
		function Scheduler($id,$monhoc,$id_module,$phonghoc,$weekday,$lesson){
			$this->id=$id;
			$this->monhoc=$monhoc;
			$this->id_module=$id_module;
			$this->phonghoc=$phonghoc;
			$this->weekday = $weekday;
			$this->lesson = $lesson;
		}
	}
	$mang =array();
	$query="SELECT chitiethocphan.id_user,monhoc.name,hocphan.id_module,phonghoc.name as ph_name,thutrongtuan.name as weekday,tiethoc.name as lesson FROM `monhoc` INNER join hocphan on hocphan.id_subject=monhoc.id_subject INNER JOIN thoikhoabieu on thoikhoabieu.id_module=hocphan.id_module INNER JOIN chitiethocphan ON chitiethocphan.id_module=hocphan.id_module INNER JOIN phonghoc on phonghoc.id_room=thoikhoabieu.id_room INNER join thutrongtuan on thutrongtuan.id_weekday=thoikhoabieu.id_weekday INNER JOIN tiethoc on tiethoc.id_lesson = thoikhoabieu.id_lesson WHERE chitiethocphan.id_user='".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			// print_r($row);
			// // die();
			array_push($mang, new Scheduler($row['id_user'],$row['name'],$row['id_module'],$row['ph_name'],$row['weekday'],$row['lesson']));
		}
		if(count($mang)>0){
			$data = [ 'status' => '1', 'data' =>$mang ];
		}else{
			$data = [ 'status' => '0', 'data' =>$mang ];
		}
	
	}else{
		$data = [ 'status' => '2', 'data' =>$mang ];
	}

	echo json_encode($data);
?>
