<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';


include _ROOT_PATH.'/app/security/check.php';
//pobranie parametrów
function getParams(&$Baza,&$IloscShota,&$MocShota){
	$Baza = isset($_REQUEST['Baza']) ? $_REQUEST['Baza'] : null;
	$IloscShota = isset ($_REQUEST ['IloscShota'])? $_REQUEST['IloscShota'] : null;
	$MocShota = isset ($_REQUEST ['MocShota']) ? $_REQUEST['MocShota'] : null;
}

// walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate (&$Baza,&$IloscShota,&$MocShota,&$messages){
// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($Baza) && isset($IloscShota) && isset($MocShota))) {
	return false;
	//nie wykonamy obliczen jesli kontroler zostanie wywolany bezsposrednio
}
// sprawdzenie, czy potrzebne wartości zostały przekazane
if ( $Baza == "") {
	$messages [] = 'Nie podano ilości bazy';
}
if ($IloscShota == "") {
	$messages [] = 'Nie podano ilości shota';
}

	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $Baza )) {
		$messages [] = 'Ilosc bazy musi być liczbą całkowitą';
	}
	
	if (! is_numeric( $IloscShota )) {
		$messages [] = 'IloscShota musi być liczbą całkowitą';
	}	

if (count ( $messages ) != 0) return false;
	else return true; 
}
function process(&$Baza,&$IloscShota,$MocShota,&$messages,&$wynik){
	global $role;
	
	$Baza = intval($Baza);
	$IloscShota = intval($IloscShota);
	$MocShota = intval ($MocShota);
	
	//wykonanie operacji
	$IloscNikotyny = $MocShota * $IloscShota;
	$IloscLiquidu = $Baza + $IloscShota;
	switch ($MocShota) {
		
		case '6' :
		if ($role == 'admin'){
			$wynik = $IloscNikotyny/$IloscLiquidu;
		}
		else {
		$messages [] = 'tylko administrator moze korzystac z aplikacji';
		}
		break;
		
		case '12' :
		if ($role == 'admin'){
			$wynik = $IloscNikotyny/$IloscLiquidu;
		}
		else {
		$messages [] = 'tylko administrator moze korzystac z aplikacji';
		} 
		break;
		
		case '18' :
		if ($role == 'admin'){
			$wynik = $IloscNikotyny/$IloscLiquidu;
		}
		else {
		$messages [] = 'tylko administrator moze korzystac z aplikacji';
		} break;
		default :
		if ($role == 'admin'){
			$wynik = $IloscNikotyny/$IloscLiquidu;
		}
		else {
		$messages [] = 'tylko administrator moze korzystac z aplikacji';
		} 
		break;
	}
	
}
$Baza = null;
$IloscShota = null;
$MocShota = null;
$IloscNikotyny = null;
$IloscLiquidu = null;
$wynik = null;
$messages = array();

getParams($Baza,$IloscShota,$MocShota);
if (validate ($Baza,$IloscShota,$MocShota,$messages) ) {
	process($Baza,$IloscShota,$MocShota,$messages,$wynik);
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_view.php';