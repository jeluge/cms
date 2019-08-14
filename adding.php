<?php require __DIR__.'/template_parts/header.php';
check_user_loggedin();
$page_id = '';
$title = '';
$content = '';
$type = 'add';
$btn_label ='Add';

if(isset($_GET['page_id']) && $_GET['page_id']){
	$page_id=$_GET['page_id'];
	$type = $_GET['type'];
	$btn_label = "Edit";

	$sql="SELECT * FROM page where page_id=".$page_id;
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$title = $row['title'];
		$content = $row['content'];
	}
}

?>
<form action="action.php">
	<input type="hidden" name="type" value="<?php echo $type; ?>">
	<?php if($page_id){ ?>
		<input type="hidden" name="page_id" value="<?php echo $page_id; ?>">
	<?php } ?>

	Title:<input type="text" name="title" value="<?php echo $title; ?>"><br>
	Content:<textarea type="text" name="content" ><?php echo $content; ?></textarea><br>
	<input type="submit" name="update" value="<?php echo $btn_label; ?>">
<?php
require __DIR__.'/template_parts/footer.php'; ?>