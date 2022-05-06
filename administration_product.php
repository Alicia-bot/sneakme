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
        include "product_form_administration.php";
        $value = isset($_GET['edit']) ? find_one_shoe($db, $_GET['edit']) : null;
        $action = !isset($_GET['edit']) ? 'product_form_administration.php' : 'product_form_administration.php?edit='.$_GET['edit'];
    ?>
    <form action=<?= $action ?> method='post' enctype="multipart/form-data">
        <h1>Gérer un produit</h1>
        <div class="modif-photo">
            <div>
                <label for="product_file">Visuel</label>
                <input type="file" name="product_file" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <img id="preview" src=<?php echo($value['image'])?> alt="your image" width="800" height="500" />
        </div>
        <label for="bot_name">Ajouter des informations</label>
        <input type="texte" name="product_title" placeholder="Titre du produit" value=<?php echo($value['name']); ?>>
        <div class="flex_admin_product">
            <input type="number" name="product_price" placeholder="Prix (en euros)" step=".01" value=<?php echo($value['price']); ?>>
            <input type="number" name="product_pointure" placeholder="pointure" step=".01" value=<?php echo($value['size']); ?>>
        </div>
            
        <h3>Ajouter une description</h3>
        <textarea name="description" placeholder="Description"><?= $value['description'] ?></textarea>
        <button type="submit">Valider</button>
    </form>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>