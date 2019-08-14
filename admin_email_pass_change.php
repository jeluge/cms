<?php
	require __DIR__.'/template_parts/header.php';
	check_user_loggedin();
	if(isset($_GET['success'])){
		$success=$_GET['success'];
		if($success==1){
			echo "Email and Password changed";
		}
	}
	if(isset($_GET['success'])){
		$success=$_GET['success'];
		if($success==0){
			echo "Email and Password Invalid";
		}
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="action.php">
		<input type="hidden" name="type" value="email_pass_change">
		ENTER NEW EMAIL AND PASSWORD<br><br>
		NEW EMAIL:<input type="email" name="newemail"><br>
		NEW PASSWORD:<input type="password" name="newpass"><br>
		<input type="submit" name="submit_email_pass_change" value="SUBMIT"><br><br>
	</form>
	<a href="admin-manager.php">Admin manager</a>
</body>
</html>
<?php
	require __DIR__.'/template_parts/footer.php';