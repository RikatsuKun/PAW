<?php ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
<meta charset="utf-8" />
<title>Kalkulator stężenia nikotyny</title>
</head>
<style>
.center{
	margin: auto;
	width: 25%;
	padding: 10px;
}
</style>
<body style = "background-color: #333;">
<div style="position: absolute; right: 0%;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
<div class="center" style="color: #404040; background-color: #00cc66;">
	<form action="<?php print(_APP_ROOT); ?>/app/calc.php" method="post" class="pure-form pure-form-aligned">
		<legend>Kalkulator</legend>
		<fieldset>
			<div class="pure-control-group">
				<label for="id_Baza">Podaj ile bazy 50/50vpg (ml): </label>
				<input id="id_Baza" type="text" name="Baza" value="<?php out($Baza) ?>" />
			</div>
			<div class="pure-control-group">
				<label for="id_Ilosc_Shota">Podaj ile shota (ml):  </label>
				<input id="id_Ilosc_Shota" type="text" name="IloscShota" value="<?php out ($IloscShota)?>" />
			</div>
			<div class="pure-control-group">
				<label for="id_Moc_Shota">Wybierz moc shota nikotynowego: </label>
				<select id="id_Moc_Shota" name="MocShota">
					<option type="text" value="0">0 mg/ml</option>
					<option type="text" value="6">6 mg/ml</option>
					<option type="text" value="12">12 mg/ml</option>
					<option type="text" value="18">18 mg/ml</option>
				</select>
			</div>
			<div class="pure-control-group">
				<input type="submit" value="Oblicz" class="button-success pure-button" />
			</div>
		</fieldset>		
	</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="color: black; background-color: #ff6666;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($wynik)){ ?>
<div style="color: black; background-color: #99ff33; text-align: center;">
<?php echo 'Liquid wynikowy o objętości'.' <u>'.$IloscLiquidu.'ml</u> '.'ma stężenie nikotyny'.' <u>'.round($wynik,3).' '.'mg/ml</u>';?>
</div>
<?php } ?>

</div>
</body>
</html>