<?php 

    include('login.php');

    $firstName = !empty($_POST) ? $_POST['name'] : null ;
    $lastName = !empty($_POST) ? $_POST['lastname'] : null ;
    $mail = !empty($_POST) ? $_POST['e-mail'] : null ;
    $password = !empty($_POST) ? $_POST['password'] : null ;
    $confirmPassword = !empty($_POST) ? $_POST['confirm-password'] : null ;

    if($_POST){
        if(empty($lastName)){
            echo 'Veuillez renseigner votre nom';
        } else if(empty($firstName)){
            echo 'Veuillez renseigner votre prénom';
        } else if(empty($mail)){
            echo 'Veuillez renseigner votre adresse mail';
        } else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            echo 'Votre adresse mail ne respecte pas de format valide';
        } else if(empty($password)){
            echo'Veuillez renseigner votre mot de passe';
        } else if ($password != $confirmPassword){
            echo'Vos deux mots de passe ne concordent pas';
        } else {
            insert($db, $firstName, $lastName, $mail, $password);
            find_user($db, $mail, $password);
            header('location: ../index.php');
        }
    }

     function insert($db, $firstName, $lastName, $mail, $password){
        $request_string = "INSERT INTO `user` (`first_name`, `last_name`, `mail`, `password`, `role`) VALUES (?, ?, ?, ?, ?)";
        $request = $db->prepare($request_string);
        $request->execute([$firstName, $lastName, $mail, $password, 'user']);
    }
?>