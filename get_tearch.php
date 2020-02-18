<?php
	require "connection.php";

	$id = $_POST["id"];
	
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
	$query="select * from taikhoan where possion = '".$id."'";
	$result = mysqli_query($connect,$query);
	if($result){
		while($row = mysqli_fetch_assoc($result)){
			array_push($mang, new User($row['id_user'],$row['password'],$row['name'],$row['id_department'],$row['id_class'],$row['sex'],$row['phone'],$row['possion'],$row['nationality'],$row['wards'],$row['district'],$row['city'],$row['image'],$row['id_card'],$row['date_card'],$row['address_card'],$row['status']));
		}
		if(count($mang)>0){
			echo json_encode($mang);
		}else{
			echo "null";
		}
	
	}else{
		echo "error";
	}
	

?>