<?php
session_start();

class LogoutController {
    public function logout() {
        session_unset();  // Unset all session variables
        session_destroy(); // Destroy the session
        header("Location: login.php"); // Redirect to login page
        exit();
    }
}

// Instantiate and execute logout
$logoutController = new LogoutController();
$logoutController->logout();
?>
