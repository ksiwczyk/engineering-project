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
			<h5>Kategoria: diody</h5>		
		</div>
<!-- Wybierz klienta po id -->
	<div class="col-md-6 col-sm-12">
		<div class="wprowadz-kod-produktu">
			<div class="border border-dark rounded m-4 p-3">
				<form action="produkty-modyfikacja-diody.php" method="post">
					<div class="form-group p-3">
						<input class="form-control" type="text" placeholder="Podaj kod produktu, aby wyswietlic produkt" name="kod_produktu_szukaj">	
					</div>
					<div class="form-group p-1">
						<button type="submit" class="btn btn-primary">Wyślij</button>	
					</div>			
				</form>
			</div>	
		</div>
		<div class="obecne-dane-produkt m-4 p-3 col-sm-12">
			<?php
    			if(isset($_POST["kod_produktu_szukaj"])) {
        		$kod_produktu = $_POST["kod_produktu_szukaj"];
         
        	require('db_data.php');
         
        	$zapytanie_wysz_baterie = 
					"SELECT 
					pd.kod_produktu,pd.producent,pd.typ_diody,pd.czas_gotowosci,pd.montaz_diody,pd.max_napiecie_przewodzenia,pd.max_nap_wst_diody,pd.obudowa_diody,pd.cena,pd.opis_produkt from parametry_diody AS pd where 
					kod_produktu='".$kod_produktu."'";
	             
	            $wynik = $connect->query($zapytanie_wysz_baterie);
	             
            if($wynik->num_rows > 0) {
                while ($row = $wynik->fetch_assoc()) {
	                $kod_produktu = $row['kod_produktu'];
	                $producent = $row['producent'];
	                $typ_diody = $row['typ_diody'];
	                $czas_gotowosci = $row['czas_gotowosci'];
	                $montaz_diody = $row['montaz_diody'];
	                $max_napiecie_przewodzenia = $row['max_napiecie_przewodzenia'];
	                $max_nap_wst_diody = $row['max_nap_wst_diody'];
	                $obudowa_diody = $row['obudowa_diody'];
	                $cena = $row['cena'];
	                $opis_produkt = $row['opis_produkt'];
	        	echo '<h4>Obecne dane diody:</h4><br>';
	        	echo "<h6>Kod produktu: ".$kod_produktu."</h6>
	                Producent: " .$producent."
	                <br>
	                Typ diody: " .$typ_diody."
	                <br>
	                Napiecie znamionowe: " .$czas_gotowosci."
	                <br>
	                Montaz diody: " .$montaz_diody."
	                <br>
	                Prad maksymalny: " .$max_napiecie_przewodzenia."
	                <br>
	                Prad znamionowy: " .$max_nap_wst_diody."
	                <br>
	                Obudowa diody: ".$obudowa_diody."
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
	<div class="col-md-6 col-sm-12">
		<div class="card border-dark m-4 p-3">
				<div class="card-header" style="background-color: white;">
					<form action="produkty-modyfikacja-baterie.php" method="post">
						<h4>Modyfikacja danych</h4>   
						<div class="form-group">
							<label>Producent:</label>
							<br>
							<input type="text" class="w-50" name="new_producent" value="<?php if(isset($producent)) echo $producent;?>">
						</div>
						<div class="form-group">
							<label>Typ diody:</label>
							<br>
							<input type="text" class="w-50" name="new_typ_diody" value="<?php if(isset($typ_diody)) echo $typ_diody;?>">
						</div>
						<div class="form-group">
							<label>Napiecie znamionowe:</label>
							<br>
							<input type="text" class="w-50" name="new_czas_gotowosci" value="<?php if(isset($czas_gotowosci)) echo $czas_gotowosci;?>">
						</div>
						<div class="form-group">
							<label>Montaz diody</label>
							<br>
							<input type="text" class="w-50" name="new_montaz_diody" value="<?php if(isset($montaz_diody)) echo $montaz_diody;?>">
						</div>
						<div class="form-group">
							<label>Prad maksymalny:</label>
							<br>
							<input type="text" class="w-50" name="new_max_napiecie_przewodzenia" value="<?php if(isset($max_napiecie_przewodzenia)) echo $max_napiecie_przewodzenia;?>">
						</div>
						<div class="form-group">
							<label>Prad znamionowy:</label>
							<br>
							<input type="text" class="w-50" name="new_max_nap_wst_diody" value="<?php if(isset($max_nap_wst_diody)) echo $max_nap_wst_diody;?>">
						</div>
						<div class="form-group">
							<label>Obudowa diody:</label>
							<br>
							<input type="text" class="w-50" name="new_obudowa_diody" value="<?php if(isset($obudowa_diody)) echo $obudowa_diody;?>">
						</div>
						<div class="form-group">
							<label>Cena:</label>
							<br>
							<input type="text" class="w-50" name="new_cena" value="<?php if(isset($cena)) echo $cena;?>">
						</div>
						<div class="form-group">
							<label>Opis:</label>
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
		                	$typ_diody = $_POST['new_typ_diody'];
		                	$czas_gotowosci = $_POST['new_czas_gotowosci'];
		                	$montaz_diody = $_POST['new_montaz_diody'];
		                	$max_napiecie_przewodzenia = $_POST['new_max_napiecie_przewodzenia'];
		                	$max_nap_wst_diody = $_POST['new_max_nap_wst_diody'];
		                	$obudowa_diody = $_POST['new_obudowa_diody'];
		                	$cena = $_POST['new_cena'];
		                	$opis_produkt = $_POST['new_opis_produkt'];
		                	$kod_produktu = $_POST['kod_produktu'];

		               $zapytanie_update_dane_diody = 
                       "UPDATE parametry_baterie SET producent='".$producent."', typ_diody='".$typ_diody."', czas_gotowosci='".$czas_gotowosci."', montaz_diody='".$montaz_diody."',max_napiecie_przewodzenia='".$max_napiecie_przewodzenia."',
                       max_nap_wst_diody='".$max_nap_wst_diody."', cena='".$cena."', opis_produkt='".$opis_produkt."' 
                       where 
                       kod_produktu='".$kod_produktu."'";

						//echo "<div class="alert alert-success" role="alert">Zmieniono pomyslnie!</div>";
						$connect->query($zapytanie_update_dane_diody);
						
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