<!-- 
Az URL-ben lévő firstDay és reduction paraméterek meglétekor történik a számolás
Kalkuláció: a hónap első napján félreteszek "firstDay" összeget (PL 1500); majd a következő napon már "reduction"-nel kevesebbet (PL 50 esetén a második napon már csak 1450, stb.)
Mennyi jön össze 30 nap alatt? Mennyi egy év alatt?
-->
<?php
	require_once 'functions.php';
	$firstDay = get_input("firstDay", 1500);
	$reduction = get_input("reduction", 50);

	if($_GET)
	{
		$results = savings_table($firstDay, $reduction);
	}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
	
	<meta charset="UTF-8">
	
	<title>Spórolás Kalkulátor</title>
    
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    
    <meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	
	<link rel="stylesheet" href="src/style.css">
	
</head>
<body>

	<div id="title-bar">
		<div>
			<h1>Spórolás Kalkulátor</h1>
		</div>
	</div>
	
	<div id="main">

		<section class="input">
		
			<h2>Mennyit tudnál félretenni?</h2>
		
			<form action="#outputSummary" method="get">
				
				<div>
					<label for="firstDay">A hónap első napján</label>
					<input type="number" id="firstDay" name="firstDay" value="<?php echo $firstDay; ?>">
				</div>

				<div>
					<label for="reduction">Csökkentés naponta</label>
					<input type="number" id="reduction" name="reduction" value="<?php echo $reduction; ?>">
				</div>
				
				<button>Kalkuláció</button>
				
			</form>
		
		</section>
<?php
	if(isset($results))
	{
		require_once('outputSummary.php');
	}
?>
<!--
		<section class="outputSummary">
			
			<h2>Eredmény</h2>
			
			<p>Ha a hónap első napján félreteszel <span class="firstDay">X</span> Ft-ot, majd aztán minden további nap <span class="reduction">Y</span> Ft-tal kevesebbet, akkor az alábbi megspórolt összegekre számíthatsz:</p>
			
			<div class="summary">
				<h3>Egy hónap alatt</h3>
				<p class="result month">A Ft</p>

				<h3>Egy év alatt</h3>
				<p class="result year">B Ft</p>

				<a href="" class="new">Új kalkuláció</a>
			</div>
			
		</section>
		
		<section class="outputDetails">
			
			<h2>Részletek</h2>
			
			<table>
				<thead>
					<tr>
						<th>Nap</th>
						<th>Napi betét</th>
						<th>Összesen</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th>1.</th>
						<td>1500 Ft</td>
						<td>1500 Ft</td>
					</tr>
					<tr>
						<th>2.</th>
						<td>1450 Ft</td>
						<td>2950 Ft</td>
					</tr>
					<tr>
						<th>3.</th>
						<td>1400 Ft</td>
						<td>4350 Ft</td>
					</tr>
					<tr>
						<th>4.</th>
						<td>1350 Ft</td>
						<td>5700 Ft</td>
					</tr>
					<tr>
						<th>5.</th>
						<td>1300 Ft</td>
						<td>7000 Ft</td>
					</tr>
				</tbody>
			</table>
			
		</section>
-->		
	</div>
	
</body>
</html>