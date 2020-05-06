<?php
	require "connection.php";

	header('Content-type: application/json');

	$id = $_POST['id_user'];
	$id_weekday = $_POST['id_weekday'];
	$position = $_POST['position'];

	class Scheduler{
		function Scheduler($name_subject,$id_module,$room,$name_weekday){
			$this->name_subject=$name_subject;
			$this->id_module=$id_module;
			$this->room=$room;
			$this->name_weekday = $name_weekday;
		}
	}

	class Room{
		function Room($name_room,$lesson){
			$this->name_room=$name_room;
			$this->lesson=$lesson;
		}
	}

	class Lesson{
		function Lesson($id_lesson){
			$this->id_lesson=$id_lesson;
		}
	}

	$mang =array();
	if($position=="2"){
		$query="SELECT hocphan.id_module,monhoc.name FROM `hocphan` inner join chitiethocphan on hocphan.id_module=chitiethocphan.id_module inner join monhoc on monhoc.id_subject=hocphan.id_subject WHERE chitiethocphan.id_user='".$id."'";
	}else{
		$query="SELECT hocphan.id_module,monhoc.name FROM `hocphan`  inner join monhoc on monhoc.id_subject=hocphan.id_subject WHERE hocphan.id_user='".$id."'";
	}
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			$query1 = "select DISTINCT phonghoc.name,phonghoc.id_room from thoikhoabieu inner join phonghoc on phonghoc.id_room=thoikhoabieu.id_room WHERE thoikhoabieu.id_module='".$row['id_module']."' and thoikhoabieu.id_weekday='".$id_weekday."'";
			$result1 = mysqli_query($connect,$query1);
			$mang2 = array();
			while ($row1 = mysqli_fetch_array($result1)) {
				$query2 = "select tiethoc.id_lesson from tiethoc inner join thoikhoabieu on tiethoc.id_lesson=thoikhoabieu.id_lesson WHERE thoikhoabieu.id_module='".$row['id_module']."' and thoikhoabieu.id_room='".$row1['id_room']."'";
				$result2 = mysqli_query($connect,$query2);
				$mang3 = array();
				while ($row2 = mysqli_fetch_assoc($result2)) {
					array_push($mang3, new Lesson($row2['id_lesson']));
				}
				if(count($mang3)>0){
					array_push($mang2, new Room($row1['name'],$mang3));
				}
			}
			if(count($mang2)>0){
				$query3 = "select name from thutrongtuan WHERE id_weekday='".$id_weekday."'";
				$result3 = mysqli_query($connect,$query3);
				$row3 = mysqli_fetch_assoc($result3);
				array_push($mang, new Scheduler($row['name'],$row['id_module'],$mang2,$row3['name']));
			}
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
