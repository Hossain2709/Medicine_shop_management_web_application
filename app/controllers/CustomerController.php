<?php
require_once 'models/CustomerModel.php';

class CustomerController {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    // Handle adding a customer
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_customer'])) {
            $customer_name = $_POST['customer_name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];

            $this->model->addCustomer($customer_name, $email, $phone, $address);
            header("Location: customer.php"); // Redirect back to customer page
            exit();
        }
    }

    // Get all customers
    public function getCustomers() {
        return $this->model->getCustomers();
    }
}
?>
