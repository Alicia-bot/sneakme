<?php

include('database.php');

$gender_array = ['Homme', 'Femme'];

if(!empty($_POST)){
    $name = $_POST['product_title'];
    $price = $_POST['product_price'];
    $size = $_POST['product_pointure'];
    $description = $_POST['description'];
    $gender = $_POST['gender'];

    if($_FILES['product_file']['name'] && !$_GET['edit']){
        $info = pathinfo($_FILES['product_file']['name']);
        $ext = $info['extension']; // get the extension of the file
        $newname = $_FILES['product_file']['name'].".".$ext; 
    
        $target = '../images/'.$newname;
        move_uploaded_file( $_FILES['product_file']['tmp_name'], $target);
    } else {
        $newname = find_one_shoe($db, $_GET['edit'])['image'];
    }
}
if(isset($name) && !empty($name) && isset($price) && !empty($price) && isset($size) && !empty($size) && isset($description) && !empty($description)){
    if(!isset($_GET['edit'])){
        insert($db, $name, $price, $size, $newname, $description, $gender);
    } else {
        $id = $_GET['edit'];
        update($db, $name, $price, $size, $newname, $description, $id, $gender);
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

function find_men_shoes($db){
    $request_string = "SELECT * FROM shoes WHERE gender = 'Homme'";
    $request = $db->prepare($request_string);
    $request->execute();

    return $request;
}

function find_women_shoes($db){
    $request_string = "SELECT * FROM shoes WHERE gender = 'Femme'";
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

function insert($db, $name, $price, $size, $newname, $description, $gender){
    $request_string = "INSERT INTO `shoes` (`name`, `price`, `size`, `image`, `description`, `gender`) VALUES (?, ?, ?, ?, ?,?)";
    $request = $db->prepare($request_string);
    $request->execute([$name, $price, $size, $newname, $description, $gender]);
}

function update($db, $name, $price, $size, $newname, $description, $id, $gender){
    $request_string = "UPDATE shoes SET name = '$name', price = '$price', size = '$size', image = '$newname', description = '$description', gender = '$gender' WHERE id = '$id'";
    $request = $db->prepare($request_string);
    $request->execute([$name, $name, $price, $size, $newname, $description, $gender]);
}

function delete($db, $id){
    $request_string = "DELETE FROM shoes WHERE id = '$id'";
    $request = $db->prepare($request_string);
    $request->execute();
}

?>