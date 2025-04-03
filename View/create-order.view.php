<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<header>

		<nav>
			<ul>
				<li>Créer une commande</li>
			</ul>
		</nav>

	</header>

	<main>

<!-- je regarde s'il y une clé order dans mon espace de stockage de session sur le serveur
 si oui, j'affiche les infos à l'intérieur-->
 
	<?php if (array_key_exists("order", $_SESSION)) { ?>
		<p>Vous avez une commande en attente : <?php echo $_SESSION["order"]["quantity"]; ?> : <?php echo $_SESSION["order"]["product"]; ?></p>
		<p>Créée le <?php echo $orderByUser['createdAt'] ->format('y-m-d'); ?></p> 
		<?php } ?>



		<form method="POST" >

			<label for="quantity">Quantity
				<input type="number" name="quantity" />
			</label>

			<label for="product">
				<select name="product">
				<!--pour chaque produit de la base de donnée produit j'affiche le produit commandé-->
				<?php foreach ($products as $product) {?>
					<option value="<?php echo $product; ?>"><?php echo $product; ?></option>
					<?php } ?>
				</select>
			</label>

			<button type="submit">Créer la commande</button>

		</form>

	</main>

</body>
</html>