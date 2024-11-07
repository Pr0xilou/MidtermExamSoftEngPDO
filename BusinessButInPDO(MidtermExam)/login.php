<?php require_once 'core/models.php'; ?>
<?php require_once 'core/handleForms.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #55679C; 
            color: #f1f1f1; 
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .form-container {
            background-color: #1E2A5E; 
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 380px;
            box-sizing: border-box;
        }
        .form-container h1 {
            color: #E1D7B7;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .form-container p {
            margin: 15px 0;
            text-align: left;
        }
        .form-container label {
            font-weight: bold;
            color: #f1f1f1; 
        }
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border: 1px solid #444; 
            border-radius: 8px;
            background-color: #222; 
            color: #f1f1f1; 
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #E1D7B7; 
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container input[type="submit"]:hover {
            background-color: #e65c53; 
        }
        .error-message {
            background-color: #f8d7da; /
            color: #721c24; 
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid #f5c6cb;
        }
        .register-link {
            font-size: 14px;
            margin-top: 20px;
        }
        .register-link a {
            color: #257180;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
    <div class="form-container">
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="error-message"><?php echo $_SESSION['message']; ?></div>
        <?php } unset($_SESSION['message']);?>

        <h1>Login Now!</h1>
        <form action="core/handleForms.php" method="POST">
            <p>
                <label for="username">Username :</label>
                <input type="text" name="username" required>
            </p>
            <p>
                <label for="password">Password :</label>
                <input type="password" name="password" required>
            </p>
            <input type="submit" name="loginUserBtn" value="Login">
        </form>
        <p class="register-link">Got no account? Register <a href="register.php">here.</a></p>
    </div>

</body>
</html>
