<?php require __DIR__.'/template_parts/header.php';
if(isset($_GET['success'])) {
		$success=$_GET['success'];
		if($success==1){
			echo "Password Successfully Changed";
		}
		elseif($success==0){
			echo "Email you enterd dinnot matched.";
		}
	}
?>
<p>Provide your email to change password.</p>
<form action="action.php">
<input type="hidden" name="type" value="forgotpass">
<label>
EMAIL:
<input type="email" name="email">
</label><br>
<label>New Password
<input type="password" name="newpassword">
</label><br>
<input type="submit" name="forgetpass" value="Submit"><br><br>
</form>

<?php require __DIR__.'/template_parts/footer.php';