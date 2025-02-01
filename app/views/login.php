<?php include 'controllers/LoginController.php';  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Medicare</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            padding: 30px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        .input-field:focus {
            border-color: #5e9ed6;
            box-shadow: 0 0 5px rgba(94, 158, 214, 0.5);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #5e9ed6;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #4a89c5;
        }

        .error-message {
            color: #d9534f;
            font-size: 14px;
            text-align: center;
            margin-bottom: 10px;
        }

        .register-link {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .register-link a {
            color: #5e9ed6;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
        .alert {
        padding: 12px 15px;
        margin: 10px 0;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 14px;
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
    }

    .alert-error {
        background-color: #fde8e8;
        color: #c81e1e;
        border: 1px solid #fbd5d5;
    }

    .alert-close {
        cursor: pointer;
        padding: 0 5px;
        font-weight: bold;
    }

    /* Optional: Add shake animation for invalid login */
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    .alert-error {
        animation: shake 0.8s ease-in-out;
    }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login - Medicare</h2>
        
        <?php if (isset($_SESSION['error_message'])) { ?>
    <div class="alert alert-error">
        <?php echo $_SESSION['error_message']; ?>
        <span class="alert-close">&times;</span>
    </div>
    <?php unset($_SESSION['error_message']); ?>
<?php } ?>

        <form method="POST">
            <input type="text" name="username" class="input-field" placeholder="Username" required><br>
            <input type="password" name="password" class="input-field" placeholder="Password" required><br>
            <button type="submit" class="btn-submit">Login</button>
        </form>

        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>

</body>
</html>
