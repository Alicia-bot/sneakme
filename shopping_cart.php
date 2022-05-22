<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon panier</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/botStyle.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <script src="https://kit.fontawesome.com/753aa87031.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
    include "header.php";
    include "functions/cart.php";
?>

<div class="cart content-wrapper">
    <h1>Mon panier</h1>
    <?php if (empty($products)): ?>
        <tr>
            <td colspan="5" style="text-align:center;">Vous n'avez aucun produit dans votre panier</td>
        </tr>
    <?php else: ?>
    <form action="functions/cart.php" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Produit</td>
                    <td>Prix à l'unité</td>
                    <td>Quantité</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="product_sheet.php?product=<?php echo($product['id'])?>">
                            <img src="<?=$product['image']?>" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="product_sheet.php?product=<?php echo($product['id'])?>"><?=$product['name']?></a>
                        <br>
                        <a href="shopping_cart.php?remove=<?=$product['id']?>" class="remove">Supprimer</a>
                    </td>
                    <td class="price"><?=$product['price']?>&euro;</td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price"><?=$product['price'] * $products_in_cart[$product['id']]?>&euro;</td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php 
        if (!empty($_SESSION['cart'])){
        ?>
        <div class="subtotal">
            <span class="text">Toal à payer</span>
            <span class="price"><?=$subtotal?>&euro;</span>
        </div>
        <div class="buttons">
            <input type="submit" value="Mettre à jour" name="update">
            <?php
            if (!empty($_SESSION['logged'])){
            ?>
                <input type="submit" value="Commander" name="placeorder">  
            <?php
            } else {
            ?>  
                <a href="inscription.php">Se connecter pour passer commande</a>
            <?php
            }
            ?>
        </div>
        <?php
        }
        ?>
    </form>
</div>
    
</body>
</html>