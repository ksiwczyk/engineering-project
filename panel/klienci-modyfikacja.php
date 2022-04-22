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
			<h3 style="margin-top: 20px;">Modyfikacja danych klienta</h3>		
		</div>
<!-- Wybierz klienta po id -->
	<div class="col-md-6">
		<div class="wprowadz-id-klient">
			<div class="border border-dark rounded m-4 p-3">
				<form action="klienci-modyfikacja.php" method="post">
					<div class="form-group p-3">
						<input class="form-control" type="text" placeholder="Podaj ID, aby wyświetlić dane klienta" name="id_klient_szukaj">	
					</div>
					<div class="form-group p-1">
						<button type="submit" class="btn btn-primary">Wyślij</button>	
					</div>			
				</form>
			</div>	
		</div>
		<div class="obecne-dane-klient m-4 p-3">
			<?php
    			if(isset($_POST["id_klient_szukaj"])) {
        		$id_klient = $_POST["id_klient_szukaj"];
         
        	require('db_data.php');
         
        	$zapytanie_obecne_dane_klient =
	            "SELECT klient.id_klient,klient.login, klient.imie, klient.nazwisko, klient.numer_telefonu, klient.email
	            from dane_klient AS klient
	            where id_klient = '".$id_klient."'";
	             
	            $wynik = $connect->query($zapytanie_obecne_dane_klient);
	             
            if($wynik->num_rows > 0) {
                while ($row = $wynik->fetch_assoc()) {
	                $login = $row['login'];
	                $imie = $row['imie'];
	                $nazwisko = $row['nazwisko'];
	                $numer_telefonu = $row['numer_telefonu'];
	                $email = $row['email'];
	        	echo '<h4>Obecne dane klienta:</h4><br>';
	        	echo "<h6>ID klienta: ".$id_klient."</h6>
	                Login: " .$login."
	                <br>
	                Imie: " .$imie."
	                <br>
	                Nazwisko: " .$nazwisko."
	                <br>
	                Numer telefonu: " .$numer_telefonu."
	                <br>
	                E-mail: " .$email."
	                <br>";
	                }
	            }
            else echo "<h6>Brak klienta o podanym ID</h6>";
            $connect->close();
    }
?>		
		</div>		
	</div>				
	<div class="col-md-6">
		<div class="card border-dark" style="padding: 20px; min-width: 500px; margin: 25px;">
				<div class="card-header" style="background-color: white;">
					<form action="klienci-modyfikacja.php" method="post">
						<h4>Modyfikacja danych</h4>
						<br>
						<div class="form-group">
       						<label>Login:</label>
       						<br>
       						<input type="text" name="new_login" value="<?php if(isset($login)) echo $login;?>">
    					</div>    
						<div class="form-group">
							<label>Imie:</label>
							<br>
							<input type="text" name="new_imie" value="<?php if(isset($imie)) echo $imie;?>">
						</div>
						<div class="form-group">
							<label>Nazwisko:</label>
							<br>
							<input type="text" name="new_nazwisko" value="<?php if(isset($nazwisko)) echo $nazwisko;?>">
						</div>
						<div class="form-group">
							<label>Numer telefonu:</label>
							<br>
							<input type="text" name="new_numer_telefonu" value="<?php if(isset($numer_telefonu)) echo $numer_telefonu;?>">
						</div>
						<div class="form-group">
							<label>E-mail</label>
							<br>
							<input type="text" name="new_email" value="<?php if(isset($email)) echo $email;?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="klient_zmien_dane">Zmień dane</button>
						</div>
							<input type="hidden" name="id_klient" value="<?php if(isset($id_klient)) echo $id_klient;?>">
					</form>
					<?php

						if(isset($_POST["klient_zmien_dane"])) {
							require('db_data.php');
        					$login = $_POST['new_login'];
		                	$imie = $_POST['new_imie'];
		                	$nazwisko = $_POST['new_nazwisko'];
		                	$numer_telefonu = $_POST['new_numer_telefonu'];
		                	$email = $_POST['new_email'];
		                	$id_klient = $_POST['id_klient'];

		               $zapytanie_update_dane_klient = 
                       "UPDATE dane_klient SET login='".$login."', imie='".$imie."', nazwisko='".$nazwisko."', numer_telefonu='".$numer_telefonu."', email='".$email."' where id_klient= '".$id_klient."'";

						//echo "<div class="alert alert-success" role="alert">Zmieniono pomyslnie!</div>";
						$connect->query($zapytanie_update_dane_klient);
						
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