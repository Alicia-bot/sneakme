<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homme</title>
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
    include "functions/product_form_administration.php";
    $results = find_men_shoes($db);
    ?>

    <h1>Homme</h1>
    <hr>
    <p>Découvrez les Sneakers pour homme de Sneak Me.</p>

     <!--Minifiches produits-->
    <section id="trend">
        <div class="flex">
            <?php
            foreach ($results as $value) {
            ?>
                <a href="product_sheet.php?product=<?php echo($value['id'])?>">
                    <img src=<?php echo('images/'.$value['image'])?> alt=<?php echo($value['name'])?>>
                    <br>
                    <span><?php echo($value['name'])?></span>
                    <p><?php echo($value['price'])?>€</p>
                </a>
            <?php 
            } 
            ?>
        </div>
    </section>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>
</html>