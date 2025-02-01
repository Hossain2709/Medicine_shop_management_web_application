<?php
require_once 'models/DeliveryModel.php';
require_once 'controllers/DeliveryController.php';

$conn = new mysqli('localhost', 'root', '', 'adminn');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Instantiate DeliveryModel with the database connection
$model = new DeliveryModel($conn);

// Instantiate DeliveryController with the DeliveryModel
$controller = new DeliveryController($model);

// Handle form submission for adding a delivery
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_delivery'])) {
    $controller->handleRequest();
}

// Fetch delivery records
$delivery_data = $controller->getDeliveries();

// Include the view to display the delivery data
require_once 'views/deliveryView.php';
?>
