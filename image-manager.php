<?php
	require __DIR__.'/template_parts/header.php';
	check_user_loggedin();
	echo"<br>";
	if(isset($_GET['delete'])){
	$delete=$_GET['delete'];
		if($delete==1){
			echo "Successfully Delete the Image.<br>";
		}
	}
	if(isset($_GET['success'])){
		$success=$_GET['success'];
		if($success==1){
			echo "Image Successfully Added";
			echo "<br>";
		}
	}
	?>

	<?php
	if(isset($_GET['page_id'])){
		$page_id=$_GET['page_id'];
	}
	echo " <a href='add-image.php?page_id=$page_id'>ADD IMAGE</a>";
	echo "<br>";
	$sql="SELECT * from image WHERE image_id IN(SELECT image_id FROM page_image_relation WHERE page_id=$page_id)";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			echo "<img src='".IMG_URL.$row["image"]."'>";
			echo "<br>";
			echo $row['image'];
			echo "<br>";
			echo "<td> <a href='delete_image.php?image_id=".$row['image_id']."&type=delete'>DELETE</a></td>";
			echo "<br>";
		}
	}
	?>
<br>
<?php
	require __DIR__.'/template_parts/footer.php';