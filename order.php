<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
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
    if(!isset($_SESSION['logged'])){
        header('Location: index.php');
    }
?>
<div class="placeorder content-wrapper">
    <h1>Merci pour votre commande</h1>
    <p>Nous vous enverrons sous peu un courrier éléctronique où vous pourrez retrouver tous les détails de la transaction.</p>
</div>
</body>
</html>