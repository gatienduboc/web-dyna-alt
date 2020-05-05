<!doctype html>
<html lang="fr">
<head>
	<title>TP1 - Exo2</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="TP1-Exo2">
	<meta name="author" content="Gatien Duboc">

</head>

<body>

	<h2><a href="./ex2.php?message=Message1&size=15&color=%23ff0000">Afficher "Message 1" en rouge, avec une taille de 15px</a></h2>
	<h2><a href="./ex2.php?message=Message2&size=30&color=%232ff000">Afficher "Message 2" en vert, avec une taille de 30px</a></h2>
	<h2><a href="./ex2.php?message=Message3&size=50&color=%230000ff">Afficher "Message 3" en bleu, avec une taille de 50px</a></h2>
	
	<p>
		<?php if(!empty($_GET)) {

			$size = 12;
			$color = 0;
			$message = "Aucun message";

			if(!empty($_GET['size']))$size=$_GET['size'];
			if(!empty($_GET['color']))$color=urldecode($_GET['color']);
			if(!empty($_GET['message']))$message=urldecode($_GET['message']);

			?>

			<div style="font-size: <?=$size?>px;color:<?=$color?>"><?=$message?></div>
		<?php }else{ ?>
			<div style="font-size: 50px;color: #ff0000;">Un message d'erreur</div>

		<?php } ?>
	</p>
	<h3>
  		<a href="./ex2.php?message=<?=urlencode($message)?>&size=<?=$size+1?>&color=<?=urlencode($color)?>"><button>+</button></button></a>  
  		<a href="./ex2.php?message=<?=urlencode($message)?>&size=<?=$size-1?>&color=<?=urlencode($color)?>"><button>-</button></a>
  		
  	</h3>

	<form method="GET">

		<label for="message">Message : </label>
		<input type="text" value="Message 1" name="message" id="message">

		<label for="size">Size : </label>
		<input type="number" value="12" name="size" id="size">

		<label for="color">Color : </label>
		<input type="color" name="color" id="color">

		<input type="submit" value="Valider">
	</form>
</body>

</html>