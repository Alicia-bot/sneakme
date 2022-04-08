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
    <?php include "header.php" ?>

    <h1>Ajouter un produit</h1>
    <div class="modif-photo">
        <div>
            <h3>Ajouter des photos</h3>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="aperçu" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <img id="preview" alt="your image" width="800" height="500" />
    </div>
        <label for="bot_name">Ajouter des informations</label>
        <input type="texte" name="product_title" placeholder="Titre du produit">
        <div class="flex_admin_product">
            <input type="number" name="product_price" placeholder="Prix">
            <input type="number" name="product_pointure" placeholder="pointure">
        </div>
    <h3>Ajouter une collaboration ?</h3>
    <input type="select">
       <nom>collaboration</nom>
       <option valeur="yes">Oui</option>
       <option valeur="no">Non</option>
    </input>
    <div>
        <input type="file" name="aperçu_collab" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
        <img id="preview_collab" alt="your image" width="100" height="100" />
    </div>
    <div>
        <input type="file" name="aperçu_collab" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
        <img id="preview_collab" alt="your image" width="100" height="100" />
    </div>
        
    <h3>Ajouter une description</h3>
    <input type="text" name="description_text" placeholder="Description...">
    <button type="submit">Ajouter</button>
    </form>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>