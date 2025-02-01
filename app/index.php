<?php
session_start();

require_once 'models/Database.php';

$db = new Database('adminn'); 
$conn = $db->getConnection();

// Handle login process
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'controllers/LoginController.php';
    $loginController = new LoginController($conn);
    $loginController->login();
}
?>

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

    .alert-success {
        background-color: #e6f4ea;
        color: #1e8e3e;
        border: 1px solid #d4edda;
    }

    .alert-warning {
        background-color: #fff3e0;
        color: #f57c00;
        border: 1px solid #ffe0b2;
    }

    .validation-error {
        color: #dc3545;
        font-size: 12px;
        margin-top: -8px;
        margin-bottom: 8px;
        display: none;
    }

    .input-field.error {
        border-color: #dc3545;
    }

    .input-field.success {
        border-color: #28a745;
    }

    .alert-close {
        cursor: pointer;
        padding: 0 5px;
        font-weight: bold;
    }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login - Medicare</h2>
    
    <!-- Success Message -->
    <?php if (isset($_SESSION['success_message'])) { ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success_message']; ?>
            <span class="alert-close">&times;</span>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php } ?>

    <!-- Error Message -->
    <?php if (isset($error_message)) { ?>
        <div class="alert alert-error">
            <?php echo $error_message; ?>
            <span class="alert-close">&times;</span>
        </div>
    <?php } ?>

    <form id="loginForm" method="POST">
        <div class="form-group">
            <input type="text" name="username" id="username" class="input-field" placeholder="Username" required>
            <div id="usernameError" class="validation-error"></div>
        </div>

        <div class="form-group">
            <input type="password" name="password" id="password" class="input-field" placeholder="Password" required>
            <div id="passwordError" class="validation-error"></div>
        </div>

        <button type="submit" class="btn-submit">Login</button>
    </form>

    <div class="register-link">
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</div>

    <script>
    // Close alert messages
    document.querySelectorAll('.alert-close').forEach(function(closeButton) {
        closeButton.addEventListener('click', function() {
            const alert = this.parentElement;
            alert.style.opacity = '0';
            setTimeout(() => alert.style.display = 'none', 500);
        });
    });

    document.getElementById('loginForm').addEventListener('submit', function(event) {
        let isValid = true;
        const username = document.getElementById('username');
        const password = document.getElementById('password');
        const usernameError = document.getElementById('usernameError');
        const passwordError = document.getElementById('passwordError');

        // Reset previous validation states
        resetValidation();

        // Validate username
        if (!username.value || username.value.trim() === '') {
            showError(username, usernameError, 'Please enter a username');
            isValid = false;
        } else {
            showSuccess(username);
        }

        // Validate password
        const passwordPattern = /^(?=.*[a-zA-Z])(?=.*\d).+$/;
        if (!password.value || password.value.trim() === '') {
            showError(password, passwordError, 'Please enter a password');
            isValid = false;
        } else if (!passwordPattern.test(password.value)) {
            showError(password, passwordError, 'Password must contain both letters and numbers');
            isValid = false;
        } else {
            showSuccess(password);
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    function showError(input, errorElement, message) {
        input.classList.add('error');
        input.classList.remove('success');
        errorElement.style.display = 'block';
        errorElement.textContent = message;
    }

    function showSuccess(input) {
        input.classList.add('success');
        input.classList.remove('error');
    }

    function resetValidation() {
        const inputs = document.querySelectorAll('.input-field');
        const errors = document.querySelectorAll('.validation-error');
        
        inputs.forEach(input => {
            input.classList.remove('error', 'success');
        });
        
        errors.forEach(error => {
            error.style.display = 'none';
            error.textContent = '';
        });
    }
</script>
</body>
</html>
