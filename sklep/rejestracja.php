<!DOCTYPE html>
<html>
<head>
	<title>Rejestracja do sklepu internetowego</title>

<!-- Style -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">

</head>
<body>
<div class="container">
	<div class="row">
		<div class="justify-content-center row col">
			<div class="card border-dark" style="padding: 20px; min-width: 500px;">
				<div class="card-header" style="background-color: white;"><h3>Rejestracja</h3></div>
					<form action="rejestracja_skrypt.php" method="post">
						<div class="form-group">
							<label>Login:</label>
							<br>
							<input type="text" name="login" style="min-width: 300px;">
						</div>
						<div class="form-group">
							<label>Hasło:</label>
							<br>
							<input type="password" name="password" style="min-width: 300px;">
						</div>
						<div class="form-group">
							<label>Imie:</label>
							<br>
							<input type="text" name="imie" style="min-width: 300px;">
						</div>
						<div class="form-group">
							<label>Nazwisko:</label>
							<br>
							<input type="text" name="nazwisko" style="min-width: 300px;">
						</div>
						<div class="form-group">
							<label>Numer telefonu:</label>
							<br>
							<input type="text" name="numer_telefonu" style="min-width: 300px;">
						</div>
						<div class="form-group">
							<label>E-mail:</label>
							<br>
							<input type="text" name="email" style="min-width: 300px;">
						</div>
						<div class="form-group">
							<button name="buttonRejestracjaSklep" type="submit" class="btn btn-primary">Zarejestruj sie!</button>
						</div>
					</form>
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