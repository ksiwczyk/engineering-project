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
		<div class="col-md-6">
			<div class="dodaj-do-koszyka my-4 px-4 pt-4 border border-dark">
			
			
			<!-- Start szukania kodów i ich dodawania -->
			
			<?php
				
				require_once 'db_data.php';
				
				include 'shop.php';
				$shop = new SHOP_SYSTEM();
				
				//pobieranie loginu użytkownika: $shop->getUser();
				
				//sprawdzanie czy koszyk jest, jak nie - stwórz
				$shop->createWallet($connect, $shop->getUser());
				
				$getudata = $connect->query("SELECT * FROM `dane_klient` WHERE `login` = '".$shop->getUser()."'");
				$udata = $getudata->fetch_assoc();
				
				//funkcja dodawania do koszyka oraz wyszukiwania kodów
				if(isset($_POST['add_to_cart'])){
				
					if(@$_POST['dodaj-do-koszyka']){
						echo $shop->getFromCode($connect, $_POST['dodaj-do-koszyka'], $shop->getUser());
					}else{
						echo 'Musisz podać kod produktu!<br/><br/><div style="clear:both;"></div>';
					}
					
				}
				
				$wallet = $shop->getWallet($connect, $shop->getUser());
				
			?>
			
			
			
			<!-- Koniec szukania kodów i ich dodawania -->
			
			<h4>Dodaj do koszyka</h4>
				<p class="font-weight-normal">Podaj numer produktu z tabeli poniżej. Przedmiot zostanie wtedy dodany do koszyka</p>
				<form action="przeglad-oferty.php" method="POST">
					<div class="form-group">
						<label>Numer produktu:</label>
						<input type="text" name="dodaj-do-koszyka">					
					</div>
					<div class="form-group">
						<button type="submit" name="add_to_cart" class="btn btn-primary btn-lg">Dodaj do koszyka!</button>							
					</div>
				</form>				
			</div>
			<div class="tabela-wyniki-wyszukiwania my-4">
				<?php
					require("wys_lista_produktow-wszystkie.php")				
				?>
			</div>			
		</div>
		<div class="col-md-3">
			<div class="mini-info">
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
				            <p class="card-text">Login:  <?php echo $udata['login']; ?></p>
				            <p class="card-text">Email:  <?php echo $udata['email']; ?></p>
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
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#przeglad-oferty').DataTable();
} );
</script>
</body>
</html>