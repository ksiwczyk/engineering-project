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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/datatables.min.css"/>

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
		<div class="col-md-12">
			<h3 style="margin-top: 20px;">Lista klientów</h3>		
		</div>
	</div>
<!-- Wynik wyszukiwania -->
	<div class="row">
		<div class="col-md-12" style="margin: 5px">
			<div class="tabela">
				<?php

				require('db_data.php');

				$zapytanie_lista_klientow=
				"SELECT k.imie, k.nazwisko, k.numer_telefonu, k.email, k.login from dane_klient AS k";

				$wynik = $connect->query($zapytanie_lista_klientow);

				if($wynik->num_rows > 0) {
				echo '<table id="tabela-klienci-lista" class="display compact" style="width: 100%">';
		echo  "<thead>
			    <tr>
			      <th>Imie</th>
			      <th>Nazwisko</th>
			      <th>Numer telefonu</th>
			      <th>E-mail</th>
			      <th>Login</th>
			    </tr>
			  </thead>
			  <tbody>";
			  while ($row = $wynik->fetch_assoc()) {
			echo "<tr>
			      <th>".$row["imie"]."</th>
			      <td>".$row["nazwisko"]."</td>
			      <td>".$row["numer_telefonu"]."</td>
			      <td>".$row["email"]."</td>
			      <td>".$row["login"]."</td>
			    </tr>";
				}
				
			echo "</tbody> </table>";
			}
			else {
					echo '<div class="alert alert-warning" role="alert">Nie znaleziono wyników!</div>';
				}
			$connect->close();
			?>	
			</div>			
		</div>		
	</div>
<!-- Koniec wyswietlania wyników -->
<!-- Wyszukiwanie po mniejszej ilości parametrów - POCZATEK -->


</div>
<!-- Koniec - Zawartosc -->
</div>



<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.23/datatables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="application/json" src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Polish.json"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tabela-klienci-lista').DataTable();
} );
</script>
</body>
</html>