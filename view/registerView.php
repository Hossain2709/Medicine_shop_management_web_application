<!DOCTYPE html>
<html>

<head>
   <title>Create Account - Vogue Threads</title>
   <style>
      .register-container {
         width: 300px;
         margin: 100px auto;
         padding: 20px;
         border: 1px solid #ddd;
         border-radius: 5px;
      }

      .form-group {
         margin-bottom: 15px;
      }

      input {
         width: 100%;
         padding: 8px;
         margin-top: 5px;
      }

      .btn {
         width: 100%;
         padding: 10px;
         background: #2c3e50;
         color: white;
         border: none;
         cursor: pointer;
      }

      .error {
         color: red;
         margin-bottom: 10px;
      }

      .success {
         color: green;
         margin-bottom: 10px;
      }
   </style>
   <script>
      function validateForm() {
         let name = document.getElementById('name').value.trim();
         let email = document.getElementById('email').value.trim();
         let password = document.getElementById('password').value.trim();

         if (name === "") {
            alert("Name cannot be empty");
            return false;
         } else if (name.split(" ").length < 2) {
            alert("Name must contain at least two words");
            return false;
         } else if (!/^[a-zA-Z][a-zA-Z .'-]*$/.test(name)) {
            alert("Name can only contain letters, dot, dash, or space");
            return false;
         }

         if (email === "") {
            alert("Email cannot be empty");
            return false;
         } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            alert("Invalid email format");
            return false;
         }

         if (password === "") {
            alert("Password cannot be empty");
            return false;
         } else if (password.length < 6) {
            alert("Password must be at least 6 characters long");
            return false;
         }

         return true;
      }
   </script>
</head>

<body>
   <div class="register-container">
      <h2>Create Account</h2>
      <form method="post" action="../controller/registercontroller.php" onsubmit="return validateForm()">
         <div class="form-group">
            <label>Name:</label>
            <input type="text" id="name" name="name">
         </div>
         <div class="form-group">
            <label>Email:</label>
            <input type="email" id="email" name="email">
         </div>
         <div class="form-group">
            <label>Password:</label>
            <input type="password" id="password" name="password">
         </div>
         <button type="submit" class="btn">Create Account</button>
      </form>
      <p>
         <a href="../controller/loginController.php">Already have an account? Login</a>
      </p>
   </div>
</body>

</html>
