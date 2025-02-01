<?php
class DashboardController {

    public function handleRequest() {
        if (isset($_POST["inventory"])) {
            header('Location: inventory.php');
            exit();
        }

        if (isset($_POST["sales"])) {
            header('Location: sales_track.php');
            exit();
        }

        if (isset($_POST["customers"])) {
            header('Location: customer_database.php');
            exit();
        }

        if (isset($_POST["reports"])) {
            header('Location: reports.php');
            exit();
        }

        if (isset($_POST["delivery"])) {
            header('Location: delivery.php');
            exit();
        }

        // Load the dashboard view
        $this->loadView();
    }

    public function loadView() {
        require_once 'views/dashboardView.php';
    }
}
?>
