<?php

if (isset($_SESSION['zalogowany'])) 
{
	echo '<h5 class="card-title">Informacje o koncie</h5>';
	echo '<p class="card-text">Login:' .$_SESSION['login']; echo '</p>';
	echo '<p class="card-text">Email:' .$_SESSION['email']; echo '</p>';
}

?>