<?php

	$host = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "sklep";

	$connect = new mysqli($host,$db_user,$db_password,$db_name) or die ("Nie polaczono z baza ".mysqli_connect_error());

?>