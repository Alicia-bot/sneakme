<?php

$db = null;

include('database.php');

$db = getConnexion();


if(!empty($_POST)){
    $name = $_POST['bot_name'];
    $welcome = $_POST['bienvenue_text'];
    $farewell = $_POST['au_revoir_text'];

    $info = pathinfo($_FILES['sneak_file']['name']);
    $ext = $info['extension']; // get the extension of the file
    $newname = "newSneak.".$ext; 

    $target = 'images/'.$newname;
    move_uploaded_file( $_FILES['sneak_file']['tmp_name'], $target);
}


$bot = find_bot($db);

if(isset($name) && !empty($name) && isset($welcome) && !empty($welcome) && isset($farewell) && !empty($farewell)){
    if(empty($bot)){
        insert($db, $target, $name, $welcome, $farewell);
    } else {
        update($db, $target, $name, $welcome, $farewell);
    }
    header('location: index.php');
}

function find_bot($db){
    $request_string = "SELECT * FROM bot";
    $request = $db->prepare($request_string);
    $request->execute();
    $row = $request->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function update($db, $target, $name, $welcome, $farewell){
    $request_string = "UPDATE bot SET name = '$name', image = '$target', welcome_message = '$welcome', farewell_message = '$farewell'";
    $request = $db->prepare($request_string);
    $request->execute([$name, $target, $welcome, $farewell]);
}

function insert($db, $target, $name, $welcome, $farewell){
    $request_string = "INSERT INTO `bot` (`name`, `image`, `welcome_message`, `farewell_message`) VALUES (?, ?, ?, ?)";
    $request = $db->prepare($request_string);
    $request->execute([$name, $target, $welcome, $farewell]);
}

?>