
<?php
require_once 'models/InventoryModel.php';

class InventoryController {
    private $model;

    public function __construct($conn) {
        $this->model = new InventoryModel($conn);
    }

    // Handle the form submission for adding products
    public function addProduct($section, $product_name, $quantity, $price) {
        if (in_array($section, $this->model->getAllSections())) {
            $this->model->addProduct($section, $product_name, $quantity, $price);
            return "<p class='success'>Product added successfully to $section.</p>";
        } else {
            return "<p class='error'>Invalid section selected.</p>";
        }
    }

    // Get inventory data for each section
    public function getInventoryData() {
        $sections = $this->model->getAllSections();
        $inventory_data = [];
        foreach ($sections as $section) {
            $inventory_data[$section] = $this->model->getInventoryBySection($section);
        }
        return $inventory_data;
    }
}
?>
