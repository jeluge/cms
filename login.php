<?php
require __DIR__.'/template_parts/header.php';
?>

<h2>Login to continue.</h2>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onsubmit="HandleSubmit()">
	<label>Email</label>
	<input type="text" name="email" id="email"><br>
	<label>Password</label>
	<input type="Password" name="password"><br>
	<label>
	<input type="checkbox" name="remember_me">
	Remember Me
	</label><br>
	<input type="submit" name="login" value="Login" ><br>
	<a href="forget-password.php">FORGOT PASSWORD</a>
</form>
<script type="text/javascript" >
	function HandleSubmit(){
		var email = document.getElementById("email").value;
		var password=document.getElementById("password").value;
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".");

		if(empty(email)){
			alert("email cannot be empty");
		}
		else{
			if(atpos<1 ||dotpos-atpos<2){
				alert("email not valid");
			}
			else{
				return true;
			}
			return false;
		}
		return false;
	}
</script>
<?php require __DIR__.'/template_parts/footer.php'; ?>