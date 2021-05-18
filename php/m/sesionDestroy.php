<?php

	session_start();
	if (isset($_SESSION["profesor"]) || isset($_SESSION["estudiante"]) || isset($_SESSION["admin"])) {
		session_destroy();
		header("Location: ../v/login.php");
		}else{
			header("Location: ../v/login.php");
		}

?>