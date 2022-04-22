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
		<div class="col-md-12">
			<h3 style="margin-top: 20px;">Modyfikacja danych produktu</h3>
			<h5>Kategoria: kondensatory</h5>		
		</div>
<!-- Wybierz klienta po id -->
	<div class="col-md-6">
		<div class="wprowadz-kod-produktu">
			<div class="border border-dark rounded m-4 p-3">
				<form action="produkty-modyfikacja-kondensatory.php" method="post">
					<div class="form-group p-3">
						<input class="form-control" type="text" placeholder="Podaj kod produktu, aby wyswietlic produkt" name="kod_produktu_szukaj">	
					</div>
					<div class="form-group p-1">
						<button type="submit" class="btn btn-primary">Wyślij</button>	
					</div>			
				</form>
			</div>	
		</div>
		<div class="obecne-dane-produkt m-4 p-3">
			<?php
    			if(isset($_POST["kod_produktu_szukaj"])) {
        		$kod_produktu = $_POST["kod_produktu_szukaj"];
         
        	require('db_data.php');
         
        	$zapytanie_wysz_kondensatory = 
					"SELECT 
					pk.kod_produktu,pk.producent,pk.rodzaj_kondensatora,pk.czas_zycia,pk.montaz,pk.nap_pracy_kondensatora,pk.pojemnosc_kondensatora,pk.raster_wprowadzen,
					pk.rodzaj_montazu, pk.min_temp, pk.max_temp, pk.cena,pk.opis_produkt from parametry_kondensatory AS pk where 
					kod_produktu='".$kod_produktu."'";
	             
	            $wynik = $connect->query($zapytanie_wysz_kondensatory);
	             
            if($wynik->num_rows > 0) {
                while ($row = $wynik->fetch_assoc()) {
	                $kod_produktu = $row['kod_produktu'];
	                $producent = $row['producent'];
	                $rodzaj_kondensatora = $row['rodzaj_kondensatora'];
	                $czas_zycia = $row['czas_zycia'];
	                $montaz = $row['montaz'];
	                $nap_pracy_kondensatora = $row['nap_pracy_kondensatora'];
	                $pojemnosc_kondensatora = $row['pojemnosc_kondensatora'];
	                $raster_wprowadzen = $row['raster_wprowadzen'];
	                $rodzaj_montazu = $row['rodzaj_montazu'];
	                $min_temp = $row['min_temp'];
	                $max_temp = $row['max_temp'];
	                $cena = $row['cena'];
	                $opis_produkt = $row['opis_produkt'];
	        	echo '<h4>Obecne dane kondensatora:</h4><br>';
	        	echo "<h6>Kod produktu: ".$kod_produktu."</h6>
	                Producent: " .$producent."
	                <br>
	                Rodzaj kondensatora: " .$rodzaj_kondensatora."
	                <br>
	                Czas zycia: " .$czas_zycia."
	                <br>
	                Montaż: " .$montaz."
	                <br>
	                Napięcie pracy kondensatora: " .$nap_pracy_kondensatora."
	                <br>
	                Pojemność kondensatora: " .$pojemnosc_kondensatora."
	                <br>
	                Raster wprowadzeń: " .$raster_wprowadzen."
	                <br>
	                Rodzaj montażu: " .$rodzaj_montazu."
	                <br>
	                Minimalna temperatura: " .$min_temp."
	                <br>
	                Maksymalna temperatura: " .$max_temp."
	                <br>
	                Cena: " .$cena."
	                <br>
	                Opis produkt: " .$opis_produkt."
	                <br>";
	                }
	            }
            else echo "<h6>Brak produktu o podanym kodzie</h6>";
            $connect->close();
    }
?>		
		</div>		
	</div>				
	<div class="col-md-6">
		<div class="card border-dark" style="padding: 20px; min-width: 500px; margin: 25px;">
				<div class="card-header" style="background-color: white;">
					<form action="produkty-modyfikacja-baterie.php" method="post">
						<h4>Modyfikacja danych</h4>
						<br>    
						<div class="form-group">
							<label>Producent:</label>
							<br>
							<input type="text" class="w-50" name="new_producent" value="<?php if(isset($producent)) echo $producent;?>">
						</div>
						<div class="form-group">
							<label>Rodzaj kondensatora:</label>
							<br>
							<input type="text" class="w-50" name="new_rodzaj_kondensatora" value="<?php if(isset($rodzaj_kondensatora)) echo $rodzaj_kondensatora;?>">
						</div>
						<div class="form-group">
							<label>Czas życia:</label>
							<br>
							<input type="text" class="w-50" name="new_czas_zycia" value="<?php if(isset($czas_zycia)) echo $czas_zycia;?>">
						</div>
						<div class="form-group">
							<label>Montaż:</label>
							<br>
							<input type="text" class="w-50" name="new_montaz" value="<?php if(isset($montaz)) echo $montaz;?>">
						</div>
						<div class="form-group">
							<label>Napięcie pracy kondensatora:</label>
							<br>
							<input type="text" class="w-50" name="new_nap_pracy_kondensatora" value="<?php if(isset($nap_pracy_kondensatora)) echo $nap_pracy_kondensatora;?>">
						</div>
						<div class="form-group">
							<label>Pojemność kondensatora:</label>
							<br>
							<input type="text" class="w-50" name="new_pojemnosc_kondensatora" value="<?php if(isset($pojemnosc_kondensatora)) echo $pojemnosc_kondensatora;?>">
						</div>
						<div class="form-group">
							<label>Raster wprowadzeń:</label>
							<br>
							<input type="text" class="w-50" name="new_raster_wprowadzen" value="<?php if(isset($raster_wprowadzen)) echo $raster_wprowadzen;?>">
						</div>
						<div class="form-group">
							<label>Rodzaj montażu:</label>
							<br>
							<input type="text" class="w-50" name="new_rodzaj_montazu" value="<?php if(isset($rodzaj_montazu)) echo $rodzaj_montazu;?>">
						</div>
						<div class="form-group">
							<label>Minimalna temperatura:</label>
							<br>
							<input type="text" class="w-50" name="new_min_temp" value="<?php if(isset($min_temp)) echo $min_temp;?>">
						</div>
						<div class="form-group">
							<label>Maksymalna temperatura</label>
							<br>
							<input type="text" class="w-50" name="new_max_temp" value="<?php if(isset($max_temp)) echo $max_temp;?>">
						</div>
						<div class="form-group">
							<label>Cena</label>
							<br>
							<input type="text" class="w-50" name="new_cena" value="<?php if(isset($cena)) echo $cena;?>">
						</div>
						<div class="form-group">
							<label>Opis</label>
							<br>
							<input type="text" class="w-50" name="new_opis_produkt" value="<?php if(isset($opis_produkt)) echo $opis_produkt;?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="produkt_kondensatory_zmien_dane">Zmień dane</button>
						</div>
							<input type="hidden" name="kod_produktu" value="<?php if(isset($kod_produktu)) echo $kod_produktu;?>">
					</form>
					<?php

						if(isset($_POST["produkt_kondensatory_zmien_dane"])) {
							require('db_data.php');
		                	$producent = $_POST['new_producent'];
		                	$rodzaj_kondensatora = $_POST['new_rodzaj_kondensatora'];
		                	$czas_zycia = $_POST['new_czas_zycia'];
		                	$montaz = $_POST['new_montaz'];
		                	$nap_pracy_kondensatora = $_POST['new_nap_pracy_kondensatora'];
		                	$pojemnosc_kondensatora = $_POST['new_pojemnosc_kondensatora'];
		                	$raster_wprowadzen = $_POST['new_raster_wprowadzen'];
		                	$rodzaj_montazu = $_POST['new_rodzaj_montazu'];
		                	$min_temp = $_POST['new_min_temp'];
		                	$max_temp = $_POST['new_max_temp'];
		                	$cena = $_POST['new_cena'];
		                	$opis_produkt = $_POST['new_opis_produkt'];
		                	$kod_produktu = $_POST['kod_produktu'];

		               $zapytanie_update_dane_kondensatory = 
                       "UPDATE 
                       parametry_kondensatory SET producent='".$producent."', 
                       rodzaj_kondensatora='".$rodzaj_kondensatora."', 
                       czas_zycia='".$czas_zycia."', 
                       montaz='".$montaz."',
                       nap_pracy_kondensatora='".$nap_pracy_kondensatora."',
                       pojemnosc_kondensatora='".$pojemnosc_kondensatora."',
                       raster_wprowadzen='".$raster_wprowadzen."',
                       rodzaj_montazu='".$rodzaj_montazu."',
                       min_temp='".$min_temp."',
                       max_temp='".$max_temp."', 
                       cena='".$cena."', 
                       opis_produkt='".$opis_produkt."' 
                       where 
                       kod_produktu='".$kod_produktu."'";

						//echo "<div class="alert alert-success" role="alert">Zmieniono pomyslnie!</div>";
						$connect->query($zapytanie_update_dane_kondensatory);
						
						if($connect->affected_rows == 1) {
						    echo "Udało się!";
						}
						else {
						   	echo "Coś poszło nie tak!";
}
					}
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