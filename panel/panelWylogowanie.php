
<!DOCTYPE html>
<html>
<head>
	<title>Wylogowanie się z panelu administratora</title>

<!-- Style -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">

</head>
<body>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="wylogowanie">
			<div class="card">
			  <div class="card-header">
			    Panel administratora - wylogowanie
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">Potwierdzenie wylogowania</h5>
			    <p class="card-text">Czy na pewno chcesz wylogować sie z panelu? Jeśli tak wciśnij przycisk wyloguj. Jeśli nie wciśnij przycisk "Wróc do panelu".</p>
			    <form class="mb-2" action="logout.php" method="post">
			    	<button name="buttonWylogujPanel" type="submit" class="btn btn-success">Wyloguj</button>
			    </form>
			    <a href="szybki-dostep.php" class="btn btn-primary">Wróć do panelu!</a>
			  </div>
			</div>	
		</div>
	</div>	
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
</script>
</body>
</html>