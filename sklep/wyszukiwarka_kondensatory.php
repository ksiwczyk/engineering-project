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
			<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				</ol>
			<div class="carousel-inner" role="listbox">
			<div class="carousel-item active">
				<img class="d-block img-fluid" src="photo/1.png" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block img-fluid" src="photo/2.png" alt="Second slide">
			</div>
			</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Wstecz</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Nastepny</span>
				</a>
			</div>
		</div>
<!-- Koszyk -->
		<div class="col-md-3">
			<div class="card border-dark mb-3 my-4" style="max-width: 18rem;">
				<div class="card-header">Koszyk</div>
					<div class="card-body text-dark">
						<h5 class="card-title">Wartość koszyka:</h5>
							<p class="card-text">Liczba przedmiotów:</p>
							<a href="#" class="btn btn-primary">Zobacz wiecej informacji o zawartosci</a>
					</div>
				</div>


<!-- Moje konto -->
			<div class="card border-dark mb-3 my-4" style="max-width: 18rem;">
				<div class="card-header">Moje konto</div>
					<div class="card-body text-dark">
						<h5 class="card-title">Informacje o koncie</h5>
						<p class="card-text">Login:</p>
						<p class="card-text">Email:</p>
					</div>
				</div>        
		</div>
	<div class="offset-md-3 col-md-6 row">
		<div class="col-md-12"><h2>WYSZUKIWARKA</h2><br><h5>Kategoria: kondensatory</h5></div>
			<form action="wyniki-wyszukiwania-kondensatory.php" method="POST">
			  <div class="form-row align-items-center">
			    <div class="col-auto my-1">
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Producent</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_producent">
			          <option value="SAMWHA" selected>SAMWHA</option>
			          <option value="PANASONIC">PANASONIC</option>
			          <option value="VISHAY">VISHAY</option>
			          <option value="NICHION">NICHION</option>		          		   
			        </select>
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Typ</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_typ">
			          <option value="elektrolityczny" selected>elektrolityczny</option>
			        </select>        
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Minimalny czas zycia</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_min_zycie">
			          <option value="0" selected>0</option>
			          <option value="500">500</option>
			          <option value="1000">1000</option>
			          <option value="2000">2000</option>
			          <option value="5000">5000</option>
			          <option value="10000">10000</option>
			          <option value="20000">20000</option>				         
			        </select>        
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Maksymalny czas zycia</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_max_zycie">
			          <option value="0" selected>0</option>
			          <option value="500">500</option>
			          <option value="1000">1000</option>
			          <option value="2000">2000</option>
			          <option value="5000">5000</option>
			          <option value="10000">10000</option>
			          <option value="20000">20000</option>	
			        </select>        
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Montaz kondensatora</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_montaz">
			          <option value="THT" selected>THT</option>
			        </select>        
			      </div>			      
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Napiecie pracy</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_napiecie_pracy">
			          <option value="400 VDC" selected>400 VDC</option>
			          <option value="50 VDC">50 VDC</option>
			          <option value="25 VDC">25 VDC</option>
			          <option value="35 VDC">35 VDC</option>
			          <option value="100 VDC">100 VDC</option>			         
			          <option value="10 V">10 V</option>    
			        </select>            
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Minimalna pojemnosc</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_min_poj">
			          <option value="0" selected>0</option>
			          <option value="1000">1000</option>
			          <option value="2500">2500</option>
			          <option value="4000">4000</option>
			          <option value="6000">6000</option>
			        </select>              
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Maksymalna pojemnosc</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_max_poj">
			          <option value="0" selected>0</option>
			          <option value="1000">1000</option>
			          <option value="2500">2500</option>
			          <option value="4000">4000</option>
			          <option value="6000">6000</option>
			        </select>          
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Minimalny raster wprowadzeń</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_min_raster">
			          <option value="0" selected>0</option>
			          <option value="2.5">2.5</option>
			          <option value="5">5</option>
			          <option value="7.5">7.5</option>
			          <option value="10">10</option>
			        </select>              
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Maksymalny raster wprowadzeń</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_max_raster">
			          <option value="0" selected>0</option>
			          <option value="2.5">2.5</option>
			          <option value="5">5</option>
			          <option value="7.5">7.5</option>
			          <option value="10">10</option>
			        </select>          
			      </div>			      
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Rodzaj montazu</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_rodzaj_montaz">
			          <option value="niskoimpedancyjny" selected>niskoimpedancyjny</option>
			          <option value="bipolarny">bipolarny</option>		          
			        </select>        
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Min Min temperatura</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_min_min_temp">
			          
			          <option value="-20" selected>-20</option>
			          <option value="-40">-40</option>
			          <option value="-60">-60</option>
			          <option value="-80">-80</option>
			          <option value="-100">-100</option>
			        </select>              
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Max Min temperatura</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_max_min_temp">         
			          <option value="-20" selected>-20</option>
			          <option value="-40">-40</option>
			          <option value="-60">-60</option>
			          <option value="-80">-80</option>
			          <option value="-100">-100</option>
			        </select>              
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Min Max temperatura</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_min_max_temp">
			          <option value="70" selected>70</option>
			          <option value="90">90</option>
			          <option value="120">120</option>
			          <option value="150">150</option>
			          <option value="200">200</option>
			        </select>
			       </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Max Max temperatura</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_max_max_temp">
			          <option value="70" selected>70</option>
			          <option value="90">90</option>
			          <option value="120">120</option>
			          <option value="150">150</option>
			          <option value="200">200</option>
			        </select>
			       </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Cena mininalna</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_min_cena">
			          <option value="0" selected>0</option>
			          <option value="10">10</option>
			          <option value="20">20</option>
			          <option value="30">30</option>
			          <option value="40">40</option>
			          <option value="50">50</option>
			          <option value="60">60</option>
			          <option value="70">70</option>
			          <option value="80">80</option>
			          <option value="90">90</option>
			          <option value="100">100</option>
			          <option value="1000">1000</option>
			        </select>
			      </div>
			      <div class="form-group">
			        <label class="mr-sm-2" for="inlineFormCustomSelect">Cena maksymalna</label>
			        <select class="custom-select mr-sm-2" name="kondensatory_max_cena">
			          <option value="0" selected>0</option>
			          <option value="10">10</option>
			          <option value="20">20</option>
			          <option value="30">30</option>
			          <option value="40">40</option>
			          <option value="50">50</option>
			          <option value="60">60</option>
			          <option value="70">70</option>
			          <option value="80">80</option>
			          <option value="90">90</option>
			          <option value="100">100</option>
			          <option value="1000">1000</option>
			        </select>        
			      </div>
			      <div>
			        <button type="submit" class="btn btn-primary">Wyszukaj</button>
			      </div>
			    </div>
			</form>		
	</div>
</div>
<!-- Koniec - Zawartosc -->
</div>



<!-- Jquery JS-->
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/jquery-validate/jquery.validate.min.js"></script>
<script src="vendor/bootstrap-wizard/bootstrap.min.js"></script>
<script src="vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="vendor/datepicker/moment.min.js"></script>
<script src="vendor/datepicker/daterangepicker.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>

</body>
</html>