<!-- 
Teendők hozzáadása (title és description) - cím megadása kötelező
Tárolás: adatbázisban, vagy fájlban
Megjelenítése listában + készre állítás (lehetőleg ne töröljünk)
Alsó menü által váltás a két nézet között: bevitel, listázás
-->

<?php 
require_once 'functions.php';
$id = get_done();
if($id)
{
	complete_task($id);
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
	
	<meta charset="UTF-8">
	
	<title>Teendők Listája</title>
    
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    
    <meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	
	<link rel="stylesheet" href="src/style.css">
	<link rel="stylesheet" href="src/resp.css">
	<link rel="stylesheet" href="src/fontawesome5/css/all.css">
	
</head>
<body>

	<div id="title-bar">
		<h1>
			<i class="fas fa-sticky-note"></i>
			Teendők Listája
		</h1>
	</div>

	<div id="main">
		<div class="inside">

			<?php 
				$func = get_func();
				switch ($func)
				{
					case "new": show_form(); break;
					case "list": show_tasks(); break;
					default: show_form();
				}
			?>
		
		</div>
	</div>

	<div id="navigation-bar">
		<ul>
			<li>
				<a href="?func=new" title="Új teendő">
					<i class="fas fa-plus-square"></i>
				</a>
			</li>
			<li>
				<a href="?func=list" title="Teendők listája">
					<i class="far fa-list-alt"></i>
				</a>
			</li>
		</ul>
	</div>
	
</body>
</html>