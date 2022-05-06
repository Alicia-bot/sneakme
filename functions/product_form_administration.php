<?php

$db = null;

include('database.php');

$db = getConnexion();


if(!empty($_POST)){
    $name = $_POST['product_title'];
    $price = $_POST['product_price'];
    $size = $_POST['product_pointure'];
    $description = $_POST['description'];

    $info = pathinfo($_FILES['product_file']['name']);
    $ext = $info['extension']; // get the extension of the file
    $newname = $_FILES['product_file']['name'].".".$ext; 

    $target = 'images/'.$newname;
    move_uploaded_file( $_FILES['product_file']['tmp_name'], $target);
}
if(isset($name) && !empty($name) && isset($price) && !empty($price) && isset($size) && !empty($size) && isset($description) && !empty($description)){
    if(!isset($_GET['edit'])){
        insert($db, $name, $price, $size, $target, $description);
    } else {
        $id = $_GET['edit'];
        update($db, $name, $price, $size, $target, $description, $id);
    }
    header('location: ../administration_list_product.php');
}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    delete($db, $id);
    header('location: ../administration_list_product.php');
}

function find_shoes($db){
    $request_string = "SELECT * FROM shoes";
    $request = $db->prepare($request_string);
    $request->execute();

    return $request;
}

function find_one_shoe($db, $id){
    $request_string = "SELECT * FROM shoes WHERE id = '$id'";
    $request = $db->prepare($request_string);
    $request->execute();
    $row = $request->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function insert($db, $name, $price, $size, $target, $description){
    $request_string = "INSERT INTO `shoes` (`name`, `price`, `size`, `image`, `description`) VALUES (?, ?, ?, ?, ?)";
    $request = $db->prepare($request_string);
    $request->execute([$name, $price, $size, $target, $description]);
}

function update($db, $name, $price, $size, $target, $description, $id){
    $request_string = "UPDATE shoes SET name = '$name', price = '$price', size = '$size', image = '$target', description = '$description' WHERE id = '$id'";
    $request = $db->prepare($request_string);
    $request->execute([$name, $name, $price, $size, $target, $description]);
}

function delete($db, $id){
    $request_string = "DELETE FROM shoes WHERE id = '$id'";
    $request = $db->prepare($request_string);
    $request->execute();
}

?>