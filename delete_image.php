<?php
	require __DIR__.'/inc/constants.php';
	require __DIR__.'/inc/database.php';



	if(isset($_GET['type']) && $_GET['type']){
		global $conn;
		switch ($_GET['type']){
			case 'delete':
				$image_id=$_GET['image_id'];
				$sqll="SELECT image from image WHERE image_id=".$image_id;
				$resultt=mysqli_query($conn,$sqll);
				if($resultt){
					if($row=mysqli_fetch_assoc($resultt)){
						$image=$row['image'];
						$sql = "DELETE FROM image WHERE image_id=".$image_id;
						$result=mysqli_query($conn,$sql);
						if($result){
							if(unlink(IMG_PATH.$image)){
								header('location:image-manager.php?image_id='.$image_id.'&delete=1');
								exit();
							}
						}
							else{
								header('location:image-manager.php?image_id='.$image_id.'&error=1');
								exit();
							}
					}
				}
					/*$sql="DELETE FROM image WHERE image_id=".$image_id;
					$result=mysqli_query($conn,$sql);
					if($result){
						if(unlink(IMG_PATH.$image)){
							header('location:image-manager.php?image_id='.$image_id.'&delete=1');
							exit();
						}
					}
					else{
						header('location:image-manager.php?image_id='.$image_id.'&error=1');
						exit();
					}*/

		}
	}