<?php
class InventoryModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Add new product to the selected section
    public function addProduct($section, $product_name, $quantity, $price) {
        $stmt = $this->conn->prepare("INSERT INTO $section (name, stock_quantity, price) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $product_name);
        $stmt->bindParam(2, $quantity, PDO::PARAM_INT);
        $stmt->bindParam(3, $price, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Fetch inventory data for a specific section
    public function getInventoryBySection($section) {
        $stmt = $this->conn->prepare("SELECT * FROM $section");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Use PDO's fetchAll() method to get results
    }

    // Fetch all sections of inventory
    public function getAllSections() {
        return ['prescriptions', 'personal_care', 'devices', 'supplements', 'ayurvedic_products'];
    }
}
?>