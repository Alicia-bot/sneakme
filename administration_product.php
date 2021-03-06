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
    <script src="https://kit.fontawesome.com/753aa87031.js" crossorigin="anonymous"></script>
</head>

<body>
    <!--Header-->
    <?php include "header.php";
        include "functions/product_form_administration.php";
        $value = isset($_GET['edit']) ? find_one_shoe($db, $_GET['edit']) : null;
        $action = !isset($_GET['edit']) ? 'functions/product_form_administration.php' : 'functions/product_form_administration.php?edit='.$_GET['edit'];
        if(!isset($_SESSION['logged']) || $_SESSION['role'] != 'moderator'){
            header('Location: index.php');
        }
    ?>

    <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
    <h1>Ajouter un produit</h1>
    <div class="modif-photo">
        <label for="product_file" >Ajouter des photos</label>
        <div class="wrapper">
            <div class="file-upload">
                <input type="file" name="product_file" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
                <i class="fa fa-plus"></i>
            </div>
        </div>
            <div class="visuel-img">
                <img id="preview" src="images/<?php echo($value['image'])?>" alt= "Visualisation de votre image"/>
            </div>
                <label for="bot_name">Ajouter des informations</label> <br>
                <input id="produit" type="texte" name="product_title" placeholder="Titre du produit" value="<?php echo($value['name']); ?>">
                <select name="gender" id="gender">
                    <?php
                    // short way to init the select input
                        foreach ($gender_array as $gender) {
                            // case edit shoe, find the selected one
                        $selected = $value['gender'] == $gender ? 'selected' : null;
                    ?>
                        <option value="<?=$gender?>" <?=$selected?>><?=$gender?></option>
                    <?php 
                        } 
                    ?>
                </select>
                <div>
                    <input id="prix" type="number" name="product_price" placeholder="Prix (en euros)" step=".01" value=<?php echo($value['price']); ?>>
                    <input id="pointure" type="number" name="product_pointure" placeholder="pointure" step=".01" value=<?php echo($value['size']); ?>>
                </div>
                <label>Ajouter une description</label>
                <textarea id="description" type="text" name="description" placeholder="Description..."><?= $value['description'] ?></textarea>
                <div class="flex">
                <button id="ajouter-produit" type="submit">Valider</button>
                </div>
            </form>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>