<?php
require_once 'models/CustomerModel.php';
require_once 'controllers/CustomerController.php';

// Database connection
$conn = new mysqli('localhost', 'root', '', 'adminn');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Instantiate the model and controller
$model = new CustomerModel($conn);
$controller = new CustomerController($model);

// Handle form submission for adding a customer
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_customer'])) {
    $controller->handleRequest();
}

// Fetch all customers to display
$customers = $controller->getCustomers();

// Include the view to display the customers
require_once 'views/customerView.php';

$conn->close();
?>
