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
		<div class="col-md-3 pasek-boczny">
			<div class="col-md-12">
				<h3 class="my-4">Zakladki</h3>
				<div class="list-group">
					<a href="#" class="list-group-item">Moje zamowienia</a>
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
<!-- Koszyk - informacje -->


			<?php
				
				require_once 'db_data.php';
				
				include 'shop.php';
				$shop = new SHOP_SYSTEM();
				
				//pobieranie loginu użytkownika: $shop->getUser();
				
				//sprawdzanie czy koszyk jest, jak nie - stwórz
				$shop->createWallet($connect, $shop->getUser());
				
				$wallet = $shop->getWallet($connect, $shop->getUser());
				
			?>
			

		<div class="col-md-6">		
			<h4 style="margin-top: 10px; ">Koszyk</h4>
					
						<?php
						
						//czyszczenie koszyka
						if(@$_POST['clearCart']){
							$connect->query("UPDATE `koszyk` SET `id_produkt` = '' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
							$connect->query("UPDATE `koszyk` SET `ilość` = '0' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
							$connect->query("UPDATE `koszyk` SET `wartość_koszyk` = '0' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
							header('Location: koszyk.php');
						}
						
							//string do rozdzielenia
							$data = $wallet['id_produkt'];
							$cartData = array_filter(explode(',', $data));
							
							if(count($cartData) > 0){
								echo '
								<table class="table table-striped table-bordered table-sm" cellpadding="0" width="100%">
								<thead>
									<th class="th-sm">#</th>
									<th class="th-sm">Kod produktu</th>
									<th class="th-sm">Producent</th>
									<th class="th-sm">Kategoria</th>
									<th class="th-sm">Cena</th>
								</thead>
								<tbody>
								';
								for($x = 0; $x < count($cartData); $x++){
									
									$cattegory = "";
									$code = $cartData[$x];
									$firm = "";
									$price = "";
									
									//pobeiranie tabel z produktami i dopasowanie kodu + pobranie kategorii
									$parametry_baterie = $connect->query("SELECT * FROM `parametry_baterie`  WHERE `kod_produktu` = '".$code."'");
									$baterie = $parametry_baterie->fetch_assoc();
									
									$parametry_czujniki = $connect->query("SELECT * FROM `parametry_czujniki`  WHERE `kod_produktu` = '".$code."'");
									$czujniki = $parametry_czujniki->fetch_assoc();
									
									$parametry_diody = $connect->query("SELECT * FROM `parametry_diody`  WHERE `kod_produktu` = '".$code."'");
									$diody = $parametry_diody->fetch_assoc();
									
									$parametry_kondensatory = $connect->query("SELECT * FROM `parametry_kondensatory`  WHERE `kod_produktu` = '".$code."'");
									$kondensatory = $parametry_kondensatory->fetch_assoc();
									
									if($baterie['kod_produktu'] == $code){
										$getCattegory = $connect->query("SELECT * FROM `kategoria` WHERE `id_kategoria` = '".$baterie['id_kategoria']."'");
										$cattegory = $getCattegory->fetch_assoc();
										$cattegory = $cattegory['typ_kategoria'];
										$firm = $baterie['producent'];
										$price = $baterie['cena'];
									}
									
									if($czujniki['kod_produktu'] == $code){
										$getCattegory = $connect->query("SELECT * FROM `kategoria` WHERE `id_kategoria` = '".$czujniki['id_kategoria']."'");
										$cattegory = $getCattegory->fetch_assoc();
										$cattegory = $cattegory['typ_kategoria'];
										$firm = $czujniki['producent'];
										$price = $czujniki['cena'];
									}
									
									if($diody['kod_produktu'] == $code){
										$getCattegory = $connect->query("SELECT * FROM `kategoria` WHERE `id_kategoria` = '".$diody['id_kategoria']."'");
										$cattegory = $getCattegory->fetch_assoc();
										$cattegory = $cattegory['typ_kategoria'];
										$firm = $diody['producent'];
										$price = $diody['cena'];
									}
									
									if($kondensatory['kod_produktu'] == $code){
										$getCattegory = $connect->query("SELECT * FROM `kategoria` WHERE `id_kategoria` = '".$kondensatory['id_kategoria']."'");
										$cattegory = $getCattegory->fetch_assoc();
										$cattegory = $cattegory['typ_kategoria'];
										$firm = $kondensatory['producent'];
										$price = $kondensatory['cena'];
									}
									
									echo '
										<tr>
											<td>'.($x+1).'</td>
											<td>'.$code.'</td>
											<td>'.$firm.'</td>
											<td>'.$cattegory.'</td>
											<td>'.$price.'</td>
										</tr>
									';
								}
								echo '
									</tbody>
								</table>
								';
							}else{
								echo '<br/>Brak produktów w koszyku!<br/><br/>';
							}
							
							
						?>
						
				<h5>Wartość koszyka: <?php echo $wallet['wartość_koszyk']; ?> zł </h5>
				
				<form action="koszyk.php" method="POST">
					<div class="form-group">
						<input type="submit" name="clearCart" class="btn btn-danger btn-lg" value="Wyczyść Koszyk"/>					
					</div>
				</form>	
				
				<?php
				if(count($cartData) > 0){
					echo '
						<form action="zamówienie-formularz.php" method="POST">
							<div class="form-group">
								<input type="submit" name="ordernow" class="btn btn-success btn-lg" value="Zamawiam!"/>					
							</div>
						</form>	
					';
				}
				?>
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