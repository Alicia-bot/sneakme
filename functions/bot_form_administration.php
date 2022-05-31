<?php

include('database.php');

$bot = find_bot($db);

if(!empty($_POST)){
    $name = isset($_POST['bot_name']) && !empty($_POST['bot_name']) ? $_POST['bot_name'] : null;
    $welcome = isset($_POST['bienvenue_text']) && !empty($_POST['bienvenue_text']) ? $_POST['bienvenue_text'] : null;
    $farewell = isset($_POST['au_revoir_text']) && !empty($_POST['au_revoir_text']) ? $_POST['au_revoir_text'] : null;

    if (!empty($_FILES['sneak_file']['name'])) {
        $info = pathinfo($_FILES['sneak_file']['name']);
        $ext = $info['extension']; // get the extension of the file
        $newname = "newSneak.".$ext; 
    
        $target = '../images/'.$newname;
        move_uploaded_file( $_FILES['sneak_file']['tmp_name'], $target);
    } else if(empty($_FILES['sneak_file']['name']) && $bot != null){
        $newname = $bot['image'];
    }else {
        $newname = null;
    }
    
}

if($_POST){
    if(empty($bot)){
        insert($db, $newname, $name, $welcome, $farewell);
    } else {
        update($db, $newname, $name, $welcome, $farewell);
    }
    header('location: ../index.php');
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