<?php
	require __DIR__.'/inc/constants.php';
	require __DIR__.'/inc/database.php';
	if(isset($_POST['upload_image'])){
		$page_id=$_POST['page_id'];
		if($_FILES['image']['error'] == 0){
			if($_FILES['image']['type'] == 'image/png'||$_FILES['image']['type'] == 'image/jpeg'){
				if(move_uploaded_file($_FILES['image']['tmp_name'],'assets/images/'.$_FILES['image']['name'])){
					$image = $_FILES['image']['name'];
					$sql = "INSERT INTO image(image) VALUES('$image')";
					$result = mysqli_query($conn,$sql);
					if($result){
						$image_id = $conn->insert_id;
						$sql1 = "INSERT INTO page_image_relation(page_id,image_id) VALUES('$page_id','$image_id')";
						$result1 = mysqli_query($conn,$sql1);
						if($result1){
							header('location:image-manager.php?page_id='.$page_id.'&success=1');
						}
					exit();
					}
				}
				else{
					die("Failed to move image to directory");
				}				
			}
			else{
				die("Image type should be png/jpeg");
			}			
		}
		else{
			die("Error Uploading Image");
		}		
	}