<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$Baza = $_REQUEST ['Baza'];
$IloscShota = $_REQUEST ['IloscShota'];
$MocShota = $_REQUEST ['MocShota'];

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($Baza) && isset($IloscShota) && isset($MocShota))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane

if ( $Baza == "") {
	$messages [] = 'Nie podano ilości bazy';
}
if ($IloscShota == "") {
	$messages [] = 'Nie podano ilości shota';
}

//nie ma sensu walidować dalej gdy brak parametrów
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $Baza )) {
		$messages [] = 'Ilosc bazy musi być liczbą całkowitą';
	}
	
	if (! is_numeric( $IloscShota )) {
		$messages [] = 'IloscShota musi być liczbą całkowitą';
	}	

}

// 3. wykonaj zadanie jeśli wszystko w porządku

if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$Baza = intval($Baza);
	$IloscShota = intval($IloscShota);
	$MocShota = intval ($MocShota);
	
	//wykonanie operacji
	$IloscNikotyny = $MocShota * $IloscShota;
	$IloscLiquidu = $Baza + $IloscShota;
	switch ($MocShota) {
		
		case '6' :
			$wynik = $IloscNikotyny/$IloscLiquidu;
			break;
		case '12' :
			$wynik = $IloscNikotyny/$IloscLiquidu;
			break;
		case '18' :
			$wynik = $IloscNikotyny/$IloscLiquidu;
			break;
		default :
			$wynik = $IloscNikotyny/$IloscLiquidu;
			break;
	}
	
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';