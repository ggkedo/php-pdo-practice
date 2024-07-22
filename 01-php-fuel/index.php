<!--
Az űrlap elküldését követően lesz az URL-ben distance, avg és price paraméter
Az "eredmények" rész csak akkor jelenjen meg, ha léteznek ilyen paraméterek
A számolt értékek pedig a paraméterek értékei alapján
Átlagfogyasztás: hány litert fogyaszt 100km megtétele alatt
-->
<?php
include 'functions.php'
?>

<!DOCTYPE html>
<html lang="hu">
<head>
	
	<meta charset="UTF-8">
	
	<title>Mennyit tankolj?</title>
    
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    
    <meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	
	<link rel="stylesheet" href="src/style.css">
	<link rel="stylesheet" href="src/fontawesome5/css/all.css">
	
</head>
<body>

	<div id="title-bar">
		<h1>
			<i class="fas fa-tint"></i>
			Mennyit tankolj?
		</h1>
	</div>
	
	<div id="main">
		<div class="inside">

			<section>
				
				<h2>Milyen hosszú útra készülsz?</h2>

<?php
	$distance = get_input('distance', 200);
	$avg = get_input('avg', 8.3);
	$price = get_input('price', 375);

	//print_form($distance, $avg, $price);
?>

				<form action="" method="get">
				
					<div>
						<label for="distance">Távolság (km)</label>
						<input type="number" id="distance" value="<?= $distance ?>" name="distance">
					</div>
					<div>
						<label for="avg">Átlagfogyasztás (L/100km)</label>
						<input type="number" id="avg" value="<?= $avg ?>" name="avg" step="0.1">
					</div>
					<div>
						<label for="price">Üzemanyagár (HUF/L)</label>
						<input type="number" id="price" value="<?= $price ?>" name="price">
					</div>
					
					<button>Kalkuláció</button>
					
				</form>

<?php

	$amount = number_format($distance/100*$avg, 2);
	$total = number_format($price*$amount, 0, ".", " ");

	//var_dump([$amount, $total]);

	if($_GET)
	{
	echo '</section>
		
			<section class="collection">
				
				<h2>Eredmény</h2>
				
				<div class="result">
					
					<h3>Szükséges mennyiség</h3>
					<p class="amount">'. $amount . ' liter</p>
					
					<h3>Várható költség</h3>
					<p class="total">'. $total .' HUF</p>
					
				</div>
				
			</section>';
	}
?>		
		</div>
	</div>
	
</body>
</html>