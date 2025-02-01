<?php
$host = 'localhost';
$db = 'pharmacy';
$user = 'root';
$pass = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

require_once 'controllers/InventoryController.php';
$controller = new InventoryController($conn);

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $section = $_POST['section'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $message = $controller->addProduct($section, $product_name, $quantity, $price);
}

$inventory_data = $controller->getInventoryData();

include 'views/inventoryView.php';
?>
