<?php
// Start the session if not already started
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Include the DashboardController to handle the request
require_once 'controllers/DashboardController.php';

// Instantiate the DashboardController and call handleRequest to load the view
$dashboardController = new DashboardController();
$dashboardController->handleRequest();
?>
