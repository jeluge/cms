<?php
	require __DIR__.'/template_parts/header.php';
	check_user_loggedin();
	echo"<br>";
?>
<a href="admin_email_pass_change.php">Change Email and Password</a><br>
<a href="dashboard.php">Dashboard</a>
<br>
<br>
<?php
	require __DIR__.'/template_parts/footer.php';