<?php require __DIR__.'/template_parts/header.php';
?>
<form action="action.php">
		<input type="hidden" name="type" value="add">
		Title:<input type="text" name="title"><br>
		Content:<input type="text" name="content"><br>
		<input type="submit" name="add" value="ADD">
</form>
<?php require __DIR__.'/template_parts/footer.php'; ?>