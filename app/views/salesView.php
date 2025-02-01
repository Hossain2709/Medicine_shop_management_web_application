<?php require_once dirname(__DIR__, 1) . '/controllers/SalesController.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
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
            box-shadow: 0 2px 5px rgba(192, 67, 67, 0.1);
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
            background-color:rgb(234, 89, 27);
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #218838;
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
        <h1>Sales</h1>
    </header>
    <div class="back-button">
        <a href="dashboard.php">← Back</a>
    </div>
    <div class="container">
    <div class="form-section">
            <h2>Add New Sale</h2>
            <form method="POST" action="">
                <input type="text" name="product_name" placeholder="Product Name" required>
                <input type="number" name="quantity" placeholder="Quantity" required>
                <input type="number" step="0.01" name="price" placeholder="Price per Unit" required>
                <button type="submit" name="add_sale">ADD</button>
            </form>
        </div>

        <h2><p style="color:red"><u>Sales Records</u><p></h2>

        <!-- Table to display sales data -->
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th>Sale Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sales_data)): ?>
                    <?php foreach ($sales_data as $sale): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($sale['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($sale['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($sale['price']); ?></td>
                            <td><?php echo htmlspecialchars($sale['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($sale['sale_date']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No sales records available.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>


