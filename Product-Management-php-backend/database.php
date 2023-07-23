<?php
// Replace these with your actual database credentials
$host = 'localhost';
$username = 'root1';
$password = 'root';
$dbname = 'simple1';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

function fetchProductsFromDatabase() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    $products = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

function addProductToDatabase($name, $description, $price, $quantity) {
    global $conn;
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $price = (float) $price;
    $quantity = (int) $quantity;

    $sql = "INSERT INTO products (name, description, price, quantity) VALUES ('$name', '$description', $price, $quantity)";
    return $conn->query($sql);
}

function updateProductInDatabase($id, $name, $description, $price, $quantity) {
    global $conn;
    $id = (int) $id;
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $price = (float) $price;
    $quantity = (int) $quantity;

    $sql = "UPDATE products SET name='$name', description='$description', price=$price, quantity=$quantity WHERE id=$id";
    return $conn->query($sql);
}

function deleteProductFromDatabase($id) {
    global $conn;
    $id = (int) $id;

    $sql = "DELETE FROM products WHERE id=$id";
    return $conn->query($sql);
}
?>