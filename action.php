<?php
	require __DIR__.'/inc/constants.php';
	require __DIR__.'/inc/database.php';



	if(isset($_GET['type']) && $_GET['type']){
		global $conn;

		switch ($_GET['type']){
			case 'delete':
				$page_id=$_GET['page_id'];
				$sql = "DELETE FROM image WHERE image_id IN(SELECT image_id FROM page_image_relation WHERE page_id=$page_id)";
				$result = mysqli_query($conn,$sql);
				if($result){
					$sql1 = "DELETE FROM page WHERE page_id=".$page_id;
					$result1 = mysqli_query($conn,$sql1);
					if($result1){
						$sql11 = "DELETE FROM page_image_relation WHERE page_id=$page_id;";
						$result11 = mysqli_query($conn,$sql11);
						if($result11){
							header('location:page-manager.php?page_id='.$page_id.'&delete=1');
							exit();
						}
					}
				}
					else{
						header('location:page-manager.php?page_id='.$page_id.'&error=1');
					exit();
				}
			break;

			case 'edit':
				$page_id=$_GET['page_id'];
				$title=$_GET['title'];
				$content=$_GET['content'];
				$sql="UPDATE page SET title='$title',content='$content' WHERE page_id=".$page_id;
				$result=mysqli_query($conn,$sql);
				if($result){
					header('location:adding.php?page_id='.$page_id.'&success=1&type=edit');
					exit();
				}else{
					header('location:adding.php?page_id='.$page_id.'&error=1');
					exit();
				}
			break;

			case 'add':
				$title=$_GET['title'];
				$content=$_GET['content'];
				$sql="INSERT INTO page(title,content) VALUES('$title','$content')";
				$result=mysqli_query($conn,$sql);
				$page_id = mysqli_insert_id($conn);
				if($result){
					header('location:adding.php?page_id='.$page_id.'&success=1&type=edit');
					exit();
				}else{
					header('location:adding.php?&error=1');
					exit();
				}
			break;

			case 'forgotpass':
			if(isset($_GET['forgetpass'])){
				$email = $_GET['email'];
				$password = $_GET['newpassword'];
				$sql="SELECT * FROM user WHERE email='".$email."'";
				$result=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($result);
				if($email=$row['email']){
					$sqll="UPDATE user SET password='".$password."' WHERE email='".$email."'";
					$resultt=mysqli_query($conn,$sqll);
					if($resultt){
						header('location:forget-password.php?success=1');
					}
				}
				else{
					header('location:forget-password.php?success=0');
					exit();
				}
			}
			break;

			case 'email_pass_change':
			if(isset($_GET['submit_email_pass_change'])){
				$newemail = $_GET['newemail'];
				$newpass = $_GET['newpass'];
				$sql1 = "UPDATE user SET email = '$newemail' , password = '$newpass';";
				$result1 = mysqli_query($conn,$sql1);
				if($result1){
					header('location:admin_email_pass_change.php?success=1');
					exit();
				}
			}
			else{
				header('location:admin_email_pass_change.php?success=0');
				exit();
			}
		}
	}