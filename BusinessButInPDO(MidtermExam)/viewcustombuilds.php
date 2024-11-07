<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<?php 
    if (!isset($_SESSION['original_username']) && isset($_SESSION['username'])) {
         $_SESSION['original_username'] = $_SESSION['username']; 
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Custom Builds</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php" class="btn-return">Return to home</a>
	<h1>Add New Custom Pc Build</h1>
	<form action="core/handleForms.php?pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>" method="POST">
		<p>
			<label for="CPname">Custom Pc Name</label> 
			<input type="text" name="CPname">
		</p>
        <p>
			<label for="MBmodel">Motherboard model</label> 
			<input type="text" name="MBmodel">
		</p>
        <p>
			<label for="CFmodel">Cpu fan model</label> 
			<input type="text" name="CFmodel">
		</p>
        <p>
			<label for="Pmodel">Processor model</label> 
			<input type="text" name="Pmodel">
		</p>
        <p>
			<label for="Rinfo">Ram info</label> 
			<input type="text" name="Rinfo">
		</p>
        <p>
			<label for="GPUname">Graphics card model</label> 
			<input type="text" name="GPUname">
		</p>
        <p>
			<label for="PSname">Power supply model</label> 
			<input type="text" name="PSname">
		</p>
        <p>
			<label for="PCname">PC case model</label> 
			<input type="text" name="PCname">
		</p>
        <p>
			<label for="Price">Overall Build Price</label> 
			<input type="text" name="Price">
			<input type="submit" name="insertNewCustomBuildPc">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Custom Pc ID</th>
	    <th>Custom Pc Name</th>
        <th>Motherboard Model</th> 
        <th>CPU Fan Model</th>
        <th>Processor Model</th>
        <th>Ram Info</th>
        <th>Graphics Card Model</th>
        <th>Power Supply Model</th>
        <th>Pc Case Model</th>
        <th>Price</th>
	    <th>Pc Builder</th>
		<th>Added By</th>
        <th>Last Updated</th>
        <th>Last Updated By</th>
	    <th>Date Created</th>
	    <th>Action</th>
	  </tr>
	  <?php $getPcBuildsByPcBuilder = getPcBuildsByPcBuilder($pdo, $_GET['pc_builder_id']); ?>
	  <?php foreach ($getPcBuildsByPcBuilder as $row) { ?>
	  <tr>
	  	<td><?php echo $row['custom_pc_id']; ?></td>	  	
	  	<td><?php echo $row['custom_pc_name']; ?></td>	  	
	  	<td><?php echo $row['motherboard_model']; ?></td>	  	
	  	<td><?php echo $row['cpu_fan_model']; ?></td>	  	
	  	<td><?php echo $row['processor_model']; ?></td>
        <td><?php echo $row['ram_info']; ?></td>
        <td><?php echo $row['gpu_model']; ?></td>
        <td><?php echo $row['power_supply_model']; ?></td>
        <td><?php echo $row['pc_case_name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['Pc_Builder']; ?></td>
		<td><?php echo $row['added_by']; ?></td>
        <td><?php echo $row['last_updated']; ?></td>
        <td><?php echo $row['last_updated_by']; ?></td>
        <td><?php echo $row['date_created']; ?></td>
	  	<td>
	  		<a href="editpcbuild.php?custom_pc_id=<?php echo $row['custom_pc_id']; ?>&pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>"class="btn-edit">Edit</a>
			<br><br>
	  		<a href="deletepcbuild.php?custom_pc_id=<?php echo $row['custom_pc_id']; ?>&pc_builder_id=<?php echo $_GET['pc_builder_id']; ?>"class="btn-delete">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>

	
</body>
</html>