<?php
require __DIR__.'/constants.php';
require __DIR__.'/database.php';
require __DIR__.'/page.php';
	$sql="SELECT id, title, content FROM page";
	$result=mysqli_query($conn,$sql);