<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneak me</title>
    <link rel="icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/botStyle.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" crossorigin="anonymous"/>
</head>

<body>
    <!--Header-->
    <?php include "header.php"; 
    include "functions/product_form_administration.php";
    $results = find_shoes($db);
    if(!isset($_SESSION['logged']) || $_SESSION['role'] != 'moderator'){
        header('Location: index.php');
    }
    ?>
    
    <table>
    <tr>
        <th>Image</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Taille</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php
        foreach ($results as $value) {
    ?>
    <tr style="text-align:center">
        <td><img src=<?= $value["image"]; ?> alt="alt"></td>
        <td><?= $value["name"]; ?></td>
        <td><?= $value["price"]; ?>€</td>
        <td><?= $value["size"]; ?></td>
        <td><?= $value["description"]; ?></td>
        <td><a href="administration_product.php?edit=<?= $value["id"]; ?>"><i class="fa-solid fa-pen-to-square" title="Editer"></i></a> <a href="functions/product_form_administration.php?delete=<?= $value["id"]; ?>"><i class="fa-solid fa-trash-can" title="Supprimer"></i></a></td>
    </tr>
    <?php 
        } 
    ?>
</table>
    
</table>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>