
<?php
	require __DIR__.'/template_parts/header.php';
	check_user_loggedin();
?>
<a href="page-manager.php">PAGE MANAGER </a><br>
<a href="admin-manager.php">ADMIN MANAGER</a>
<br><br>
<a href="dashboard.php?logout=true">LOGOUT</a>
<?php require __DIR__.'/template_parts/footer.php'?>