<?php
require_once 'core/models.php';
require_once 'core/handleForms.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #E9EED9; 
            color: #333; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .form-container {
            background-color: #CBD2A4;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }
        .form-container h1 {
            color: #9A7E6F; 
            margin-bottom: 20px;
            font-size: 28px;
        }
        .form-container p {
            margin: 15px 0;
            text-align: left;
        }
        .form-container label {
            font-weight: bold;
            color: #333; 
        }
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f9f9f9;
            box-sizing: border-box;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #88C273; 
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container input[type="submit"]:hover {
            background-color: #025aa5; 
        }
        .message {
            color: #d9534f;
            background-color: #f2dede;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid #ebccd1;
        }
        .login-link {
            font-size: 14px;
            margin-top: 20px;
        }
        .login-link a {
            color: #257180;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }

    </style>
    <title>Register here</title>
</head>
<body>
    <div class="form-container">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="message"><?php echo $_SESSION['message']; ?></div>
        <?php } unset($_SESSION['message']); ?>
        
        <h1>Create an Account</h1>
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </p>
            <input type="submit" name="registerUserBtn" value="Register">
            <p class="login-link">Already have <a href="login.php">Account?</a><img src="img/doro.gif" alt="doro" width="70" height="70"></p>
        </form>
    </div>
</body>
</html>
