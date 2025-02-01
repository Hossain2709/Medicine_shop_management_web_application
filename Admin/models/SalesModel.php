<?php
class SalesModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addSale($product_name, $quantity, $price) {
        $total_price = $quantity * $price;
        $date = date('Y-m-d H:i:s');

        $stmt = $this->conn->prepare("INSERT INTO sales (product_name, quantity, price, total_price, sale_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sidds", $product_name, $quantity, $price, $total_price, $date);
        return $stmt->execute();
    }

    public function getSales() {
        $result = $this->conn->query("SELECT * FROM sales ORDER BY sale_date DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
