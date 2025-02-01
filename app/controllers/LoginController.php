<?php
// Corrected path to the UserModel
require_once 'models/UserModel.php';  // Adjust the path if needed

class LoginController {
    private $conn;
    private $userModel;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
        $this->userModel = new UserModel($this->conn);  // Correct way to instantiate the UserModel
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Authenticate user via UserModel
            $user = $this->userModel->authenticateUser($username, $password);

            if ($user) {
                // User authenticated successfully, redirect to dashboard
                $_SESSION["user_id"] = $user['id'];
                $_SESSION["username"] = $user['username'];
                header("Location: dashboard.php");
                exit;
            } else {
                echo "Invalid login credentials.";
            }
        }
    }
}
?>
