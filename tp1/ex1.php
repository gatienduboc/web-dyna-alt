<!doctype html>
<html lang="fr">
<head>
	<title>TP1 - Exo1</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="TP1-Exo1">
	<meta name="author" content="Gatien Duboc">

</head>

<body>
	<a href="./ex1.php?message=1">Afficher 1</a><br/>
	<a href="./ex1.php?message=2">Afficher 2</a><br/>
	<a href="./ex1.php?message=3">Afficher 3</a>
	<p>
	<?php echo "Vous êtes sur la page n° ".$_GET["message"]; ?>
	</p>
</body>

</html>