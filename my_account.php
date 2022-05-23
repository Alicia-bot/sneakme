<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
	<link rel="icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/botStyle.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    <link href="bot.html" rel="import" />
    <script src="https://kit.fontawesome.com/753aa87031.js" crossorigin="anonymous"></script>
</head>
<body>

    <!--Header-->
    <?php include "header.php"; 
    if(!isset($_SESSION['logged'])){
        header('Location: index.php');
    }
    ?>

    <!--Footer-->
    <?php include "footer.html" ?>

</body>
</html>