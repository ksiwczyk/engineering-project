<?php

	session_start();
	
	session_unset();
	
	header('Location: ../panel/index.php');

?>