<?php
include "functions/product_form_administration.php";
$value = find_one_shoe($db, $_GET['product']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($value['name'])?></title>
	<link rel="icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/botStyle.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <script src="https://kit.fontawesome.com/753aa87031.js" crossorigin="anonymous"></script>
</head>
<body>

	<!--Header-->
    <?php include "header.php";
	?>

	<section class="flex">
		<div class="flex-1">
			<div class="first-product">
				<img src=<?php echo('images/'.$value['image'])?> alt="<?php echo($value['name'])?>">
			</div>
		    <ul id="gallery">
		        <li>
		            <img src=<?php echo('images/'.$value['image'])?> alt="Photo <?php echo($value['name'])?>" />
		        </li>
		        <li>
		            <img src=<?php echo('images/'.$value['image'])?> alt="Photo 2 <?php echo($value['name'])?>" />
		        </li>
		        <li>
		            <img src=<?php echo('images/'.$value['image'])?> alt="Photo 3 <?php echo($value['name'])?>" />
		        </li>
		        <li>
		            <img src=<?php echo('images/'.$value['image'])?> alt="Photo 4 <?php echo($value['name'])?>" />
		        </li>
		        <li>
		            <img src=<?php echo('images/'.$value['image'])?> alt="Photo <?php echo($value['name'])?>" />
		        </li>
		        <li>
		            <img src=<?php echo('images/'.$value['image'])?> alt="Photo <?php echo($value['name'])?>" />
		        </li>
		        <li>
		            <img src=<?php echo('images/'.$value['image'])?> alt="Photo <?php echo($value['name'])?>" />
		        </li>
		    </ul>
		</div>

		<div class="flex-2">
			<h2><?php echo($value['name'])?></h2>
			<hr>
			<div class="disponibilite">
				<img id="dispo" src="images/disponible.png" alt="Disponibilité">
				<p>Disponible</p>
			</div>
			<div class="neumorphism">
				<div class="flex">
					<p>Pointure :</p>
					<a href="#" class="btn"><?php echo($value['size'])?></a>
				</div>
				<div class="choice-product">
					<img src=<?php echo('images/'.$value['image'])?> alt="<?php echo($value['name'])?>">
				</div>
			</div>
			<div id="price-product">
				<form action="functions/cart.php" method="post">
					<input type="number" name="quantity" value="1" min="1" max="999" placeholder="Quantity" required>
            		<input type="hidden" name="product_id" value="<?=$value['id']?>">
					<input type="submit" class="add-to-cart" value="Ajouter au panier">
				</form>
				<p><?php echo($value['price'])?>€</p>
			</div>
		</div>
	</section>
	<section>
		<hr>
		<p><?php echo($value['description'])?></p>
		<hr>
		<p>Les produits achetés sur SNEAK ME peuvent être livrés dans le monde entier, les colis sont assurés au montant des achats pour garantir un maximum de sécurité.</p>
		<span>Les délais de livraison sont :</span>
		<ul>
			<li>France : 7-10 jours ouvrés maximum.</li>
			<li>Europe et DOM-TOM : 15 jours ouvrés maximum.</li>
			<li>Monde : 20 jours ouvrés maximum.</li>
		</ul>
		<hr>
		<p>Nous travaillons avec des revendeurs professionnels, semi-professionnels et des particuliers passionés dans ce domaine afin de vous fournir des paires authentiques tout au long de l'année.</p>
		<i>Tous les produits vendus sur Sneak Me sont neufs et contrôlés par nos employés avant de vous êtres envoyé</i>
	</section>

	<div class="banner-product">
		<div>
			<img src="images/fiche_produit/authentic.png" alt="Neufs et authentiques">
			<p>Produits 100% neufs et authentiques</p>
		</div>
		<div>
			<img src="images/fiche_produit/delivery.png" alt="Livraison">
			<p>Livraison mondiale</p>
		</div>
		<div>
			<img src="images/fiche_produit/payment.png" alt="Paiement sécurisé">
			<p>Paiement sécurisé</p>
		</div>
	</div>

	<!--Footer-->
    <?php include "footer.html" ?>

</body>
</html>