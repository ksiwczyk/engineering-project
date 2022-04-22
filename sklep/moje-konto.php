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
  <a class="navbar-brand" href="sklep.php">Sklep Elektroniczny</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="wyszukiwarka.php">Wyszukiwarka</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="przeglad-oferty.php">Przeglad oferty</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="moje-konto.php">Moje konto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sklepWylogowanie.php">Wyloguj</a>
      </li>
    </ul>
  </div>
</nav>
<!-- Koniec - Pasek nawigacyjny -->
<!-- Poczatek - Zawartosc -->
<div class="container-fluid">
	<div class="row">
    <div class="col-md-3 pasek-boczny">
  		<div class="col-md-12">
  			<h3 class="my-4">Zakładki</h3>
  			<div class="list-group">
  				<a href="moje-zamowienia.php" class="list-group-item">Moje zamówienia</a>
  			</div>      
  		</div>
<!-- Kategorie -->
    <div class="col-md-12">
      <h3 class="my-4">Kategoria</h3>
        <div class="list-group">
          <a href="wyszukiwarka_baterie.html" class="list-group-item">Baterie</a>
          <a href="wyszukiwarka_czujniki.html" class="list-group-item">Czujniki</a>
          <a href="wyszukiwarka_diody.html" class="list-group-item">Diody</a>
          <a href="wyszukiwarka_kondensatory.html" class="list-group-item">Kondensatory</a>
        </div>      
    </div>
<!-- Koniec - kategorie -->
    </div>
		<div class="col-md-6">		
			<h4 style="margin-top: 10px; ">Moje konto</h4>
				<div class="card border-dark mb-3 my-4" style="max-width: 90%;">
					<div class="card-header">Moje konto</div>
						<div class="card-body text-dark">
							<?php
              require("PokazDane.php")
            ?>
						</div>
					</div>
		</div>
	</div>
</div>
<!-- Koniec - Zawartosc -->




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

</body>
</html>