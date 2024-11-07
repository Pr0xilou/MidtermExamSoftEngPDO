<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Custom Pc Build</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getCustomPcBuildByID = getCustomPcBuildByID($pdo, $_GET['custom_pc_id']); ?>
	<h1>Are you sure you want to scrap this Sweet Custom Build Pc?</h1>
	<div class="container" style="border-style: solid; height: 800px;">
		<h2>Custom Pc Name: <?php echo$getCustomPcBuildByID['custom_pc_name'] ?></h2>
		<h2>Motherboard Model: <?php echo $getCustomPcBuildByID['motherboard_model'] ?></h2>
        <h2>CPU Fan Model: <?php echo $getCustomPcBuildByID['cpu_fan_model'] ?></h2>
        <h2>Processor Model: <?php echo $getCustomPcBuildByID['processor_model'] ?></h2>
        <h2>Ram Info: <?php echo $getCustomPcBuildByID['ram_info'] ?></h2>
        <h2>Graphics Card Model: <?php echo $getCustomPcBuildByID['gpu_model'] ?></h2>
        <h2>Power Supply Model: <?php echo $getCustomPcBuildByID['power_supply_model'] ?></h2>
        <h2>Pc Case Model: <?php echo $getCustomPcBuildByID['pc_case_name'] ?></h2>
        <h2>Price: <?php echo $getCustomPcBuildByID['price'] ?></h2>
		<h2>Pc Builder: <?php echo $getCustomPcBuildByID['Pc_Builder'] ?></h2>
		<h2>Date Created: <?php echo $getCustomPcBuildByID['date_created'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">

			<form action="core/handleForms.php?custom_pc_id=<?php echo $_GET['custom_pc_id']; ?>&pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>" method="POST">
				<input type="submit" name="deletePcBuildBtn" value="Delete">
			</form>			
			
		</div>	

	</div>
</body>
</html>