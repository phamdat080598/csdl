<?php
	require "connection.php";
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

	$id = $_POST["id"];
	$password = $_REQUEST["password"];
	$name = $_REQUEST["name"];
	$id_depart = $_REQUEST["id_depart"];
	$id_class = $_REQUEST["id_class"];
	$position = $_REQUEST["position"];
	$phone = $_REQUEST["phone"];
	$nationality = $_REQUEST["nationality"];
	$wards = $_REQUEST["wards"];
	$district = $_REQUEST["district"];
	$city = $_REQUEST["city"];
	$id_card = $_REQUEST["id_card"];
	$date_card = $_REQUEST["date_card"];
	$address_card = $_REQUEST["address_card"];
	$status = $_REQUEST["status"];
	$sex = $_REQUEST["sex"];
	$image = $_REQUEST["image"];
	// $id = "122";
	// // $password = "1212";
	// // $name = "1212";
	// // $id_depart = "K1";
	// // $id_class = "L2_CNTT2";
	// // $position = "1212";
	// // $phone = "1212";
	// // $nationality = "1212";
	// // $wards = "1212";
	// // $district = "1212";
	// // $city = "1212";
	// // $id_card = "1212";
	// // $date_card = "1212";
	// // $address_card = "1212";
	// // $status = "1212";
	// // $sex = "1212";
	// // $image = "1212";
	// $mang = array();
	header('Content-type: application/json');

	if($id_class==null){
		$query = "INSERT into taikhoan values ('".$id."','".$password."','".$name."','".$id_depart."',null,'".$sex."','".$phone."','".$position."','".$nationality."','".$wards."','".$district."','".$city."','".$image."','".$id_card."','".$date_card."','".$address_card."','".$status."')";
	}else{
		$query = "INSERT into taikhoan values ('".$id."','".$password."','".$name."','".$id_depart."','".$id_class."','".$sex."','".$phone."','".$position."','".$nationality."','".$wards."','".$district."','".$city."','".$image."','".$id_card."','".$date_card."','".$address_card."','".$status."')";
	}
		$result = mysqli_query($connect,$query);
	if($result){
		$data = [ 'status' => '1', 'user' => $id ];
	}else{
		$data = [ 'status' => '0', 'user' => ""];
	}

	echo json_encode( $data );

?>