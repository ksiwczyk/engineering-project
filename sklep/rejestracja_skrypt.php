<?php

	require_once 'db_data.php';
	
	$login = $_POST['login'];
	$haslo = md5($_POST['password']);	
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$numer_telefonu = $_POST['numer_telefonu'];
	$email = $_POST['email'];
	
	$zapytanie = "INSERT INTO dane_klient VALUES ('','$imie','$nazwisko','$numer_telefonu','$email','$login','$haslo');";
	$klient = mysqli_query($connect, $zapytanie);	
	header("Location: index.php");
	exit;

?>