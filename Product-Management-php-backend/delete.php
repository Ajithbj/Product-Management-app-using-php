<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];

    if (empty($id)) {
        header("Location: index.php?error=MissingFields");
        exit;
    }

    $response = deleteProductFromDatabase($id);
    
    if ($response === true) {
        header("Location: index.php");
        exit;
    } else {
        header("Location: index.php?error=DeleteFailed");
        exit;
    }
}

function deleteProductFromDatabase($id) {
    return true;
}
?>
