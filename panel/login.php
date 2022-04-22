<?php

	session_start();
		
		if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
			
			{
				header('Location: index.php');
				exit();
			}
			
	if(isset($_POST['buttonLoginPanel']))
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);
		
		require_once 'db_data.php';
		
		$zapytanie = "SELECT * FROM dane_admin_panel WHERE login = '$login' AND password = '$password'";
		$admin = mysqli_query($connect, $zapytanie) or die("Blad w zapytaniu: $zapytanie");
		
   if (mysqli_num_rows($admin) > 0) 
		{
			while($rekord = mysqli_fetch_assoc($admin)) 
			{

				if (($login == $rekord['login']) && ($password == $rekord['password']))
				{
					$_SESSION['Login'] = $rekord['Login'];
					$_SESSION['zalogowany'] = true;
					$_SESSION['uzytkownik'] = $rekord['login'];
					$_SESSION['varname'] = $login;
					header("Location: ../panel/szybki-dostep.php");
					exit;
				}
			}
        } 
		else 
		{   
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../panel/index.php');      
        }   

		$connect->close();
	}
?>