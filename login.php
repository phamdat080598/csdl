<?php
    require "connection.php";

    class User{
        function User($id,$password,$name,$id_depart,$name_depart,$id_class,$name_class,$sex,$phone,$position,$nationality,$wards,$district,$city,$image,$id_card,$date_card,$address_card,$status){
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
            $this->name_depart = $name_depart;
            $this->name_class = $name_class;
        }
    }

    header('Content-type: application/json');

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $mang = array();
    $user1 = null;
    $sql = "SELECT * FROM taikhoan where id_user = '" . $user . "' AND password ='" . $pass . "'";
    $result = mysqli_query($connect, $sql);

    if($result){
        while($row = mysqli_fetch_assoc($result)){

            $sql1 = "SELECT name FROM khoa where id_department = '".$row['id_department']."'";
            $result1 = mysqli_query($connect, $sql1);
            $row1 = mysqli_fetch_assoc($result1);

            $sql2 = "SELECT name FROM lop where id_class = '".$row['id_class']."'";
            $result2 = mysqli_query($connect, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            if($row2==null){
                $user1 = new User($row['id_user'],$row['password'],$row['name'],$row['id_department'],$row1['name'],$row['id_class'],null,$row['sex'],$row['phone'],$row['possion'],$row['nationality'],$row['wards'],$row['district'],$row['city'],$row['image'],$row['id_card'],$row['date_card'],$row['address_card'],$row['status']);
            }else{
                $user1 = new User($row['id_user'],$row['password'],$row['name'],$row['id_department'],$row1['name'],$row['id_class'],$row2['name'],$row['sex'],$row['phone'],$row['possion'],$row['nationality'],$row['wards'],$row['district'],$row['city'],$row['image'],$row['id_card'],$row['date_card'],$row['address_card'],$row['status']);
            }
           array_push($mang, $user1);
        }
        if(count($mang)>0){
            $data = ['status' => '1','data' => $user1];
        }else{
            $data = ['status' => '0','data' => $user1];
        }
    }
    echo json_encode($data);
?>