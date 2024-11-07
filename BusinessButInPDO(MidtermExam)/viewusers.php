<?php require_once 'core/models.php'; ?>
<?php require_once 'core/handleForms.php'; ?>
<?php if (!isset($_SESSION['username'])) {
     header("Location: login.php");
        exit(); }?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
<title>User Details</title>
</head>
<body>
    <a href="index.php" class="btn-return">Return to home</a>
    <?php $getUserByID = getUserByID($pdo, $_GET['user_id']); ?>
    <table class="user-details-table">
        <tr>
            <th>User Details</th>
        </tr>
        <tr>
            <td>Username:</td>
            <td><?php echo htmlspecialchars($getUserByID['username']); ?></td>
        </tr>
        <tr>
            <td>Date Joined:</td>
            <td><?php echo htmlspecialchars($getUserByID['date_added']); ?></td>
        </tr>
    </table>
</body>
</html>