<?php

	session_start();
	
	error_reporting(0);
	
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
<!-- Kategorie -->
		<div class="col-md-3">
			<h3 class="my-4">Kategoria</h3>
				<div class="list-group">
					<a href="wyszukiwarka_baterie.html" class="list-group-item">Baterie</a>
					<a href="wyszukiwarka_czujniki.html" class="list-group-item">Czujniki</a>
					<a href="wyszukiwarka_diody.html" class="list-group-item">Diody</a>
					<a href="wyszukiwarka_kondensatory.html" class="list-group-item">Kondensatory</a>
				</div>      
		</div>
<!-- Koniec - kategorie -->
		<div class="col-md-6">
		
		
		<?php
				
				require_once 'db_data.php';
				
				include 'shop.php';
				$shop = new SHOP_SYSTEM();
				
				//pobieranie loginu użytkownika: $shop->getUser();
				
				$wallet = $shop->getWallet($connect, $shop->getUser());
				
				//string do rozdzielenia
				$data = $wallet['id_produkt'];
				$cartData = array_filter(explode(',', $data));
				
				$countOrder = count($cartData);
				
			?>
			
		
		
		
			<div class="card border-dark" style="padding: 20px; min-width: 500px; margin: 25px;">
				<div class="card-header" style="background-color: white;"><h5>Formularz zamówienia</h5></div>
					<?php
					$clientData = $shop->getUser();
					$getData = $connect->query("SELECT * FROM `dane_klient` WHERE `login` = '".$clientData."'");
					$clientData = $getData->fetch_assoc();
					$clientid = $clientData['id_klient'];
					$cartid = $wallet['id_koszyk'];
					
					if(@$_POST['order']){
						@$ulica = $_POST['ulica'];
						@$numer = $_POST['numer'];
						@$lokal = $_POST['lokal'];
						@$miasto = $_POST['miasto'];
						@$wojewodztwo = $_POST['wojewodztwo'];
						@$kodpocztowy = $_POST['kodpocztowy'];
						
						if($ulica && $numer && $lokal && $miasto && $wojewodztwo && $kodpocztowy){
							
							$connect->query("INSERT INTO `adres` (`id_klienta`, `ulica`, `numer`, `lokal`, `miasto`, `wojewodztwo`, `kod_pocztowy`, `id_koszyk`) VALUES ('".$clientid."', '".$ulica."', '".$numer."', '".$lokal."', '".$miasto."', '".$wojewodztwo."', '".$kodpocztowy."', '".$cartid."')");
							$connect->query("UPDATE `koszyk` SET `status` = '1' WHERE `id_koszyk` = '".$cartid."'");
							
							echo 'Zamówienie zostało poprawnie złożone! Za 5s nastąpi przekeirowanie!';
							header("refresh:2;url=przeglad-oferty.php");
							
						}else{
							echo 'Musisz podać wszystkei dane!';
						}
					}
					
					if($countOrder > 0){
						echo '
					<form action="zamówienie-formularz.php" method="post">
						<br>
					';
						$user = $shop->getUser();
	
						$getudata = $connect->query("SELECT * FROM `dane_klient` WHERE `login` = '".$user."'");
						$udata = $getudata->fetch_assoc();
	
					echo '
						<h6>Imie: '.$udata['imie'].'</h6><h6>Nazwisko: '.$udata['nazwisko'].'</h6><h6>E-mail: '.$udata['email'].'</h6><h6>Numer telefonu: '.$udata['numer_telefonu'].'</h6>
						<div class="form-group" style="margin-top: 10px;">
							<label>Ulica:</label>
							<br>
							<input type="text" name="ulica" style="min-width: 300px;" required autofocus>
						</div>
						<div class="form-group">
							<label>Numer:</label>
							<br>
							<input type="text" name="numer" style="min-width: 300px;" required>
						</div>
						<div class="form-group">
							<label>Lokal:</label>
							<br>
							<input type="text" name="lokal" style="min-width: 300px;" required>
						</div>
						<div class="form-group">
							<label>Miasto:</label>
							<br>
							<input type="text" name="miasto" style="min-width: 300px;" required>
						</div>
						<div class="form-group">
							<label>Województwo:</label>
							<br>
							<input type="text" name="wojewodztwo" style="min-width: 300px;" required>
						</div>
						<div class="form-group">
							<label>Kod pocztowy:</label>
							<br>
							<input type="text" name="kodpocztowy" style="min-width: 300px;" required>
						</div>

						<hr>

						
						<div>
							<input type="submit" name="order" class="btn btn-primary" value="Zamów"/>
						</div>
						
					</form>	
						';
					}else{
						header('Location: koszyk.php');
					}
					
					?>
			</div>
		</div>
<!-- Koszyk -->
		<div class="col-md-3">
			<div class="card border-dark mb-3 my-4" style="max-width: 18rem;">
				<div class="card-header">Koszyk</div>
					<div class="card-body text-dark">
				            <h5 class="card-title">Wartość koszyka: <?php echo $wallet['wartość_koszyk']; ?> zł</h5>
				              <p class="card-text">Liczba przedmiotów: <?php echo $wallet['ilość']; ?> </p>
				              <a href="koszyk.php" class="btn btn-primary">Zobacz wiecej informacji o zawartosci</a>
				          </div>
				</div>
<!-- Moje konto -->
			<div class="card border-dark mb-3 my-4" style="max-width: 18rem;">
				<div class="card-header">Moje konto</div>
					<div class="card-body text-dark">
						<h5 class="card-title">Informacje o koncie</h5>
						<div class="card-text">Login: <?php echo $udata['login']; ?></div>
						<div class="card-text">Email: <?php echo $udata['email']; ?></div>
					</div>
				</div>        
		</div>
</div>
<!-- Koniec - Zawartosc -->
</div>


<!-- Skrypty -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

</body>
</html>