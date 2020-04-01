<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css" integrity="sha384-oAOxQR6DkCoMliIh8yFnu25d7Eq/PHS21PClpwjOTeU2jRSq11vu66rf90/cZr47" crossorigin="anonymous">
<style>
form  { display: table;      }
p     { display: table-row;  }
label { display: table-cell; }
input { display: table-cell; }
</style>
<meta charset="utf-8" />
<title>Kalkulator stężenia nikotyny</title>
</head>
<body style = "background-color: #333;">
<div style ="position: absolute; top: 10%; left: 50%; transform: translate(-50%, -50%);">
<h1 style="color: #99ff33;"> Oblicz stężenie nikotyny po dodaniu shota </h1>
</div>
<div style= "padding: 10px; margin: 0; position: absolute; top: 20%; left: 50%; transform: translate(-50%, -50%);background-color: #99ff33;">
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
<p>
	<label for="id_Baza">Podaj ile bazy 50/50vpg (ml): </label>
	<input id="id_Baza" type="text" name="Baza" value=""/><br/>
</p>
<p>
	<label for="id_Ilosc_Shota">Podaj ile shota (ml):  </label>
	<input id="id_Ilosc_Shota" type="text" name="IloscShota" value=""/><br/>
</p>
<p>
	<label "id_Moc_Shota">Wybierz moc shota nikotynowego: </label>
	<select id="id_Moc_Shota" name="MocShota">
		<option type="text" value="0">0 mg/ml</option>
		<option type="text" value="6">6 mg/ml</option>
		<option type="text" value="12">12 mg/ml</option>
		<option type="text" value="18">18 mg/ml</option>
	</select><br/>
</p>
	<input type="submit" value="Oblicz" />
</form>	
</div>
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 20px; margin: 0; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%);background-color: #ff0066;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($wynik)){ ?>
<div style="padding: 10px; margin: 0; position: absolute; top: 30%; left: 50%; transform: translate(-50%, -50%);background-color: lightblue">
<?php echo 'Liquid wynikowy o objętości'.' <u>'.$IloscLiquidu.'ml</u> '.'ma stężenie nikotyny'.' <u>'.round($wynik,3).' '.'mg/ml</u>';?>
</div>
<?php } ?>

</body>
</html>