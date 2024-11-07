<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>EditPcBuilder</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getPcBuilderByID = getPcBuilderByID($pdo, $_GET['pc_builder_id']); ?>
	<h1>Edit the Builder!</h1>
	<form action="core/handleForms.php?pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>" method="POST">
		<p>
			<label for="fname">First Name</label> 
			<input type="text" name="fname" value="<?php echo $getPcBuilderByID['first_name']; ?>">
		</p>
		<p>
			<label for="lname">Last Name</label> 
			<input type="text" name="lname" value="<?php echo $getPcBuilderByID['last_name']; ?>">
		</p>
		<p>
			<label for="DoB">Date of Birth</label> 
			<input type="date" name="DoB" value="<?php echo $getPcBuilderByID['date_of_birth']; ?>">
		</p>
		<p>
			<label for="Sp">Specialization</label> 
			<input type="text" name="Sp" value="<?php echo $getPcBuilderByID['specialization']; ?>">
			<input type="submit" name="editPcBuilderBtn">
		</p>
	</form>
</body>
</html>