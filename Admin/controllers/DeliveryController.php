<?php
require_once 'models/DeliveryModel.php';

class DeliveryController {
    private $deliveryModel;

    public function __construct(DeliveryModel $deliveryModel) {
        $this->deliveryModel = $deliveryModel;
    }

    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_delivery'])) {
            $order_id = $_POST['order_id'];
            $customer_name = $_POST['customer_name'];
            $delivery_address = $_POST['delivery_address'];
            $delivery_status = $_POST['delivery_status'];

            $this->deliveryModel->addDelivery($order_id, $customer_name, $delivery_address, $delivery_status);
            header("Location: delivery.php"); // Redirect back to delivery page
            exit();
        }
    }

    public function getDeliveries() {
        return $this->deliveryModel->getDeliveries();
    }
}
?>
