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
<!-- Koniec - Pasek nawigacyjny -->
<!-- Poczatek - Zawartosc -->
<div class="container-fluid">
	<div class="row">
		<div class="col">
			<h3 style="margin-top: 20px;">Szybki dostęp</h3>			
		</div>
	</div>
<!-- Szybki dostep do funkcji - Panel administratora -->				
			<div class="row">
				<div class="col-md-4">
					<div class="card m-1">
						<div class="card-body">
						<h5 class="card-title">Klient</h5>
							<h6 class="card-subtitle mb-2 text-muted">Lista klientów</h6>
							    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za wyswietlenie listy klientów.</p>
							    <a href="#" class="card-link">Przejdz tutaj</a>
						</div>	
					</div>	
				</div>	
			<div class="col-md-4">
				<div class="card m-1">
					<div class="card-body">
						<h5 class="card-title">Klient</h5>
							<h6 class="card-subtitle mb-2 text-muted">Modyfikacja danych klienta</h6>
							    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za modyfikacje danych klienta.</p>
							    <a href="#" class="card-link">Przejdz tutaj</a>				
					</div>				
				</div>				
			</div>				
				<div class="col-md-4">
					<div class="card m-1">
						<div class="card-body">
						<h5 class="card-title">Zamówienia</h5>
							<h6 class="card-subtitle mb-2 text-muted">Lista zamówień</h6>
							    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za wyświetelnie listy zamówień.</p>
							    <a href="#" class="card-link">Przejdz tutaj</a>
						</div>						
					</div>	
				</div>	
		</div>				
			<div class="row">
				<div class="col-md-4">
					<div class="card m-1">
						<div class="card-body">
						<h5 class="card-title">Produkt</h5>
							<h6 class="card-subtitle mb-2 text-muted">Lista produktów</h6>
							    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za wyświetlenie listy produktów.</p>
							    <a href="#" class="card-link">Przejdz tutaj</a>
						
						</div>	
					</div>					
				</div>
				<div class="col-md-4">
					<div class="card m-1">
						<div class="card-body">
						<h5 class="card-title">Produkt</h5>
							<h6 class="card-subtitle mb-2 text-muted">Modyfikacja produktów - wybór kategorii</h6>
							    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za wybor kategorii.</p>
							    <a href="wybor-produkty-modyfikacja.php" class="card-link">Przejdz tutaj</a>					
						</div>						
					</div>					
				</div>	
				<div class="col-md-4">
					<div class="card m-1">
						<div class="card-body">
						<h5 class="card-title">Produkt</h5>
							<h6 class="card-subtitle mb-2 text-muted">Modyfikacja produktów - baterie</h6>
							    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za baterie.</p>
							    <a href="produkty-modyfikacja-baterie.php" class="card-link">Przejdz tutaj</a>					
						</div>	
					</div>			
				</div>	
		</div>
			<div class="row">			
				<div class="col-md-4">
					<div class="card m-1">
						<div class="card-body">
						<h5 class="card-title">Produkt</h5>
							<h6 class="card-subtitle mb-2 text-muted">Modyfikacja produktów - czujniki</h6>
							    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za czujniki.</p>
							    <a href="produkty-modyfikacja-czujniki.php" class="card-link">Przejdz tutaj</a>					
						</div>	
					</div>					
				</div>				

			<div class="col-md-4">
				<div class="card m-1">
					<div class="card-body">
					<h5 class="card-title">Produkt</h5>
						<h6 class="card-subtitle mb-2 text-muted">Modyfikacja produktów - diody</h6>
						    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za diody.</p>
						    <a href="produkty-modyfikacja-diody.php" class="card-link">Przejdz tutaj</a>					
					</div>	
				</div>				
			</div>
			<div class="col-md-4">
				<div class="card m-1">
					<div class="card-body">
					<h5 class="card-title">Produkt</h5>
						<h6 class="card-subtitle mb-2 text-muted">Modyfikacja produktów - kondensatory</h6>
						    <p class="card-text">Używajac tego okna przejdz bezpośrednio do modułu odpowiedzialnego za kondensatory.</p>
						    <a href="produkty-modyfikacja-kondensatory.php" class="card-link">Przejdz tutaj</a>					
					</div>	
				</div>	
			</div>				
		</div>										
	</div>
</div>
<!-- Koniec - Zawartosc -->
</div>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

</body>
</html>