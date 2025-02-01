<?php
class UserModel {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function authenticateUser($username, $password) {
        $stmt = $this->conn->prepare("SELECT id, username, password FROM userss WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $storedUsername, $storedPassword);
            $stmt->fetch();

            // Check if the password matches
            if ($password === $storedPassword) {
                return ['id' => $id, 'username' => $storedUsername];
            }
        }
        return null;  // Return null if user not found or password doesn't match
    }
}
?>
