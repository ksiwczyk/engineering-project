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
			<h5>Kategoria: baterie</h5>		
		</div>
<!-- Wybierz klienta po id -->
	<div class="col-md-6">
		<div class="wprowadz-kod-produktu">
			<div class="border border-dark rounded m-4 p-3">
				<form action="produkty-modyfikacja-baterie.php" method="post">
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
         
        	$zapytanie_wysz_baterie = 
					"SELECT 
					pb.kod_produktu,pb.producent,pb.rodzaj,pb.napiecie_znam,pb.pojemnosc,pb.prad_max,pb.prad_znam,pb.cena,pb.opis_produkt from parametry_baterie AS pb where 
					kod_produktu='".$kod_produktu."'";
	             
	            $wynik = $connect->query($zapytanie_wysz_baterie);
	             
            if($wynik->num_rows > 0) {
                while ($row = $wynik->fetch_assoc()) {
	                $kod_produktu = $row['kod_produktu'];
	                $producent = $row['producent'];
	                $rodzaj = $row['rodzaj'];
	                $napiecie_znam = $row['napiecie_znam'];
	                $pojemnosc = $row['pojemnosc'];
	                $prad_max = $row['prad_max'];
	                $prad_znam = $row['prad_znam'];
	                $cena = $row['cena'];
	                $opis_produkt = $row['opis_produkt'];
	        	echo '<h4>Obecne dane baterii:</h4><br>';
	        	echo "<h6>Kod produktu: ".$kod_produktu."</h6>
	                Producent: " .$producent."
	                <br>
	                Rodzaj: " .$rodzaj."
	                <br>
	                Napiecie znamionowe: " .$napiecie_znam."
	                <br>
	                Pojemnosc: " .$pojemnosc."
	                <br>
	                Prad maksymalny: " .$prad_max."
	                <br>
	                Prad znamionowy: " .$prad_znam."
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
							<label>Rodzaj:</label>
							<br>
							<input type="text" class="w-50" name="new_rodzaj" value="<?php if(isset($rodzaj)) echo $rodzaj;?>">
						</div>
						<div class="form-group">
							<label>Napiecie znamionowe:</label>
							<br>
							<input type="text" class="w-50" name="new_napiecie_znam" value="<?php if(isset($napiecie_znam)) echo $napiecie_znam;?>">
						</div>
						<div class="form-group">
							<label>Pojemnosc</label>
							<br>
							<input type="text" class="w-50" name="new_pojemnosc" value="<?php if(isset($pojemnosc)) echo $pojemnosc;?>">
						</div>
						<div class="form-group">
							<label>Prad maksymalny</label>
							<br>
							<input type="text" class="w-50" name="new_prad_max" value="<?php if(isset($prad_max)) echo $prad_max;?>">
						</div>
						<div class="form-group">
							<label>Prad znamionowy</label>
							<br>
							<input type="text" class="w-50" name="new_prad_znam" value="<?php if(isset($prad_znam)) echo $prad_znam;?>">
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
							<button type="submit" class="btn btn-primary" name="produkt_baterie_zmien_dane">Zmień dane</button>
						</div>
							<input type="hidden" name="kod_produktu" value="<?php if(isset($kod_produktu)) echo $kod_produktu;?>">
					</form>
					<?php

						if(isset($_POST["produkt_baterie_zmien_dane"])) {
							require('db_data.php');
		                	$producent = $_POST['new_producent'];
		                	$rodzaj = $_POST['new_rodzaj'];
		                	$napiecie_znam = $_POST['new_napiecie_znam'];
		                	$pojemnosc = $_POST['new_pojemnosc'];
		                	$prad_max = $_POST['new_prad_max'];
		                	$prad_znam = $_POST['new_prad_znam'];
		                	$cena = $_POST['new_cena'];
		                	$opis_produkt = $_POST['new_opis_produkt'];
		                	$kod_produktu = $_POST['kod_produktu'];

		               $zapytanie_update_dane_baterie = 
                       "UPDATE parametry_baterie SET producent='".$producent."', rodzaj='".$rodzaj."', napiecie_znam='".$napiecie_znam."', pojemnosc='".$pojemnosc."',prad_max='".$prad_max."',
                       prad_znam='".$prad_znam."', cena='".$cena."', opis_produkt='".$opis_produkt."' 
                       where 
                       kod_produktu='".$kod_produktu."'";

						//echo "<div class="alert alert-success" role="alert">Zmieniono pomyslnie!</div>";
						$connect->query($zapytanie_update_dane_baterie);
						
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