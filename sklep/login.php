<?php

	session_start();
		
		if ((!isset($_POST['login'])) || (!isset($_POST['password'])))
			
			{
				header('Location: ../sklep/index.php');
				exit();
			}
			
	if(isset($_POST['buttonLoginSklep']))
	{
		$login=$_POST['login'];
		$password=md5($_POST['password']);
		
		require_once 'db_data.php';
		
		$zapytanie = "SELECT * FROM dane_klient WHERE login = '$login' AND password = '$password'";
		$uzytkownicy = mysqli_query($connect, $zapytanie) or die("Blad w zapytaniu: $zapytanie");
		
   if (mysqli_num_rows($uzytkownicy) > 0) 
		{
			while($rekord = mysqli_fetch_assoc($uzytkownicy)) 
			{

				if (($login == $rekord['login']) && ($password == $rekord['password']))
				{
					$_SESSION['login'] = $rekord['login'];
					$_SESSION['zalogowany'] = true;
					$_SESSION['uzytkownik'] = $rekord['login'];
					$_SESSION['varname'] = $login;
					$_SESSION['email'] = $rekord['email'];
					header("Location: ../sklep/sklep.php");
					exit;
				}
			}
        } 
		else 
		{   
					$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
					header('Location: ../sklep/index.php');      
        }   

		$connect->close();
	}
?>