<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>DeletePcBuilder</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Are you sure you want to remove this Pc Builder?</h1>
	<?php $getPcBuilderByID = getPcBuilderByID($pdo, $_GET['pc_builder_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>FirstName: <?php echo $getPcBuilderByID['first_name']; ?></h2>
		<h2>LastName: <?php echo $getPcBuilderByID['last_name']; ?></h2>
		<h2>Date Of Birth: <?php echo $getPcBuilderByID['date_of_birth']; ?></h2>
		<h2>Specialization: <?php echo $getPcBuilderByID['specialization']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>" method="POST">
				<input type="submit" name="deletePcBuilderBtn" value="Delete">
			</form>			
		</div>	

	</div>
</body>
</html>