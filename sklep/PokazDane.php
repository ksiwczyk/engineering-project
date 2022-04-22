<?php
session_start();
error_reporting(0);
if (isset($_SESSION['zalogowany'])) 
{

	require_once 'db_data.php';
	
	include 'shop.php';
	$shop = new SHOP_SYSTEM();
	$user = $shop->getUser();
	
	$getudata = $connect->query("SELECT * FROM `dane_klient` WHERE `login` = '".$user."'");
	$udata = $getudata->fetch_assoc();
	
	
	echo '<h5 class="card-title">Informacje o koncie</h5>';
	echo '<p class="card-text">Login: '.$udata['login']; echo '</p>';
	echo '<p class="card-text">Imie: '.$udata['imie']; echo '</p>';
	echo '<p class="card-text">Nazwisko: '.$udata['nazwisko']; echo '</p>';
	echo '<p class="card-text">Email: '.$udata['email']; echo '</p>';
	echo '<p class="card-text">Numer telefonu: '.$udata['numer_telefonu']; echo '</p>';
}

?>