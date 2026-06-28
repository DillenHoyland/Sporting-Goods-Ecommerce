<?php
session_start();

$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$dbname = "prototype"; 

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die("Please log in.");
}

$user_id = $_SESSION['user_id'];


if (isset($_POST['product_id'], $_POST['action'])) {
    $product_id = intval($_POST['product_id']);
    $action = $_POST['action'];

  
    $prepared = $conn->prepare("SELECT product_price FROM product WHERE product_id = ?");
    
    $prepared->bind_param("i", $product_id);
    $prepared->execute();
    $price = $prepared->get_result()->fetch_assoc()['product_price'];
    $prepared->close();

    if ($action === "add") {
        
        $prepared2 = $conn->prepare("
            INSERT INTO cart (user_id, product_id, price, quantity) 
            VALUES (?, ?, ?, 1)
            ON DUPLICATE KEY UPDATE quantity = quantity + 1
        ");
        $prepared2->bind_param("iid", $user_id, $product_id, $price);
        $prepared2->execute();
        $prepared2->close();
    } elseif ($action === "remove") {
        
        $prepared3 = $conn->prepare("
            UPDATE cart 
            SET quantity = quantity - 1 
            WHERE user_id = ? AND product_id = ? AND quantity > 0
        ");
        $prepared3->bind_param("ii", $user_id, $product_id);
        $prepared3->execute();
        $prepared3->close();

       
        $prepared4 = $conn->prepare("DELETE FROM cart WHERE user_id = ? AND product_id = ? AND quantity <= 0");
        $prepared4->bind_param("ii", $user_id, $product_id);
        $prepared4->execute();
        $prepared4->close();
    }
}
?>




