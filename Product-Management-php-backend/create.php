<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    if (empty($name) || empty($price) || empty($quantity)) {
        header("Location: index.php?error=MissingFields");
        exit;
    }
    $response = addProductToDatabase($name, $description, $price, $quantity);
    if ($response) {
        header("Location: index.php?success=ProductAdded");
        exit;
    } else {
        header("Location: index.php?error=ProductNotAdded");
        exit;
    }
}
?>
