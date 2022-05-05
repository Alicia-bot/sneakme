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
    <?php 
        include "header.php";
        include 'bot_form_administration.php';
        $datas = find_bot($db);
    ?>

    <h1>Modifier le bot</h1>
    <form action="bot_form_administration.php" method='post' enctype="multipart/form-data">
        <div class="modif-photo">
            <div>
                <label for="sneak_file">Visuel</label>
                <input type="file" name="sneak_file" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <img id="preview" alt="your image" width="800" height="500" />
        </div>
        <div>
            <label for="bot_name">Nom du bot</label>
            <input type="text" name="bot_name" placeholder="Nom du chatbot" value=<?php echo($datas['name']); ?>>
        </div>
        <label for="bienvenue_text">Message de bienvenue</label>
        <textarea name="bienvenue_text" placeholder="Votre texte de bienvenue"><?php echo($datas['welcome_message']); ?></textarea>
        <label for="au_revoir_text">Message d'au revoir</label>
        <textarea name="au_revoir_text" placeholder="Votre texte d'au revoir"><?php echo($datas['farewell_message']); ?></textarea>
        <button type="submit">Valider</button>
    </form>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>