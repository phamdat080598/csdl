<?php
	require "connection.php";

	header('Content-type: application/json');

	$key = $_POST['key'];
	$position = $_POST['position'];
	
	class User{
		function User($id,$password,$name,$id_depart,$id_class,$sex,$phone,$position,$nationality,$wards,$district,$city,$image,$id_card,$date_card,$address_card,$status){
			$this->id=$id;
			$this->password=$password;
			$this->name=$name;
			$this->id_depart=$id_depart;
			$this->id_class = $id_class;
			$this->position = $position;
			$this->phone=$phone;
			$this->sex = $sex;
			$this->nationality =$nationality;
			$this->wards=$wards;
			$this->district=$district;
			$this->city=$city;
			$this->image = $image;
			$this->id_card = $id_card;
			$this->date_card = $date_card;
			$this->address_card=$address_card;
			$this->status =$status;
		}
	}
	$mang =array();
	$query="SELECT * FROM `taikhoan` WHERE `possion` = '".$position."' AND (id_user LIKE '%".$key."%' or name LIKE '%".$key."%')";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			// print_r($row);
			// // die();
			array_push($mang, new User($row['id_user'],$row['password'],$row['name'],$row['id_department'],$row['id_class'],$row['sex'],$row['phone'],$row['possion'],$row['nationality'],$row['wards'],$row['district'],$row['city'],$row['image'],$row['id_card'],$row['date_card'],$row['address_card'],$row['status']));
		}
		if(count($mang)>0){
			$data = [ 'status' => '1', 'data' =>$mang ];
			echo json_encode($data);
		}else{
			$data = [ 'status' => '0', 'data' =>$mang ];
			echo json_encode($data);
		}
	
	}else{
		$data = [ 'status' => '2', 'data' =>$mang ];
		echo json_encode($data);
	}

	

?>