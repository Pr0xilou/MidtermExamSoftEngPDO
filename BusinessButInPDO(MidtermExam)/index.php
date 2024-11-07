<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php  if (!isset($_SESSION['username'])) {
        header("Location: login.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PcBuildWorkshop</title>
<link rel="stylesheet" href="styles.css">
<style>
	.header {
        text-align: center;
        margin-top: 30px;
    }
    .message {
        color: #d9534f;
        font-size: 24px;
        background-color: #f2dede;
        padding: 10px;
        border-radius: 5px;
        display: inline-block;
    }
    .greeting {
        color: #5bc0de;
        font-size: 28px;
        margin-bottom: 10px;
    }
    .no-user {
        color: #f0ad4e;
        font-size: 20px;
    }
    .logout-button {
        display: inline-block;
        background-color: #d9534f;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 10px;
        transition: background-color 0.3s;
    }
    .logout-button:hover {
        background-color: #c9302c;
    }
    .user-list {
        max-width: 800px;
        margin: 30px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .user-list-title {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }
    .user-list-items {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    .user-list-item {
        margin: 10px 0;
        font-size: 18px;
    }
    .user-link {
        color: #0275d8;
        text-decoration: none;
        transition: color 0.3s;
    }
    .user-link:hover {
        color: #014f86;
        text-decoration: underline;
    }
</style>
</head>
<body>
    <div class="header">
        <?php if (isset($_SESSION['message'])) { ?>
            <h1 class="message"><?php echo $_SESSION['message']; ?></h1>
        <?php } unset($_SESSION['message']); ?>

        <?php if (isset($_SESSION['username'])) { ?>
            <h1 class="greeting">Welcome !! <?php echo $_SESSION['username']; ?></h1>
            <a href="core/handleForms.php?logoutAUser=1" class="logout-button">Logout</a>
        <?php } else { ?>
            <h1 class="no-user">No User Logged In.</h1>
        <?php } ?>
    </div>
    <div class="user-list">
        <h3 class="user-list-title">Users List</h3>
        <ul class="user-list-items">
            <?php $getAllUsers = getAllUsers($pdo); ?>
            <?php foreach ($getAllUsers as $row) { ?>
                <li class="user-list-item">
                    <a href="viewusers.php?user_id=<?php echo $row['user_id']; ?>" class="user-link">
                        <?php echo $row['username']; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
	<h1>Welcome To Custom Pc Building Workshop!<br> Add your PC builder below</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="fname">First Name</label> 
			<input type="text" name="fname">
		</p>
		<p>
			<label for="lname">Last Name</label> 
			<input type="text" name="lname">
		</p>
		<p>
			<label for="DoB">Date of Birth</label> 
			<input type="date" name="DoB">
		</p>
		<p>
			<label for="Sp">Specialization</label> 
			<input type="text" name="Sp">
			<input type="submit" name="insertPcBuilderBtn">
		</p>
	</form>
	<?php $getAllPcBuilder = getAllPcBuilder($pdo); ?>
	<?php foreach ($getAllPcBuilder as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>FirstName: <?php echo $row['first_name']; ?></h3>
		<h3>LastName: <?php echo $row['last_name']; ?></h3>
		<h3>Date Of Birth: <?php echo $row['date_of_birth']; ?></h3>
		<h3>Specialization: <?php echo $row['specialization']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewcustombuilds.php?pc_builder_id=<?php echo $row['pc_builder_id']; ?>">View Projects</a>
			<a href="editbuilder.php?pc_builder_id=<?php echo $row['pc_builder_id']; ?>">Edit</a>
			<a href="deletebuilder.php?pc_builder_id=<?php echo $row['pc_builder_id']; ?>">Delete</a>
		</div>

	</div> 
	<?php } ?>
</body>
</html>