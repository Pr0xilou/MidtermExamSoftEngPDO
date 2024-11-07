
<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Pc Build</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewcustombuilds.php?pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>">
	View The Custom PC Builds</a>
	<h1>Edit the custom PC build!</h1>
	<?php $getCustomPcBuildByID = getCustomPcBuildByID($pdo, $_GET['custom_pc_id']); ?>
	<form action="core/handleForms.php?custom_pc_id=<?php echo $_GET['custom_pc_id']; ?>
	&pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>" method="POST">
		<p>
			<label for="CPname">Custom Pc Name</label> 
			<input type="text" name="CPname" 
			value="<?php echo $getCustomPcBuildByID['custom_pc_name']; ?>">
		</p>
        <p>
			<label for="MBmodel">Motherboard model</label> 
			<input type="text" name="MBmodel" 
			value="<?php echo $getCustomPcBuildByID['motherboard_model']; ?>">
		</p>
        <p>
			<label for="CFmodel">Cpu fan model</label> 
			<input type="text" name="CFmodel" 
			value="<?php echo $getCustomPcBuildByID['cpu_fan_model']; ?>">
		</p>
        <p>
			<label for="Pmodel">Processor model</label> 
			<input type="text" name="Pmodel" 
			value="<?php echo $getCustomPcBuildByID['processor_model']; ?>">
		</p>
        <p>
			<label for="Rinfo">Ram info</label> 
			<input type="text" name="Rinfo" 
			value="<?php echo $getCustomPcBuildByID['ram_info']; ?>">
		</p>
        <p>
			<label for="GPUname">Graphics card model</label> 
			<input type="text" name="GPUname" 
			value="<?php echo $getCustomPcBuildByID['gpu_model']; ?>">
		</p>
        <p>
			<label for="PSname">Power supply model</label> 
			<input type="text" name="PSname" 
			value="<?php echo $getCustomPcBuildByID['power_supply_model']; ?>">
		</p>
        <p>
			<label for="PCname">PC case model</label> 
			<input type="text" name="PCname" 
			value="<?php echo $getCustomPcBuildByID['pc_case_name']; ?>">
		</p>
		<p>
			<label for="Price">Overall Build Price</label> 
			<input type="text" name="Price" 
			value="<?php echo $getCustomPcBuildByID['price']; ?>">
			<input type="submit" name="editCustomPcBuildBtn">
		</p>
	</form>
</body>
</html>
