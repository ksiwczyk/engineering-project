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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">


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
		<div class="col-md-3">
			<div class="kategorie">
		      <h3 class="my-4">Kategoria</h3>
		        <div class="list-group">
		          <a href="wyszukiwarka_baterie.html" class="list-group-item">Baterie</a>
		          <a href="wyszukiwarka_czujniki.html" class="list-group-item">Czujniki</a>
		          <a href="wyszukiwarka_diody.html" class="list-group-item">Diody</a>
		          <a href="wyszukiwarka_kondensatory.html" class="list-group-item">Kondensatory</a>
		        </div>				
			</div>			
		</div>
		<div class="col-md-7">
			<div class="dodaj-do-koszyka my-4 px-4 pt-4 border border-dark">
			<h4>Dodaj do koszyka</h4>
				<p class="font-weight-normal">Podaj kod produktu z tabeli poniżej. Przedmiot zostanie wtedy dodany do koszyka</p>
				<form>
					<div class="form-group">
						<label>Kod produktu:</label>
						<input type="text" name="dodaj-do-koszyka">					
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-primary btn-lg">Dodaj do koszyka!</button>							
					</div>
				</form>				
			</div>
			<div class="tabela-wyniki-wyszukiwania my-4">
				<?php

				require('db_data.php');

				$kondensatory_producent = $_POST['kondensatory_producent'];
				$kondensatory_typ = $_POST['kondensatory_typ'];
				$kondensatory_min_zycie = $_POST['kondensatory_min_zycie'];
				$kondensatory_max_zycie = $_POST['kondensatory_max_zycie'];
				$kondensatory_montaz = $_POST['kondensatory_montaz'];
				$kondensatory_napiecie_pracy = $_POST['kondensatory_napiecie_pracy'];
				$kondensatory_min_poj = $_POST['kondensatory_min_poj'];
				$kondensatory_max_poj = $_POST['kondensatory_max_poj'];
				$kondensatory_min_raster = $_POST['kondensatory_min_raster'];
				$kondensatory_max_raster = $_POST['kondensatory_max_raster'];
				$kondensatory_rodzaj_montaz = $_POST['kondensatory_rodzaj_montaz'];
				$kondensatory_min_min_temp = $_POST['kondensatory_min_min_temp'];
				$kondensatory_max_min_temp = $_POST['kondensatory_max_min_temp'];
				$kondensatory_min_max_temp = $_POST['kondensatory_min_max_temp'];
				$kondensatory_max_max_temp = $_POST['kondensatory_max_max_temp'];
				$kondensatory_min_cena = $_POST['kondensatory_min_cena'];
				$kondensatory_max_cena = $_POST['kondensatory_max_cena'];


				$zapytanie_wysz_kondensatory =
				"SELECT
				pk.kod_produktu, pk.producent, pk.rodzaj_kondensatora, pk.czas_zycia, pk.montaz, pk.nap_pracy_kondensatora, 
				pk.pojemnosc_kondensatora,
				pk.raster_wprowadzen, pk.rodzaj_montazu, pk.min_temp, pk.max_temp, pk.cena from parametry_kondensatory AS pk where
				producent='".$kondensatory_producent."' AND 
				rodzaj_kondensatora='".$kondensatory_typ."' AND 
				czas_zycia BETWEEN ".$kondensatory_min_zycie." AND ".$kondensatory_max_zycie." AND
				montaz='".$kondensatory_montaz."' AND
				nap_pracy_kondensatora='".$kondensatory_napiecie_pracy."' AND 
				pojemnosc_kondensatora BETWEEN ".$kondensatory_min_poj." AND ".$kondensatory_max_poj." AND 
				raster_wprowadzen BETWEEN ".$kondensatory_min_raster." AND ".$kondensatory_max_raster." AND
				rodzaj_montazu='".$kondensatory_rodzaj_montaz."' AND 
				min_temp BETWEEN ".$kondensatory_max_min_temp." AND ".$kondensatory_min_min_temp." AND
				max_temp BETWEEN ".$kondensatory_min_max_temp." AND ".$kondensatory_max_max_temp." AND 
				cena BETWEEN ".$kondensatory_min_cena." AND ".$kondensatory_max_cena;

				if ($wynik = $connect->query($zapytanie_wysz_kondensatory)) {
    				
					}
					else {
					    echo $connect->error;
					}	



				echo '<table id="tabela-wyniki-wyszukiwania-kondensatory" class="display compact" style="width: 80%">';
				echo "<thead>
						<tr>
			                <th>Kod produktu</th>
			                <th>Producent</th>
			                <th>Rodzaj</th>
			                <th>Czas zycia</th>
			                <th>Montaz</th>
			                <th>Napięcie pracy</th>
			                <th>Pojemnosc</th>
			                <th>Raster wprowadzen</th>
			                <th>Rodzaj montazu</th>
			                <th>Min temperatura</th>
			                <th>Max temperatura</th>
			                <th>Cena</th>						
						</tr>
					</thead>
			        <tbody>";
			        if ($wynik->num_rows > 0) {
							while ($row = $wynik->fetch_assoc()) {
			          echo "<tr>
			                <td>".$row["kod_produktu"]."</td>
			                <td>".$row["producent"]."</td>
			                <td>".$row["rodzaj_kondensatora"]."</td>
			                <td>".$row["czas_zycia"]."</td>
			                <td>".$row["montaz"]."</td>
			                <td>".$row["nap_pracy_kondensatora"]."</td>
			                <td>".$row["pojemnosc_kondensatora"]."</td>
			                <td>".$row["raster_wprowadzen"]."</td>
			                <td>".$row["rodzaj_montazu"]."</td>
			                <td>".$row["min_temp"]."</td>
			                <td>".$row["max_temp"]."</td>
			                <td>".$row["cena"]."</td>
			            </tr>";
                    }
				}
			  echo "</tbody></table>"
			  ?>				
			</div>			
		</div>
		<div class="col-md-2">
			<div class="mini-info">
				<div class="card border-dark mb-3 my-4" style="max-width: 18rem;">
				        <div class="card-header">Koszyk</div>
				          <div class="card-body text-dark">
				            <h5 class="card-title">Wartość koszyka:</h5>
				              <p class="card-text">Liczba przedmiotów:</p>
				              <a href="#" class="btn btn-primary">Zobacz wiecej informacji o zawartosci</a>
				          </div>
				        </div>
			
			</div>			
		</div>		
	</div>
</div>
<!-- Koniec -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="application/json" src="https://cdn.datatables.net/plug-ins/1.10.22/i18n/Polish.json"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#tabela-wyniki-wyszukiwania-kondensatory').DataTable();
} );
</script>
</body>
</html>