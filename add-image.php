<?php
	require __DIR__.'/template_parts/header.php';
	check_user_loggedin();
	$page_id=$_GET['page_id'];
	if(isset($_GET['success'])) {
		$success = $_GET['success'];
		if($success == 1){
			echo "Successfully Uploaded Images";
		}
		else{
			echo "Cannot Upload Images.";
		}
	};
?>
<form action="upload_image.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="page_id" value="<?php echo $page_id ?>">
    Select image to upload:
    <input type="file" name="image"><br><br>
    <input type="submit" name="upload_image" value="Upload Image">
</form>
<?php require __DIR__.'/template_parts/footer.php';