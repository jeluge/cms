<?php require __DIR__.'/template_parts/header.php';	
	if(isset($_GET['success'])) {
		$success=$_GET['success'];
		if($success==1){
			echo "successfully uploaded the value";
		}
	}
	if(isset($_GET['error'])){
		$error=$_GET['error'];
		if($error==1){
			echo "successfully delete the page.";
		}
	}
	$id=$_GET['id'];
	$sql="SELECT * FROM page where id=".$id;
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		($row=mysqli_fetch_assoc($result))
		?>
	<form action="action.php">
	<input type="hidden" name="type" value="edit">
	<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		Title:<input type="text" name="title" value="<?php echo $row['title']; ?>"><br>
		Content:<input type="text" name="content" value="<?php echo $row['content']; ?>"><br>
		<input type="submit" name="update" value="UPDATE">
</form>
<a href="page_manager.php">GO TO PAGE MANAGER</a>
<?php
}
require __DIR__.'/template_parts/footer.php'; ?>