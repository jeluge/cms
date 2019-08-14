<?php
	require __DIR__.'/template_parts/header.php';
	check_user_loggedin();
	$sql="SELECT page_id, title, content FROM page";
	$result=mysqli_query($conn,$sql);
	if(isset($_GET['delete'])){
		$delete=$_GET['delete'];
		if($delete==1){
			echo "successfully delete the page.";
		}
	}
	if(isset($_GET['error'])){
		$error=$_GET['error'];
		if($error==1){
			echo "error deleting the page.";
		}
	}
?>
	<br>
	<table border="2px">
		<tr>
			<th>SN</th>
			<th>Title</th>
			<th>Content</th>
			<th>ACTION</th>
			<th>IMAGES</th>
		</tr>
		<?php 	$sql="SELECT * FROM page";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
						echo '<tr>';
						echo '<td>'.$row['page_id'].'</td>';
						echo '<td>'.$row['title'].'</td>';
						echo '<td>'.$row['content'].'</td>';
						echo "<td> <a href='adding.php?page_id=".$row['page_id']."&type=edit'>EDIT</a>||
						   			<a href='action.php?page_id=".$row['page_id']."&type=delete'>DELETE</a></td>";
						echo "<td> <a href='image-manager.php?page_id=".$row['page_id']."'>IMAGES</a></td>";
						echo '</tr>';
					}
					echo '<tr>';
					echo "<td  rowspan='4'> <a href='adding.php?type=add'>ADD</a></td>";
					echo '<tr>';
				}
			?>

	</table>
	<br>
	<a href="image-manager.php">IMAGE MANAGER</a>
	<br>
	<br>
	<script type="text/javascript">
		function deletefunction(){
			alert("Are you sure to delete the page?");
		}
	</script>
	<?php require __DIR__.'/template_parts/footer.php';