<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Plus - Pharmacy Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #2c3e50;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .brand {
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar img {
            width: 50px;
            height: auto;
            margin-right: 1rem;
        }

        .menu {
            display: flex;
            gap: 1.5rem;
        }

        .menu-item {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            transition: background 0.3s;
            cursor: pointer;
        }

        .menu-item:hover {
            background: #34495e;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .search-bar input {
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #ccc;
            width: 200px;
        }

        .search-bar button {
            background: #3498db;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-bar button:hover {
            background: #2980b9;
        }

        .main-content {
            margin-top: 70px;
            padding: 2rem;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .card p {
            color: #7f8c8d;
            margin-bottom: 1rem;
        }

        .card-button {
            background: #3498db;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .card-button:hover {
            background: #2980b9;
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .mobile-menu-button {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .mobile-menu-button {
                display: block;
            }

            .menu {
                display: none;
                position: absolute;
                top: 100%;
                right: 0;
                background: #2c3e50;
                flex-direction: column;
                width: 200px;
                padding: 1rem;
            }

            .menu.active {
                display: flex;
            }
        }

        .notification {
            position: fixed;
            top: 80px;
            right: 20px;
            background: #2ecc71;
            color: white;
            padding: 1rem;
            border-radius: 4px;
            display: none;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
            }
        }

        .back-button {
        position: absolute;
        left: 20px;
        top: 20px;
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
    /* header {
        position: relative;
        background-color: #2c3e50;
        color: white;
        padding: 15px;
        text-align: center;
    } */
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="brand">
            <img src="logo.png" alt=""> <!-- Example Logo Image -->
            MediCare Plus
        </div>
        <div class="menu">
            <a class="menu-item" onclick="showNotification('Dashboard accessed!')">Dashboard</a>
            <a class="menu-item" onclick="showNotification('Inventory section opened!')">Inventory</a>
            <a class="menu-item" onclick="showNotification('Sales section opened!')">Sales</a>
            <a class="menu-item" onclick="showNotification('Customers section opened!')">Customers</a>
            <a class="menu-item" onclick="showNotification('Delivery section opened!')">Delivery</a>
            <a href="logout.php" class="menu-item">Logout</a>
        </div>
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search...">
            <button onclick="searchFunction()">Search</button>
        </div>
        <button class="mobile-menu-button">☰</button>
    </nav>

    <div class="notification" id="notification"></div>

    <main class="main-content">
        <h2>Welcome to MediCare Plus Management System</h2>
        <div class="dashboard">
            <form method="POST" action="inventory.php">
                <div class="card">
                    <img src="assets/image/inventory.png" alt="Inventory Image" style="width: 300px; height: 180px">
                    <h3>Inventory Management</h3>
                    <p>Track and manage pharmacy inventory efficiently.</p>
                    <button class="card-button" type="submit" name="inventory" value="redirect" onclick="showNotification('Inventory management accessed!')">Access Inventory</button>
                </div>
            </form>

            <form method="POST" action="sales.php">
                <div class="card">
                    <img src="assets/image/sales.jpg" style="width: 300px; height: 180px">
                    <h3>Sales Tracking</h3>
                    <p>Monitor daily sales and revenue analytics.</p>
                    <button class="card-button" type="submit" name="sales" value="redirect" onclick="showNotification('Sales tracking accessed!')">View Sales</button>
                </div>
            </form>

            <form method="POST" action="customer.php">
                <div class="card">
                    <img src="assets/image/customer.jpg" alt="Customer Image" style="width: 300px; height: 180px">
                    <h3>Customer Database</h3>
                    <p>Manage customer information and prescriptions.</p>
                    <button class="card-button" type="submit" name="customers" value="redirect" onclick="showNotification('Customer database accessed!')">View Customers</button>
                </div>
            </form>

            <form method="POST" action="delivery.php">
                <div class="card">
                    <img src="assets/image/Delivery-Management.jpg" alt="Delivery Image" style="width: 300px; height: 180px">
                    <h3>Delivery Management</h3>
                    <p>Manage delivery schedules and track orders.</p>
                    <button class="card-button" type="submit" name="delivery" value="redirect" onclick="showNotification('Delivery management accessed!')">Manage Deliveries</button>
                </div>
            </form>
        </div>
    </main>

    <script>
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const menu = document.querySelector('.menu');

        mobileMenuButton.addEventListener('click', () => {
            menu.classList.toggle('active');
        });

        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';
            
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }

        function searchFunction() {
            const query = document.getElementById('search-input').value;
            if (query) {
                alert('Searching for: ' + query);
            } else {
                alert('Please enter a search term.');
            }
        }
    </script>
</body>
</html>
