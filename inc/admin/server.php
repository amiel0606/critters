<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Critters Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffe6f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to right, #ff9f9f, #ff66b2);
        }

        .form-container {
            max-width: 400px;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            opacity: 0;
            animation: fadeIn 1s forwards;
            transition: all 0.3s ease-in-out;
        }

        /* Title inside the container */
        .form-container h1 {
            font-size: 32px;
            color: #ff66b2;
            margin-bottom: 20px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #ff66b2;
            font-size: 24px;
        }

        .form-container input,
        .form-container select {
            width: 100%;
            padding: 12px;
            margin: 12px 0;
            border: 1px solid #ff66b2;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-container input:focus,
        .form-container select:focus {
            border-color: #ff3399;
            outline: none;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #ff66b2;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .form-container button:hover {
            background-color: #ff3399;
        }

        .form-container a {
            color: #ff66b2;
            text-decoration: none;
            font-size: 14px;
        }

        .form-container .register-link {
            margin-top: 15px;
            font-size: 14px;
        }

        .form-divider {
            text-align: center;
            margin: 20px 0;
        }

        .form-divider hr {
            border: 0;
            height: 1px;
            background-color: #ffcccc;
        }

        .form-divider span {
            position: relative;
            top: -12px;
            background-color: white;
            padding: 0 10px;
        }

        /* Animation */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .register-container,
        .login-container {
            display: none;
        }

        .active {
            display: block;
        }

        /* Responsive */
        @media (max-width: 480px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <!-- Title Inside the Form Container -->
    <div class="form-container" style="text-align: center;">
        <h1>Critters Admin</h1>

        <!-- Login Form -->
        <div class="login-container active" id="login-form">
            <h2>Admin Login</h2>
            <form action="#" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login">Login</button>
            </form>
            <div class="register-link">
                <p>No account yet? <a href="javascript:void(0);" onclick="toggleForm('register-form')">Register</a></p>
            </div>
        </div>

        <!-- Register Form -->
        <div class="register-container" id="register-form">
            <h2>Admin Registration</h2>
            <form action="#" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="text" name="name" placeholder="Full Name" required>
                <select name="role" required>
                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="secretary">Secretary</option>
                </select>
                <button type="submit" name="register">Register</button>
            </form>
            <div class="register-link">
                <p>Already have an account? <a href="javascript:void(0);" onclick="toggleForm('login-form')">Login</a></p>
            </div>
        </div>
    </div>

    <script>
        function toggleForm(formId) {
            // Hide all forms
            const forms = document.querySelectorAll('.form-container > div');
            forms.forEach(form => form.classList.remove('active'));

            // Show selected form
            const activeForm = document.getElementById(formId);
            activeForm.classList.add('active');
        }

        // Default to showing the login form
        document.getElementById('login-form').classList.add('active');
    </script>

</body>
</html>
