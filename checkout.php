<?php
session_start();

$servername = "localhost";
$dbusername = "root"; 
$dbpassword = ""; 
$dbname = "prototype"; 

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if (!isset($_SESSION['user_id'])) {
    die("Please log in.");
}

$user_id = $_SESSION['user_id'];




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$prepared = $conn->prepare("SELECT product_id, quantity, price FROM cart WHERE user_id = ?");
$prepared->bind_param("i", $user_id);
$prepared->execute();
$result = $prepared->get_result();
$prepared->close();

$total_price = 0;
$total_count = 0;

while ($row = $result->fetch_assoc()) {
    $total_count += $row['quantity'];
    $total_price += $row['quantity'] * $row['price'];
}


$prepared2 = $conn->prepare("INSERT INTO checkout (user_id, total, count) VALUES (?, ?, ?)");
$prepared2->bind_param("idi", $user_id, $total_price, $total_count);
$prepared2->execute();
$prepared2->close();


$prepared3 = $conn->prepare("DELETE FROM cart WHERE user_id = ?");
$prepared3->bind_param("i", $user_id);
$prepared3->execute();
$prepared3->close();


echo "Checkout complete!";

header("Location: home.php");
exit;

?>