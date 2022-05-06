<?php
$db = null;

include('database.php');

$db = getConnexion();

if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $request_string = "SELECT * FROM shoes WHERE id = ".$_POST['product_id'];
    $request = $db->prepare($request_string);
    $request->execute();
    $product = $request->fetch(PDO::FETCH_ASSOC);
    if ($product && $quantity > 0) {
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    header('location: cart.php');
    exit;
}

// function getNumberInCart(){
//     $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
//     return $num_items_in_cart;
// }