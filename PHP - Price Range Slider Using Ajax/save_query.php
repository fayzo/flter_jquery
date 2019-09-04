<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		if(!empty($_POST['product_name']) && !empty($_POST['product_price'])){
			$product_name = $_POST['product_name'];
			$product_price = $_POST['product_price'];
			
			$file = explode(".", $_FILES['product_image']['name']);
			$ext = array("png", "gif", "jpg", "jpeg");
			
			if(in_array($file[1], $ext)){
				$file_name = $file[0].'.'.$file[1];
				$tmp_file = $_FILES['product_image']['tmp_name'];
				$location = "upload/".$file_name;
				$new_location = addslashes($location);
				
				if(move_uploaded_file($tmp_file, $location)){
					$conn->query("INSERT INTO `product` VALUES('', '$product_name', '$product_price', '$new_location')");
					echo "<script>alert('Data Insert')</script>";
					echo "<script>window.location = 'index.php'</script>";
				}
				
			}else{
				echo "<script>alert('File not available')</script>";
				echo "<script>window.location = 'index.php'</script>";
			}
				
		}else{
			echo "<script>alert('Please complete the required field!')</script>";
		}
		
		
	}
?>