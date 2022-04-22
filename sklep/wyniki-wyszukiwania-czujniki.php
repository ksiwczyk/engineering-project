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

				$czujniki_producent = $_POST['czujniki_producent'];
				$czujniki_typ = $_POST['czujniki_typ'];
				$czujniki_min_czestotliwosc = $_POST['czujniki_min_czestotliwosc'];
				$czujniki_max_czestotliwosc = $_POST['czujniki_max_czestotliwosc'];
				$czujniki_klasa_szczelnosci = $_POST['czujniki_klasa_szczelnosci'];
				$czujniki_min_nap_zasilania_a = $_POST['czujniki_min_nap_zasilania_a'];
				$czujniki_min_nap_zasilania_b = $_POST['czujniki_min_nap_zasilania_b'];
				$czujniki_max_nap_zasilania_c = $_POST['czujniki_max_nap_zasilania_c'];
				$czujniki_max_nap_zasilania_d = $_POST['czujniki_max_nap_zasilania_d'];
				$czujniki_obudowa = $_POST['czujniki_obudowa'];
				$czujniki_min_max_prad_pracy = $_POST['czujniki_min_max_prad_pracy'];
				$czujniki_max_max_prad_pracy = $_POST['czujniki_max_max_prad_pracy'];
				$czujniki_min_cena = $_POST['czujniki_min_cena'];
				$czujniki_max_cena = $_POST['czujniki_max_cena'];


				$zapytanie_wysz_czujniki =
				"SELECT
				pc.kod_produktu, pc.producent, pc.typ_czujnika, pc.czestotliwosc_czujnika, pc.klasa_szczelnosci,
				pc.min_nap_zas_dc, pc.max_nap_zas_dc, pc.obudowa_czujnika, pc.prad_pracy_max, pc.cena 
				FROM parametry_czujniki AS pc WHERE 
				producent ='".$czujniki_producent."' AND 
				typ_czujnika ='".$czujniki_typ."' AND
				czestotliwosc_czujnika BETWEEN ".$czujniki_min_czestotliwosc." AND ".$czujniki_max_czestotliwosc." AND
				klasa_szczelnosci = '".$czujniki_klasa_szczelnosci."' AND
				min_nap_zas_dc BETWEEN ".$czujniki_min_nap_zasilania_a." AND ".$czujniki_min_nap_zasilania_b." AND
				max_nap_zas_dc BETWEEN ".$czujniki_max_nap_zasilania_c." AND ".$czujniki_max_nap_zasilania_d." AND
				obudowa_czujnika = '".$czujniki_obudowa."' AND
				prad_pracy_max BETWEEN ".$czujniki_min_max_prad_pracy." AND ".$czujniki_max_max_prad_pracy." AND
				cena BETWEEN ".$czujniki_min_cena." AND ".$czujniki_max_cena;
								

				if ($wynik = $connect->query($zapytanie_wysz_czujniki)) {
				    				
									}
									else {
									    echo $connect->error;
									}				
			echo '<table id="tabela-wyniki-wyszukiwania-czujniki" class="display compact" style="width: 100%">';
				echo "<thead>
						<tr>
			                <th>Kod produktu</th>
			                <th>Producent</th>
			                <th>Typ czujnika</th>
			                <th>Czestotliwosc</th>
			                <th>Klasa szczelnosci</th>
			                <th>Min napięcie zasilania DC</th>
			                <th>Maks napięcie zasilania DC</th>
			                <th>Obudowa</th>
			                <th>Maks prad pracy</th>
			                <th>Cena</th>							
						</tr>
					</thead>
			        <tbody>";
			        	if ($wynik->num_rows > 0) {
							while ($row = $wynik->fetch_assoc()) {
			            echo "<tr>
			                <td>".$row["kod_produktu"]."</td>
			                <td>".$row["producent"]."</td>
			                <td>".$row["typ_czujnika"]."</td>
			                <td>".$row["czestotliwosc_czujnika"]."</td>
			                <td>".$row["klasa_szczelnosci"]."</td>
			                <td>".$row["min_nap_zas_dc"]."</td>
			                <td>".$row["max_nap_zas_dc"]."</td>
			                <td>".$row["obudowa_czujnika"]."</td>
			                <td>".$row["prad_pracy_max"]."</td>
			                <td>".$row["cena"]."</td> 
			            </tr>";
                    }
				}
				else{
					echo '<div class="alert alert-warning" role="alert">Nie znaleziono wynikow!</div>';
				}
			        echo "</tbody>					
				</table>";
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
    $('#tabela-wyniki-wyszukiwania-czujniki').DataTable();
} );
</script>
</body>
</html>