	<?php
	if(isset($_GET['logout'])){
		unset($_COOKIE['user_logged_in']);
		unset($_COOKIE['user_id']);

		setcookie('user_logged_in',' ',time() - 86400, '/');
		setcookie('user_id',' ',time() - 86400, '/');
		header('location:login.php');
		exit();
	}
	elseif(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql="SELECT * FROM user WHERE email='$email' && password='$password'";

		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			if($email == $row['email'] && $password == $row['password']){
				$user_id = $row['id'];
				if(isset($_POST['remember_me'])){
					setcookie('user_logged_in', md5($user_id), COOKIE_TIME_REMEMBER_ME, "/");
					setcookie('user_id', $user_id, COOKIE_TIME_REMEMBER_ME, "/");
					header('location:dashboard.php');
					exit();
				}
				else{
					setcookie('user_logged_in', md5($user_id), COOKIE_TIME, "/");
					setcookie('user_id', $user_id, COOKIE_TIME, "/");
					header('location:dashboard.php');
					exit();	
				}
			}
		}
	}

function check_user_loggedin(){
	if(isset($_COOKIE['user_logged_in'])){
		if($_COOKIE['user_logged_in'] != md5($_COOKIE['user_id'])){
			header('location:login.php');
			exit();
		}
	}
	else{
		header('location:login.php');
		exit();
	}
}