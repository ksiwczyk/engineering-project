-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Lut 2021, 18:30
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `adres`
--

CREATE TABLE `adres` (
  `id_adres` int(11) NOT NULL,
  `id_klienta` int(11) DEFAULT NULL,
  `ulica` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `numer` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `lokal` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `miasto` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `wojewodztwo` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod_pocztowy` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL,
  `id_koszyk` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `adres`
--

INSERT INTO `adres` (`id_adres`, `id_klienta`, `ulica`, `numer`, `lokal`, `miasto`, `wojewodztwo`, `kod_pocztowy`, `id_koszyk`) VALUES
(1, 1, 'Sezamkowa', '1', '12', 'Kielce', 'Swiętokrzyskie', '25-000', 0),
(2, 2, 'Sezamkowa', '1', '12', 'Kielce', 'Swiętokrzyskie', '25-000', 0),
(3, 3, 'Sezamkowa', '1', '12', 'Kielce', 'Swiętokrzyskie', '25-000', 0),
(4, 5, 'a', 'b', 'c', 'd', 'e', '22-222', 4),
(5, 5, 'Sezamkowa', '19', '2', 'Kielce', 'Świętokrzyskie', '25-000', 6),
(6, 5, 'Sezamkowa', '29', '1', 'Kielce', 'Świętokrzyskie', '25-001', 7),
(7, 5, 'Sezamkowa', '21', '2', 'Kielce', 'Świętokrzyskie', '25-000', 8),
(8, 5, 'Sezamkowa', '642', '2', 'Kielce', 'Świętokrzyskie', '25-000', 9),
(9, 5, 'Niska', '21', '2', 'Kielce', 'Świętokrzyskie', '25-000', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_admin_panel`
--

CREATE TABLE `dane_admin_panel` (
  `id` int(11) NOT NULL,
  `login` varchar(11) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane_admin_panel`
--

INSERT INTO `dane_admin_panel` (`id`, `login`, `password`) VALUES
(1, 'admin', 'ec3982537680f76eef7f634b1857016c');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_klient`
--

CREATE TABLE `dane_klient` (
  `id_klient` int(11) NOT NULL,
  `imie` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `numer_telefonu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `login` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `dane_klient`
--

INSERT INTO `dane_klient` (`id_klient`, `imie`, `nazwisko`, `numer_telefonu`, `email`, `login`, `password`) VALUES
(1, 'Konrad', 'Siwczyk', '123456789', 'test@test.pl', 'test', 'test'),
(2, 'Testowy', 'Testowy', '234567890', 'test1@test.pl', 'test', 'test'),
(3, 'Przyklad', 'Przyklad', '345678901', 'test2@test.pl', 'test', 'test'),
(5, 'Jan', 'Kowalski', '669691201', 'test6000@test.pl', 'test6000', '835c40a687c3fc17b431f8e04d69b866'),
(6, 'Adrian', 'Nowak', '501501501', 'test6001@test.pl', 'test6001', '2f7667aef24fca823180c563e3599863');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id_kategoria` int(11) NOT NULL,
  `typ_kategoria` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategoria`, `typ_kategoria`) VALUES
(1, 'Baterie'),
(2, 'Czujniki'),
(3, 'Diody'),
(4, 'Kondensatory');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `koszyk`
--

CREATE TABLE `koszyk` (
  `id_koszyk` int(11) NOT NULL,
  `id_produkt` longtext COLLATE utf8_polish_ci DEFAULT NULL,
  `ilość` int(11) DEFAULT NULL,
  `wartość_koszyk` double DEFAULT NULL,
  `login` varchar(322) COLLATE utf8_polish_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `koszyk`
--

INSERT INTO `koszyk` (`id_koszyk`, `id_produkt`, `ilość`, `wartość_koszyk`, `login`, `status`) VALUES
(1, '', 2, 2.5, '', 0),
(2, '2', 2, 2.5, '', 0),
(3, '3', 3, 2.5, '', 0),
(4, '0FVWOOBP', 1, 100, 'test6000', 1),
(6, '6WPU7YLF,2KY8PSIE', 2, 200, 'test6000', 1),
(7, '1VTCIM1B,BX1CDKBZ', 2, 200, 'test6000', 1),
(8, '0ZEK6OQG,1AU549E7,5XVGUZCV', 3, 300, 'test6000', 1),
(9, '151LUGKF,9FTT4WFW,132DN8QM', 3, 300, 'test6000', 1),
(10, '2B5P0V09,2JL5SY4W', 2, 200, 'test6000', 1),
(11, '', 0, 0, 'admin', 0),
(12, '', 0, 0, 'test6000', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parametry_baterie`
--

CREATE TABLE `parametry_baterie` (
  `id_kategoria` int(11) DEFAULT NULL,
  `producent` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod_produktu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `rodzaj` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `napiecie_znam` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `pojemnosc` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `prad_max` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `prad_znam` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis_produkt` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parametry_baterie`
--

INSERT INTO `parametry_baterie` (`id_kategoria`, `producent`, `kod_produktu`, `rodzaj`, `napiecie_znam`, `pojemnosc`, `prad_max`, `prad_znam`, `cena`, `opis_produkt`) VALUES
(1, 'TADIRAN', '0FVWOOBP', 'litowa LTC', '3.6', '19000', '340', '4', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '4TAJ1MIN', 'litowa LTC', '3.6', '19000', '340', '4', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'AOPW150G', 'litowa LTC', '3.6', '19000', '340', '4', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '9XJ3DD94', 'litowa LTC', '3.6', '35000', '450', '10', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'IVRX9SC4', 'litowa LTC', '3.6', '35000', '450', '10', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'CCE3PNHP', 'litowa LTC', '3.6', '1600', '10', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '1XBTS1ZS', 'litowa LTC', '3.6', '1600', '10', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'O9MSCLML', 'litowa LTC', '3.6', '1600', '10', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '6386MB1O', 'litowa LTC', '3.6', '1600', '10', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'D5ISJP8A', 'litowa LTC', '3.6', '1600', '10', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'C9TV1JDG', 'litowa LTC', '3.6', '1600', '10', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'IPZK1CVY', 'litowa LTC', '3.6', '1600', '10', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '5UUHVLWY', 'litowa LTC', '3.6', '900', '50', '0.6', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'H4HQKFRM', 'litowa LTC', '3.6', '900', '50', '0.6', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'FB87KCES', 'litowa LTC', '3.6', '900', '50', '0.6', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'S33J5O71', 'litowa LTC', '3.6', '900', '50', '0.6', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '8S9U4VIC', 'litowa LTC', '3.6', '900', '50', '0.6', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'PQTZWAC2', 'litowa LTC', '3.6', '900', '50', '0.6', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'BAZLC34V', 'litowa LTC', '3.6', '900', '50', '0.6', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'WX5SC2JB', 'litowa LTC', '3.6', '1100', '75', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'LIVG34II', 'litowa LTC', '3.6', '1100', '75', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'L1772AZ4', 'litowa LTC', '3.6', '1100', '75', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'APFDIAY5', 'litowa LTC', '3.6', '1100', '75', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'XTO0MX1Y', 'litowa LTC', '3.6', '1100', '75', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '6N4ZHC8S', 'litowa LTC', '3.6', '1100', '75', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '46PW6FQ6', 'litowa LTC', '3.6', '1100', '75', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'UWA3XZZK', 'litowa LTC', '3.6', '1100', '50', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'JDBW02KW', 'litowa LTC', '3.6', '1100', '50', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'FEMNHK5C', 'litowa LTC', '3.6', '1100', '50', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'HLYDRFAC', 'litowa LTC', '3.6', '1100', '50', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '2B5P0V09', 'litowa LTC', '3.6', '1100', '50', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'Y1WPU6C0', 'litowa LTC', '3.6', '1100', '50', '1', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'BPDI09K7', 'litowa LTC', '3.6', '2200', '100', '2', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'L9A2FB47', 'litowa LTC', '3.6', '2200', '100', '2', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'C0N2MD2B', 'litowa LTC', '3.6', '2200', '100', '2', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '5PQPLTGN', 'litowa LTC', '3.6', '2200', '100', '2', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '9JWZJ7WU', 'litowa LTC', '3.6', '2200', '100', '2', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '6XNCYIA1', 'litowa LTC', '3.6', '2200', '100', '2', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '9NTLRMMM', 'litowa LTC', '3.6', '2200', '100', '2', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '132DN8QM', 'litowa LTC', '3.6', '1500', '75', '1.3', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'ICBR9YC6', 'litowa LTC', '3.6', '1500', '75', '1.3', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'LP8AY81X', 'litowa LTC', '3.6', '1500', '75', '1.3', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'ML83YLGP', 'litowa LTC', '3.6', '1500', '75', '1.3', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'F8TS6A5F', 'litowa LTC', '3.6', '1500', '75', '1.3', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'C7XCVZ87', 'litowa LTC', '3.6', '1500', '75', '1.3', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'F7736ZRI', 'litowa LTC', '3.6', '1500', '75', '1.3', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'APCY1IE6', 'litowa LTC', '3.6', '1600', '30', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'GYPDYKJ0', 'litowa LTC', '3.6', '1600', '30', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'H633W202', 'litowa LTC', '3.6', '1600', '30', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'ZYVWNC4O', 'litowa LTC', '3.6', '1600', '30', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'S7DKFHHM', 'litowa LTC', '3.6', '1600', '30', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', '6WPU7YLF', 'litowa LTC', '3.6', '1600', '30', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'VE8H6Z9W', 'litowa LTC', '3.6', '1600', '30', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'NVI1YDFH', 'litowa LTC', '3.6', '1700', '10', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'AIRGQYSM', 'litowa LTC', '3.6', '1000', '10', '0.5', '100,00', 'Opis produktu....'),
(1, 'TADIRAN', 'L86IXINI', 'litowa LTC', '3.6', '2100', '10', '0.5', '100,00', 'Opis produktu....'),
(1, 'SAFT', 'NMQJBQ6O', 'litowa', '3.6', '2100', '25', '3', '100,00', 'Opis produktu....'),
(1, 'SAFT', 'BFG0JL7K', 'litowa', '3.6', '2100', '25', '3', '100,00', 'Opis produktu....'),
(1, 'SAFT', 'TPQ9E9MP', 'litowa', '3.6', '3600', '25', '3', '100,00', 'Opis produktu....'),
(1, 'SAFT', '7JYURC34', 'litowa', '3.6', '7700', '250', '3', '100,00', 'Opis produktu....'),
(1, 'SAFT', 'PJEQ0B52', 'litowa', '3.6', '17000', '150', '4', '100,00', 'Opis produktu....'),
(1, 'SAFT', 'GBSPNQZ6', 'litowa', '3.6', '5800', '1300', '5', '100,00', 'Opis produktu....'),
(1, 'SAFT', '6G6AFIQC', 'litowa', '3.6', '13000', '1800', '15', '100,00', 'Opis produktu....'),
(1, 'SAFT', 'SFX9IQ4X', 'litowa', '3.6', '13000', '1800', '15', '100,00', 'Opis produktu....');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parametry_czujniki`
--

CREATE TABLE `parametry_czujniki` (
  `id_kategoria` int(11) DEFAULT NULL,
  `producent` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod_produktu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `typ_czujnika` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `czestotliwosc_czujnika` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `klasa_szczelnosci` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `min_nap_zas_dc` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `max_nap_zas_dc` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `obudowa_czujnika` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `prad_pracy_max` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis_produkt` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parametry_czujniki`
--

INSERT INTO `parametry_czujniki` (`id_kategoria`, `producent`, `kod_produktu`, `typ_czujnika`, `czestotliwosc_czujnika`, `klasa_szczelnosci`, `min_nap_zas_dc`, `max_nap_zas_dc`, `obudowa_czujnika`, `prad_pracy_max`, `cena`, `opis_produkt`) VALUES
(2, 'PEPPERL+FUCHS', 'L2RV2AXD', 'indukcyjny', '25', 'IP67', '20', '320', 'M18', '300', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'RQFGN5MX', 'indukcyjny', '300', 'IP67', '20', '320', 'M18', '400', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'KZVOLPFG', 'indukcyjny', '25', 'IP67', '20', '320', 'M30', '300', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'WFJMAM1M', 'indukcyjny', '300', 'IP67', '15', '34', 'M12', '25', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'FI77JVA0', 'indukcyjny', '500', 'IP67', '15', '34', 'M18', '200', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'BG7OBJCM', 'indukcyjny', '500', 'IP67', '15', '34', 'M18', '200', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', '8X1KD6R0', 'indukcyjny', '300', 'IP67', '15', '34', 'M30', '200', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'C1CCD4PJ', 'indukcyjny', '300', 'IP67', '15', '34', 'M30', '200', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'CMGL8HC9', 'indukcyjny', '5000', 'IP67', '10', '30', 'fi4', '200', '100,00', 'Opis produktu....'),
(2, 'MICRO DETECTORS', 'O9OPJQ1I', 'indukcyjny', '5000', 'IP67', '10', '30', 'M8', '200', '100,00', 'Opis produktu....'),
(2, 'MICRO DETECTORS', 'ETTHPA7R', 'indukcyjny', '3000', 'IP67', '10', '30', 'M18', '400', '100,00', 'Opis produktu....'),
(2, 'MICRO DETECTORS', '1AU549E7', 'indukcyjny', '2000', 'IP67', '10', '30', 'M12', '200', '100,00', 'Opis produktu....'),
(2, 'BALLUFF', 'MLJKTMK7', 'indukcyjny', '1500', 'IP67', '10', '30', 'M8', '200', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'LZNVFF3K', 'fotoelektryczny', '500', 'IP67', '10', '36', 'M18', '150', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'YNRENOWE', 'fotoelektryczny', '500', 'IP67', '10', '36', 'M18', '150', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'OGAJGEGS', 'fotoelektryczny', '500', 'IP67', '10', '36', 'M18', '150', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'QP391D7D', 'fotoelektryczny', '500', 'IP67', '10', '36', 'M18', '150', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', '2KY8PSIE', 'fotoelektryczny', '500', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', '5ZIJE4NT', 'fotoelektryczny', '700', 'IP67', '10', '30', 'M12', '300', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'BO2HT909', 'fotoelektryczny', '700', 'IP67', '10', '30', 'M12', '300', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'OT9GX6KP', 'fotoelektryczny', '700', 'IP67', '10', '30', 'M12', '300', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'H8OXRX1N', 'fotoelektryczny', '700', 'IP67', '10', '30', 'M12', '300', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'NAWR4AB6', 'fotoelektryczny', '500', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'O4D7347I', 'fotoelektryczny', '500', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'O6PB3ZRB', 'fotoelektryczny', '500', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'Y6YFTQT6', 'fotoelektryczny', '500', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'QFNKGPGU', 'fotoelektryczny', '500', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'PEPPERL+FUCHS', 'JKSDFPLT', 'fotoelektryczny', '500', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'BALLUFF', 'M1VGQCHE', 'pojemnościowy', '100', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'BALLUFF', '85KRL3O1', 'pojemnościowy', '100', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'BALLUFF', '92CFHJ0R', 'pojemnościowy', '100', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'BALLUFF', 'UJUZZ6JB', 'pojemnościowy', '100', 'IP67', '10', '30', 'M30', '100', '100,00', 'Opis produktu....'),
(2, 'BALLUFF', 'X4HD7OI6', 'pojemnościowy', '100', 'IP67', '10', '30', 'M18', '100', '100,00', 'Opis produktu....'),
(2, 'CARLO GAVAZZUI', 'KSNWM2OL', 'pojemnościowy', '50', 'IP67', '10', '40', 'M30', '200', '100,00', 'Opis produktu....'),
(2, 'SELS', 'UQR10HIK', 'pojemnościowy', '100', 'IP67', '10', '30', 'M30', '300', '100,00', 'Opis produktu....'),
(2, 'BAUMER', 'Q3AGZJHN', 'pojemnościowy', '50', 'IP67', '10', '30', 'M18', '200', '100,00', 'Opis produktu....'),
(2, 'BAUMER', 'EPRB4Z7E', 'pojemnościowy', '50', 'IP67', '10', '30', 'M30', '200', '100,00', 'Opis produktu....'),
(2, 'BAUMER', 'IL1UDF5X', 'pojemnościowy', '50', 'IP65', '10', '30', 'M12', '200', '100,00', 'Opis produktu....'),
(2, 'BAUMER', 'VMPMUYWB', 'pojemnościowy', '50', 'IP65', '10', '30', 'M18', '200', '100,00', 'Opis produktu....');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parametry_diody`
--

CREATE TABLE `parametry_diody` (
  `id_kategoria` int(11) DEFAULT NULL,
  `producent` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `typ_diody` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod_produktu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `czas_gotowosci` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `montaz_diody` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `max_napiecie_przewodzenia` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `max_nap_wst_diody` double DEFAULT NULL,
  `obudowa_diody` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis_produkt` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parametry_diody`
--

INSERT INTO `parametry_diody` (`id_kategoria`, `producent`, `typ_diody`, `kod_produktu`, `czas_gotowosci`, `montaz_diody`, `max_napiecie_przewodzenia`, `max_nap_wst_diody`, `obudowa_diody`, `cena`, `opis_produkt`) VALUES
(3, 'VISHAY', 'prostownicza', '2JL5SY4W', '4', 'SMD', '1.2', 100, 'SOD123', '100,00', 'Opis produktu....'),
(3, 'DIODES INCORPORATED', 'przelaczajaca', '151LUGKF', '4', 'SMD', '1.25', 75, 'SOD323', '100,00', 'Opis produktu....'),
(3, 'DIOTEC SEMICONDUCTOR', 'przelaczajaca', 'JUWQ8M3B', '4', 'SMD', '1.25', 100, 'SOD523', '100,00', 'Opis produktu....'),
(3, 'TOSHIBA', 'przelaczajaca', 'GOLTNTBF', '60', 'SMD', '1.2', 250, 'SOT323', '100,00', 'Opis produktu....'),
(3, 'DIOTEC SEMICONDUCTOR', 'przelaczajaca', '3MALB482', '50', 'SMD', '1', 250, 'SOT323', '100,00', 'Opis produktu....'),
(3, 'VISHAY', 'przelaczajaca', '0ZEK6OQG', '4', 'SMD', '0.86', 100, 'MINIMELF', '100,00', 'Opis produktu....'),
(3, 'TAIWAN SEMINONDUCTOR', 'prostownicza', '9CW8PQ9W', '1500', 'SMD', '1.1', 200, 'SMA', '100,00', 'Opis produktu....'),
(3, 'DIODES INCORPORATED', 'prostownicza', '5KGI4HNX', '1800', 'SMD', '1.1', 600, 'SMB', '100,00', 'Opis produktu....'),
(3, 'VISHAY', 'prostownicza', 'TO9VJ7N9', '1800', 'SMD', '1.1', 600, 'SMA', '100,00', 'Opis produktu....'),
(3, 'DIOTEC SEMICONDUCTOR', 'prostownicza', 'XRKT6005', '1500', 'THT', '1.1', 50, 'DO41', '100,00', 'Opis produktu....'),
(3, 'DIODES INCORPORATED', 'prostownicza', '3N3I335Z', '2000', 'THT', '1', 800, 'DO41', '100,00', 'Opis produktu....'),
(3, 'DIOTEC SEMICONDUCTOR', 'prostownicza', 'DB78ILW2', '4', 'THT', '1', 100, 'DO34', '100,00', 'Opis produktu....');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parametry_kondensatory`
--

CREATE TABLE `parametry_kondensatory` (
  `id_kategoria` int(11) DEFAULT NULL,
  `producent` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `kod_produktu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `rodzaj_kondensatora` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `czas_zycia` int(11) DEFAULT NULL,
  `montaz` varchar(15) COLLATE utf8_polish_ci DEFAULT NULL,
  `nap_pracy_kondensatora` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `pojemnosc_kondensatora` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `raster_wprowadzen` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `rodzaj_montazu` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `min_temp` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `max_temp` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `opis_produkt` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `parametry_kondensatory`
--

INSERT INTO `parametry_kondensatory` (`id_kategoria`, `producent`, `kod_produktu`, `rodzaj_kondensatora`, `czas_zycia`, `montaz`, `nap_pracy_kondensatora`, `pojemnosc_kondensatora`, `raster_wprowadzen`, `rodzaj_montazu`, `min_temp`, `max_temp`, `cena`, `opis_produkt`) VALUES
(4, 'SAMWHA', '8EA7IM3W', 'elektrolityczny', 9000, 'THT', '400 VDC', '22', '5', 'niskoimpedancyjny', '-25', '105', '100,00', 'Opis produktu....'),
(4, 'PANASONIC', '5XVGUZCV', 'elektrolityczny', 5000, 'THT', '50 VDC', '680', '7.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'VISHAY', '1VTCIM1B', 'elektrolityczny', 10000, 'THT', '25 VDC', '1000', '5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', '8GBZVUFU', 'elektrolityczny', 3000, 'THT', '35 VDC', '1800', '5', 'niskoimpedancyjny', '-40', '135', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'ZFS7RMTN', 'elektrolityczny', 1000, 'THT', '10 V', '33', '2.5', 'bipolarny', '-40', '85', '100,00', 'Opis produktu....'),
(4, 'NICHION', '9FTT4WFW', 'elektrolityczny', 2000, 'THT', '100 VDC', '220', '7.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'IYYRBQT9', 'elektrolityczny', 2000, 'THT', '100 VDC', '330', '7.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'WUZIF424', 'elektrolityczny', 2000, 'THT', '100 VDC', '56', '5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'AL1SXL5X', 'elektrolityczny', 2000, 'THT', '25 VDC', '33', '2', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'RPGMCM8K', 'elektrolityczny', 8000, 'THT', '50 VDC', '1200', '7.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'BX1CDKBZ', 'elektrolityczny', 8000, 'THT', '50 VDC', '1200', '7.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', '4189V03W', 'elektrolityczny', 8000, 'THT', '50 VDC', '680', '7.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'CVEZ79MO', 'elektrolityczny', 8000, 'THT', '35 VDC', '4700', '7.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'PT0R6Z27', 'elektrolityczny', 2000, 'THT', '35 VDC', '47', '2.5', 'niskoimpedancyjny', '-40', '105', '100,00', 'Opis produktu....'),
(4, 'NICHION', 'MT9Q4BGZ', 'elektrolityczny', 2000, 'THT', '100 VDC', '10', '2.5', 'niskoimpedancyjny', '-55', '105', '100,00', 'Opis produktu....');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `platnosc`
--

CREATE TABLE `platnosc` (
  `id_platnosci` int(11) NOT NULL,
  `id_koszyk` int(11) DEFAULT NULL,
  `czy_zaplacone` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `platnosc`
--

INSERT INTO `platnosc` (`id_platnosci`, `id_koszyk`, `czy_zaplacone`) VALUES
(1, 1, 'TAK'),
(2, 2, 'TAK'),
(3, 3, 'TAK'),
(4, 4, 'TAK');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty_zamowione`
--

CREATE TABLE `produkty_zamowione` (
  `id_produkt` int(11) NOT NULL,
  `id_kategoria` int(11) DEFAULT NULL,
  `id_koszyk` int(11) DEFAULT NULL,
  `id_zamowienia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `produkty_zamowione`
--

INSERT INTO `produkty_zamowione` (`id_produkt`, `id_kategoria`, `id_koszyk`, `id_zamowienia`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 2),
(3, 3, 3, 3),
(4, 3, 2, 1),
(5, 3, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienie`
--

CREATE TABLE `zamowienie` (
  `id_zamowienie` int(11) NOT NULL,
  `id_koszyk` int(11) DEFAULT NULL,
  `id_platnosci` int(11) DEFAULT NULL,
  `data_zlozenia` datetime DEFAULT NULL,
  `id_klienta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zamowienie`
--

INSERT INTO `zamowienie` (`id_zamowienie`, `id_koszyk`, `id_platnosci`, `data_zlozenia`, `id_klienta`) VALUES
(1, 1, 1, '2005-12-12 00:00:00', 1),
(2, 2, 2, '2005-12-12 00:00:00', 2),
(3, 3, 3, '2005-12-12 00:00:00', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`id_adres`),
  ADD KEY `id_klienta_idx` (`id_klienta`);

--
-- Indeksy dla tabeli `dane_admin_panel`
--
ALTER TABLE `dane_admin_panel`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `dane_klient`
--
ALTER TABLE `dane_klient`
  ADD PRIMARY KEY (`id_klient`);

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategoria`);

--
-- Indeksy dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`id_koszyk`);

--
-- Indeksy dla tabeli `parametry_baterie`
--
ALTER TABLE `parametry_baterie`
  ADD KEY `id_kategoria_idx` (`id_kategoria`);

--
-- Indeksy dla tabeli `parametry_czujniki`
--
ALTER TABLE `parametry_czujniki`
  ADD KEY `id_kategoria_idx` (`id_kategoria`);

--
-- Indeksy dla tabeli `parametry_diody`
--
ALTER TABLE `parametry_diody`
  ADD KEY `id_kategoria_idx` (`id_kategoria`);

--
-- Indeksy dla tabeli `parametry_kondensatory`
--
ALTER TABLE `parametry_kondensatory`
  ADD KEY `id_kategoria_idx` (`id_kategoria`);

--
-- Indeksy dla tabeli `platnosc`
--
ALTER TABLE `platnosc`
  ADD PRIMARY KEY (`id_platnosci`);

--
-- Indeksy dla tabeli `produkty_zamowione`
--
ALTER TABLE `produkty_zamowione`
  ADD PRIMARY KEY (`id_produkt`),
  ADD KEY `id_kategoria_idx` (`id_kategoria`),
  ADD KEY `id_koszyk_idx` (`id_koszyk`),
  ADD KEY `id_zamowienia_idx` (`id_zamowienia`);

--
-- Indeksy dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD PRIMARY KEY (`id_zamowienie`),
  ADD KEY `id_platnosci_idx` (`id_platnosci`),
  ADD KEY `id_klienta_idx` (`id_klienta`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `adres`
--
ALTER TABLE `adres`
  MODIFY `id_adres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `dane_admin_panel`
--
ALTER TABLE `dane_admin_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `dane_klient`
--
ALTER TABLE `dane_klient`
  MODIFY `id_klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `id_koszyk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `produkty_zamowione`
--
ALTER TABLE `produkty_zamowione`
  MODIFY `id_produkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  MODIFY `id_zamowienie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `adres`
--
ALTER TABLE `adres`
  ADD CONSTRAINT `id_klienta_adres` FOREIGN KEY (`id_klienta`) REFERENCES `dane_klient` (`id_klient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `parametry_baterie`
--
ALTER TABLE `parametry_baterie`
  ADD CONSTRAINT `id_kategoria_baterie` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `parametry_czujniki`
--
ALTER TABLE `parametry_czujniki`
  ADD CONSTRAINT `id_kategoria_czujniki` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `parametry_diody`
--
ALTER TABLE `parametry_diody`
  ADD CONSTRAINT `id_kategoria_diody` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `parametry_kondensatory`
--
ALTER TABLE `parametry_kondensatory`
  ADD CONSTRAINT `id_kategoria_kondensatory` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `produkty_zamowione`
--
ALTER TABLE `produkty_zamowione`
  ADD CONSTRAINT `id_kategoria` FOREIGN KEY (`id_kategoria`) REFERENCES `kategoria` (`id_kategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_koszyk` FOREIGN KEY (`id_koszyk`) REFERENCES `koszyk` (`id_koszyk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_zamowienia` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienie` (`id_zamowienie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `zamowienie`
--
ALTER TABLE `zamowienie`
  ADD CONSTRAINT `id_klienta_zamowienie` FOREIGN KEY (`id_klienta`) REFERENCES `dane_klient` (`id_klient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_platnosci` FOREIGN KEY (`id_platnosci`) REFERENCES `platnosc` (`id_platnosci`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
