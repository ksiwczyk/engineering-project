<?php

	require('db_data.php');

	$zapytanie = "SELECT parametry_baterie.kod_produktu, parametry_baterie.producent, parametry_baterie.cena, kategoria.typ_kategoria From kategoria Join parametry_baterie on parametry_baterie.id_kategoria= kategoria.id_kategoria UNION SELECT parametry_czujniki.kod_produktu, parametry_czujniki.producent, parametry_czujniki.cena, kategoria.typ_kategoria From kategoria Join parametry_czujniki on parametry_czujniki.id_kategoria= kategoria.id_kategoria UNION SELECT parametry_diody.kod_produktu, parametry_diody.producent, parametry_diody.cena, kategoria.typ_kategoria From kategoria Join parametry_diody on parametry_diody.id_kategoria= kategoria.id_kategoria UNION SELECT parametry_kondensatory.kod_produktu, parametry_kondensatory.producent, parametry_kondensatory.cena, kategoria.typ_kategoria From kategoria Join parametry_kondensatory on parametry_kondensatory.id_kategoria= kategoria.id_kategoria";


	$wynik = $connect->query($zapytanie);

				if($wynik->num_rows > 0) {
                echo '<table id="przeglad-oferty" class="display compact" style="width: 100%">';
                 echo   "<thead>
                        <tr>
                            <th>Kod produktu</th>
                            <th>Producent</th>
                            <th>Cena</th>
                            <th>Kategoria</th>                  
                        </tr>
                    </thead>
                    <tbody>";
                    while ($row = $wynik->fetch_assoc()) {
                echo    "<tr>
                            <td>".$row["kod_produktu"]."</td>
                            <td>".$row["producent"]."</td>
                            <td>".$row["cena"]."</td>
                            <td>".$row["typ_kategoria"]."</td>
                        </tr>";
                    }
                echo "</tbody> </table>";
                }
$connect->close();
?>