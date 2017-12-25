<?php
	session_start();
	if(isset($_SESSION['email']) && $_SESSION['email'] != ""){
		header("Location: home.php");
	}else{
		header("Location: login.php");
	}
?>