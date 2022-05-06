<?php

include('database.php');

$mail = !empty($_POST) ? $_POST['e-mail'] : null ;
$password = !empty($_POST) ? $_POST['password'] : null ;

$db = getConnexion();
find_user($db, $mail, $password);
function find_user($db, $mail, $password){
    $request_string = "SELECT * FROM user WHERE mail =:mail AND password =:password";
    $request = $db->prepare($request_string);
    $request->execute([':mail'=>$mail, ':password'=>$password]);
    $row = $request->fetch(PDO::FETCH_ASSOC);
    if($mail === $row['mail'] && $password === $row['password']){
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['userName'] = $row['first_name'];
        $_SESSION['userId'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        header('location: ../index.php');
    }
}

?>