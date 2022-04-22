<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
		
			{
				header('Location: index.php');
				exit();
			}
			
?>
<!DOCTYPE html>
<html lang="pl">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

	<title>Sklep internetowy - Praca inżynierska</title>

<!-- Style -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">

</head>

<body>

<!-- Poczatek - Pasek nawigacyjny -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="szybki-dostep.php">Panel administratora </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownKlienci" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Klienci
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownKlienci">
				  <a class="dropdown-item" href="klienci-lista.php">Lista</a>
				  <a class="dropdown-item" href="klienci-modyfikacja.php">Modyfikacja</a>
				</div>
		    </li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownProdukty" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Produkty
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownProdukty">
				  <a class="dropdown-item" href="produkty-lista.php">Lista</a>
				  <a class="dropdown-item" href="wybor-produkty-modyfikacja.php">Modyfikacja</a>
				</div>
		    </li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownZamowienia" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Zamówienia
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownZamowienia">
				  <a class="dropdown-item" href="zamowienia-lista.php">Lista</a>
				</div>
		    </li>
		    <li class="nav-item">
        		<a class="nav-link" href="panelWylogowanie.php">Wyloguj</a>
      		</li>		    
		</ul>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-12 text-center"><h1>Modyfikacja danych</h1></div>
		<div class="col-12 text-center"><h4>Wybierz kategorie</h4></div>
		<div class="row produkty-modyfikacja p-2">
			<div class="col-md-3 col-sm-12 bg-white pt-3">
				<div class="card">
				  <img class="card-img-top" src="photo/bateria.png" alt="Baterie">
				  <div class="card-body">
				    <h5 class="card-title">Baterie</h5>
				    <p class="card-text">Tutaj zmodyfikujesz parametry produktów w kategorii: baterie</p>
				    <a href="produkty-modyfikacja-baterie.php" class="btn btn-primary">Modyfikuj baterie</a>
				  </div>
				</div>				
			</div>
			<div class="col-md-3 col-sm-12 bg-white pt-3">
				<div class="card">
				  <img class="card-img-top" src="photo/czujniki.png" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">Czujniki</h5>
				    <p class="card-text">Tutaj zmodyfikujesz parametry produktów w kategorii: czujniki</p>
				    <a href="produkty-modyfikacja-czujniki.php" class="btn btn-primary">Modyfikuj czujniki</a>
				  </div>
				</div>	
			</div>
			<div class="col-md-3 col-sm-12 bg-white pt-3">
				<div class="card">
				  <img class="card-img-top" src="photo/dioda.png" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">Diody</h5>
				    <p class="card-text">Tutaj zmodyfikujesz parametry produktów w kategorii: diody</p>
				    <a href="produkty-modyfikacja-diody.php" class="btn btn-primary">Modyfikuj diody</a>
				  </div>
				</div>	
			</div>
			<div class="col-md-3 col-sm-12 bg-white pt-3">
				<div class="card">
				  <img class="card-img-top" src="photo/kondensator.png" alt="Card image cap">
				  <div class="card-body">
				    <h5 class="card-title">Kondensatory</h5>
				    <p class="card-text">Tutaj zmodyfikujesz parametry produktów w kategorii: kondensatory</p>
				    <a href="produkty-modyfikacja-kondensatory.php" class="btn btn-primary">Modyfikuj kondensatory</a>
				  </div>
				</div>	
			</div>
		</div>		
	</div>	
</div>