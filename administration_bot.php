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
        include 'functions/bot_form_administration.php';
        $datas = find_bot($db);
        if(!isset($_SESSION['logged']) || $_SESSION['role'] != 'moderator'){
            header('Location: index.php');
        }
    ?>

    <h1>Gestion du bot</h1>
    <form action="functions/bot_form_administration.php" method='post' enctype="multipart/form-data">
        <div class="modif-photo">

            <label for="bot_name">Visuel</label> <br>
            <div class="wrapper">
                <div class="file-upload">
                    <input type="file" name="sneak_file" accept=".jpg, .jpeg, .png" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])" >
                    <i class="fa fa-plus"></i>
                </div>
            <div class="visuel-img">
                <img id="preview" src=<?php echo('images/'.$datas['image'])?> alt= "Visualisation de votre image" name="preview"/>
            </div>
            </div>
        </div>
        <div class="modif-nom-bot">
            <label for="bot_name">Nom du bot</label> <br>
            <input type="text" name="bot_name" placeholder="Nom du chatbot" value=<?php echo($datas['name']); ?>>
        </div>

        <div class="textes-bot">
        <label for="bienvenue_text">Message de bienvenue</label> <br>
            <textarea name="bienvenue_text" placeholder="Votre texte de bienvenue"><?php echo($datas['welcome_message']); ?></textarea> <br>
            <label for="au_revoir_text">Message d'au revoir</label> <br>
            <textarea name="au_revoir_text" placeholder="Votre texte d'au revoir"><?php echo($datas['farewell_message']); ?></textarea>
        </div>
        <div class="flex">
            <button id="actualiser-bot" type="submit">Valider</button>
        </div>
    </form>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>