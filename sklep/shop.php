<?php
//sprawdzanie czy klasa nie istnieje
if (!class_exists('SHOP_SYSTEM')){
	
	class SHOP_SYSTEM{
		
		//pobieranie i zwracanie loginu użytkownika
		public static function getUser(){
			if(!empty($_SESSION['uzytkownik'])){
				return  $_SESSION['uzytkownik'];
			}
		}
		
		//funkcja, która tworzy koszyk
		public static function createWallet($connect, $user){
			$getData = $connect->query("SELECT * FROM `koszyk` WHERE `login` = '".$user."' AND `status` = '0'");
			$data = $getData->fetch_assoc();
			
			if(!$data['id_koszyk']){
				$connect->query("INSERT INTO `koszyk` (`id_produkt`, `ilość`, `wartość_koszyk`, `login`) VALUES ('', '0', '0', '".$user."');");
			}
			
		}
		
		//szukanie i wybieranie produktów po kodzie
		public static function getFromCode($db, $code, $login){
			
			$parametry_baterie = $db->query("SELECT * FROM `parametry_baterie`  WHERE `kod_produktu` = '".$code."'");
			$baterie = $parametry_baterie->fetch_assoc();
			
			$parametry_czujniki = $db->query("SELECT * FROM `parametry_czujniki`  WHERE `kod_produktu` = '".$code."'");
			$czujniki = $parametry_czujniki->fetch_assoc();
			
			$parametry_diody = $db->query("SELECT * FROM `parametry_diody`  WHERE `kod_produktu` = '".$code."'");
			$diody = $parametry_diody->fetch_assoc();
			
			$parametry_kondensatory = $db->query("SELECT * FROM `parametry_kondensatory`  WHERE `kod_produktu` = '".$code."'");
			$kondensatory = $parametry_kondensatory->fetch_assoc();
			
			//pobieranie koszyka użytkownika
			$getWallet = $db->query("SELECT * FROM `koszyk` WHERE `login` = '".$login."' AND `status` = '0'");
			$wallet = $getWallet->fetch_assoc();
			
			if($baterie['kod_produktu'] == $code){
				$count = $wallet['ilość'] + 1;
				@$price = $wallet['wartość_koszyk'] + $baterie['cena'];
				$cart = $wallet['id_produkt'];
				if(!$cart){
					$cart.= $baterie['kod_produktu'];
				}else{
					$cart.= ",".$baterie['kod_produktu'];
				}
				$db->query("UPDATE `koszyk` SET `id_produkt` = '".$cart."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `ilość` = '".$count."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `wartość_koszyk` = '".$price."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				echo 'Produkt <b>'.$baterie['kod_produktu'].'</b> został dodany do Twojego koszyka!';
				
				header("refresh:2;url=przeglad-oferty.php");
				
			}
			elseif($czujniki['kod_produktu'] == $code){
				$count = $wallet['ilość'] + 1;
				@$price = $wallet['wartość_koszyk'] + $czujniki['cena'];
				$cart = $wallet['id_produkt'];
				if(!$cart){
					$cart.= $czujniki['kod_produktu'];
				}else{
					$cart.= ",".$czujniki['kod_produktu'];
				}
				$db->query("UPDATE `koszyk` SET `id_produkt` = '".$cart."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `ilość` = '".$count."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `wartość_koszyk` = '".$price."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				echo 'Produkt <b>'.$czujniki['kod_produktu'].'</b> został dodany do Twojego koszyka!';
				
				header("refresh:2;url=przeglad-oferty.php");
			}
			elseif($diody['kod_produktu'] == $code){
				$count = $wallet['ilość'] + 1;
				@$price = $wallet['wartość_koszyk'] + $diody['cena'];
				$cart = $wallet['id_produkt'];
				if(!$cart){
					$cart.= $diody['kod_produktu'];
				}else{
					$cart.= ",".$diody['kod_produktu'];
				}
				$db->query("UPDATE `koszyk` SET `id_produkt` = '".$cart."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `ilość` = '".$count."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `wartość_koszyk` = '".$price."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				echo 'Produkt <b>'.$diody['kod_produktu'].'</b> został dodany do Twojego koszyka!';
				
				header("refresh:2;url=przeglad-oferty.php");
			}
			elseif($kondensatory['kod_produktu'] == $code){
				$count = $wallet['ilość'] + 1;
				@$price = $wallet['wartość_koszyk'] + $kondensatory['cena'];
				$cart = $wallet['id_produkt'];
				if(!$cart){
					$cart.= $kondensatory['kod_produktu'];
				}else{
					$cart.= ",".$kondensatory['kod_produktu'];
				}
				$db->query("UPDATE `koszyk` SET `id_produkt` = '".$cart."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `ilość` = '".$count."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				$db->query("UPDATE `koszyk` SET `wartość_koszyk` = '".$price."' WHERE `id_koszyk` = '".$wallet['id_koszyk']."'");
				echo 'Produkt <b>'.$kondensatory['kod_produktu'].'</b> został dodany do Twojego koszyka!';
				
				header("refresh:2;url=przeglad-oferty.php");
			}else{
				echo 'Nie odnaleziono podanego kodu!';
			}
			
			echo '<br/><br/><div style="clear:both;"></div>';
			
		}
		
		public static function getWallet($db, $login){
			//pobieranie koszyka użytkownika
			$getWallet = $db->query("SELECT * FROM `koszyk` WHERE `login` = '".$login."' AND `status` = '0'");
			return $getWallet->fetch_assoc();
		}
		
	}
	
}else{
	die('Class SHOP_SYSTEM already exists!');
}

?>