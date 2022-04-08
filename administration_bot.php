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

    <h1>Modifier le bot</h1>
    <div class="modif-photo">
        <div>
            <h3>Modifier la photo</h3>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="aperçu" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
        </div>
        <img id="preview" alt="your image" width="800" height="500" />
    </div>
    <div>
        <label for="bot_name">Nom du bot</label>
        <input type="texte" name="bot_name" placeholder="Nom du chatbot">
    </div>
    <div>
        <h3>Champs texte</h3>
        <p>Au mot clé <input type="text" name="mot_cle" placeholder="votre mot clé">, votre chatbot pourra répondre <input type="text" name="reponse" placeholder="la réponse"></p>
    </div>
    <button type="submit">Ajouter un mot clé</button>
    </form>
    <h3>Texte de bienvenue</h3>
    <input type="text" name="bienvenue_text" placeholder="Votre texte de bienvenue">
    <h3>Texte d'au revoir</h3>
    <input type="text" name="au_revoir_text" placeholder="Votre texte d'au revoir">

    <!--Footer-->
    <?php include "footer.html" ?>

</body>