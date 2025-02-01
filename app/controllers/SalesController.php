<?php
require_once 'models/SalesModel.php';

class SalesController {
    private $salesModel;

    public function __construct(SalesModel $salesModel) {
        $this->salesModel = $salesModel;
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_sale'])) {
            $product_name = $_POST['product_name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
    
            $this->salesModel->addSale($product_name, $quantity, $price);
            header("Location: /pmss/pms/admin/app/sales.php"); // Absolute path to sales.php
            exit();
        }
    }
    

    public function getSalesRecords() {
        return $this->salesModel->getSales();
    }
}
?>
