
<!DOCTYPE html>
<html>
<head>
	<title>Logowanie do panelu administratora</title>

<!-- Style -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">

</head>
<body>
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="logowanie col-md-5">
			<div class="card border-dark">
				<div class="card-header">Logowanie</div>
					<form action="login.php" method="POST">
						<div class="form-group m-3">
							<label>Login:</label>
							<input class="w-75" type="text" name="login" placeholder="Podaj login">
						</div>
						<div class="form-group m-3">
							<label>Hasło:</label>
							<input class="w-75" type="password" name="password" placeholder="Podaj hasło">
						</div>
						<div class="form-group m-3">
							<button name="buttonLoginPanel" type="submit" class="btn btn-primary btn-lg">Zaloguj sie!</button>
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