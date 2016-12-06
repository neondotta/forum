<?php

session_start();
// session_destroy();

if(!$_SESSION['login']){
	header('Location: views/login.php');
}

?>