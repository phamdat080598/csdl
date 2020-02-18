<?php
	require "connection.php";
	$file_path = "images/";//đường dẫn lưu ảnh
	$file_path = $file_path.basename($_FILES['upload_image']['name']);
 
 		header('Content-type: application/json');

	if(move_uploaded_file($_FILES['upload_image']['tmp_name'],$file_path)){//$_FILES là đường dẫn file ở client.$file_path đường dẫn file bạn muốn lưu file upload
		//upload thành công thì sẽ thực hiện update dữ liệu lên server.
		$data = [ 'status' => '1', 'url' => $_FILES['upload_image']['name'] ];
	}else{
		$data = [ 'status' => '0', 'url' => "lỗi" ];
	}
	
		echo json_encode($data);
	
?>