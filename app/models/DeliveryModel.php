<?php
class DeliveryModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addDelivery($order_id, $customer_name, $delivery_address, $delivery_status) {
        $date_added = date('Y-m-d H:i:s');
        $stmt = $this->conn->prepare("INSERT INTO deliveries (order_id, customer_name, delivery_address, delivery_status, date_added) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $order_id, $customer_name, $delivery_address, $delivery_status, $date_added);
        $stmt->execute();
        $stmt->close();
    }

    public function getDeliveries() {
        $result = $this->conn->query("SELECT * FROM deliveries ORDER BY date_added DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
