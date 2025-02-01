<?php
require_once 'models/SalesModel.php';
require_once 'controllers/SalesController.php';

$conn = new mysqli('localhost', 'root', '', 'adminn');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$model = new SalesModel($conn);

$controller = new SalesController($model);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_sale'])) {
    $controller->handleRequest();
}

// Fetch sales records
$sales_data = $controller->getSalesRecords();

// Include the view to display the sales data
require_once 'views/salesView.php';
?>
