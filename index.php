<?php
	session_start();
//需要用isset来检测变量，不然php可能会报错。
	if(!isset($_SESSION['uname'])) {
		header('Location: /cookzilla/main2.php');
	} else {
		header('Location: /cookzilla/main.php');
	}
?>