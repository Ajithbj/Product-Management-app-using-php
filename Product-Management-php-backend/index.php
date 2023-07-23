<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
</head>
<body>
    <h1>Product List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        $products = fetchProductsFromDatabase();
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>{$product['id']}</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['description']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$product['quantity']}</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Add New Product</h2>
    <form action="create.php" method="post">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Description: <textarea name="description"></textarea></label><br>
        <label>Price: <input type="number" name="price" step="0.01" required></label><br>
        <label>Quantity: <input type="number" name="quantity" required></label><br>
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
