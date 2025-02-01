<?php require_once dirname(__DIR__, 1) . '/controllers/CustomerController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Database</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        /* header {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
        } */
        .container {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #3498db;
            color: white;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section form {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .form-section input, .form-section button {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-section button {
            background-color: rgb(234, 89, 27);
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #0056b3;
        }
        .back-button {
        position: absolute;
        left: 60px;
        top: 40px;
    }
    
    .back-button a {
        background-color: #3498db;
        color: white;
        padding: 8px 15px;
        text-decoration: none;
        border-radius: 3px;
        font-size: 14px;
    }
    
    .back-button a:hover {
        background-color: #2980b9;
    }
    
    /* Modify the existing header style to accommodate the back button */
    header {
        position: relative;
        background-color: #2c3e50;
        color: white;
        padding: 15px;
        text-align: center;
    }
    </style>
</head>
<body>
    <header>
        <h1>Customer Database</h1>
    </header>
    <div class="back-button">
        <a href="dashboard.php">← Back</a>
    </div>

    <div class="container">
        <div class="form-section">
            <h2>Add New Customer</h2>
            <form method="POST" action="customer.php">
                <input type="text" name="customer_name" placeholder="Customer Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="text" name="address" placeholder="Address" required>
                <button type="submit" name="add_customer">ADD</button>
            </form>
        </div>

        <h2><p style="color:red"><u>Customer Records</u></p></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Added</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($customers)): ?>
                    <tr>
                        <td colspan="5" class="no-data">No customer records found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($customer['customer_name']); ?></td>
                            <td><?php echo htmlspecialchars($customer['email']); ?></td>
                            <td><?php echo htmlspecialchars($customer['phone']); ?></td>
                            <td><?php echo htmlspecialchars($customer['address']); ?></td>
                            <td><?php echo htmlspecialchars($customer['date_added']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
