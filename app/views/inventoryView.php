
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Inventory</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        /* .header {
            background-color: #34495e;
            color: white;
            text-align: center;
            padding: 10px;
        } */
        .form-container {
            margin: 20px auto;
            width: 80%;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container input, .form-container select, .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .form-container button {
            background-color: #2980b9;
            color: white;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #3498db;
        }
        .table-container {
            margin: 20px auto;
            width: 80%;
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table thead {
            background-color: #2980b9;
            color: white;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
        }
        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .success {
            color: green;
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
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
    .header {
        position: relative;
        background-color: #2c3e50;
        color: white;
        padding: 15px;
        text-align: center;
    }
    </style>
</head>
<body>

    <div class="header">
        <h1>Medicine Inventory Management</h1>
    </div>
    <div class="back-button">
        <a href="dashboard.php">← Back</a>
    </div>
    <!-- Add Product Form -->
    <div class="form-container">
        <h2>Add New Product</h2>
        <form action="inventory.php" method="POST">
            <label for="section">Select Section:</label>
            <select name="section" id="section" required>
                <option value="prescriptions">Prescription Medicines</option>
                <option value="personal_care">Personal Care</option>
                <option value="devices">Healthcare Devices</option>
                <option value="supplements">Vitamins and Supplements</option>
                <option value="ayurvedic_products">Ayurvedic Products</option>
            </select><br><br>

            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required><br><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required><br><br>

            <button type="submit" name="add_product">Add Product</button>
        </form>
        <?php if (isset($message)) echo $message; ?>
    </div>

    <?php foreach ($inventory_data as $section => $products): ?>
        <div class="table-container">
            <h2 style="text-align: center;"><?php echo ucfirst(str_replace('_', ' ', $section)); ?> Inventory</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td><?php echo htmlspecialchars($product['quantity']); ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">No data available</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    <?php endforeach; ?>

</body>
</html>
