<?php
class CustomerModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Add new customer
    public function addCustomer($customer_name, $email, $phone, $address) {
        $date_added = date('Y-m-d H:i:s');
        $stmt = $this->conn->prepare("INSERT INTO customers (customer_name, email, phone, address, date_added) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $customer_name, $email, $phone, $address, $date_added);
        $stmt->execute();
        $stmt->close();
    }

    // Get all customer records
    public function getCustomers() {
        $stmt = $this->conn->query("SELECT * FROM customers ORDER BY date_added DESC");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }
}
?>
