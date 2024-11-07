<?php
require_once "dbConfig.php";

function insertPcBuilder ($pdo, $first_name, $last_name, $date_of_birth, $specialization) {
    $sql = "INSERT INTO pc_builder (first_name, last_name, date_of_birth, specialization) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $specialization]);
    if ($executeQuery) {
        return true;
    }
}
function getAllPcBuilder ($pdo) { 
    $sql = "SELECT * FROM pc_builder"; 
    $stmt = $pdo->prepare($sql); 
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}
function getPcBuilderByID($pdo, $pc_builder_id) {
    $sql = "SELECT * FROM pc_builder WHERE pc_builder_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$pc_builder_id]);
    if ($executeQuery) {
        return $stmt->fetch();
    }
}
function updatePcBuilder($pdo, $first_name, $last_name, $date_of_birth, $specialization, $pc_builder_id) {
    $sql = "UPDATE pc_builder
                SET first_name = ?,
                    last_name = ?,
                    date_of_birth = ?,
                    specialization = ?
                WHERE pc_builder_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $date_of_birth, $specialization, $pc_builder_id]);

    if ($executeQuery) {
        return true;
    }   
}
function deletePcBuilder($pdo, $pc_builder_id) {
	$deletePcBuild = "DELETE FROM custom_pc WHERE pc_builder_id = ?";
	$deleteStmt = $pdo->prepare($deletePcBuild);
	$executeDeleteQuery = $deleteStmt->execute([$pc_builder_id]);
	if ($executeDeleteQuery) {
		$sql = "DELETE FROM pc_builder WHERE pc_builder_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$pc_builder_id]);

		if ($executeQuery) {
			return true;
		}
	}
}
function getPcBuildsByPcBuilder($pdo, $pc_builder_id) {
	$sql = "SELECT 
				custom_pc.custom_pc_id AS custom_pc_id,
				custom_pc.custom_pc_name AS custom_pc_name, custom_pc.motherboard_name AS motherboard_model,
                custom_pc.cpu_fan_name AS cpu_fan_model, custom_pc.processor_name AS processor_model,
                custom_pc.ram_info AS ram_info, custom_pc.gpu_name AS gpu_model,
                custom_pc.power_supply_name AS power_supply_model, custom_pc.pc_case_name AS pc_case_name,
                custom_pc.price AS price, custom_pc.date_created AS date_created,
				custom_pc.added_by AS added_by,custom_pc.last_updated AS last_updated,
                custom_pc.last_updated_by AS last_updated_by,
				CONCAT(pc_builder.first_name,' ',pc_builder.last_name) AS Pc_Builder
			FROM custom_pc
			JOIN pc_builder ON custom_pc.pc_builder_id = pc_builder.pc_builder_id
			WHERE custom_pc.pc_builder_id = ? 
			GROUP BY custom_pc.custom_pc_name;
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$pc_builder_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function insertCustomPc($pdo, $custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
$gpu_name, $power_supply_name, $pc_case_name, $price, $pc_builder_id, $username ) {
    $sql = "INSERT INTO custom_pc (custom_pc_name, motherboard_name, cpu_fan_name, processor_name, ram_info,
    gpu_name, power_supply_name, pc_case_name, price, pc_builder_id, added_by, last_updated_by) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
    $gpu_name, $power_supply_name, $pc_case_name, $price, $pc_builder_id, $username, $username]);
    if ($executeQuery) {
        return true;
    } else {
        return false; 
    }
}
function getCustomPcBuildByID($pdo, $custom_pc_id) {
	$sql = "SELECT 
				custom_pc.custom_pc_id AS custom_pc_id,custom_pc.custom_pc_name AS custom_pc_name,
				custom_pc.motherboard_name AS motherboard_model, custom_pc.cpu_fan_name AS cpu_fan_model,
                custom_pc.processor_name AS processor_model,custom_pc.ram_info AS ram_info,
                custom_pc.gpu_name AS gpu_model, custom_pc.power_supply_name AS power_supply_model,
                custom_pc.pc_case_name AS pc_case_name, custom_pc.price AS price, custom_pc.date_created AS date_created,
				custom_pc.added_by AS added_by, custom_pc.last_updated AS last_updated,
				CONCAT(pc_builder.first_name,' ',pc_builder.last_name) AS Pc_Builder
			FROM custom_pc
			JOIN pc_builder ON custom_pc.pc_builder_id = pc_builder.pc_builder_id
			WHERE custom_pc.custom_pc_id = ? 
			GROUP BY custom_pc.custom_pc_name;
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$custom_pc_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}
function updateCustomPcBuild($pdo, $custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
$gpu_name, $power_supply_name, $pc_case_name, $price, $custom_pc_id, $last_updated_by) {
    $sql = "UPDATE custom_pc
            SET custom_pc_name = ?,
                motherboard_name = ?, cpu_fan_name = ?, processor_name = ?, ram_info = ?, 
                gpu_name = ?, power_supply_name = ?, pc_case_name = ?, price = ?, last_updated = NOW(), last_updated_by = ?
            WHERE custom_pc_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$custom_pc_name, $motherboard_name, $cpu_fan_name, $processor_name, $ram_info,
        $gpu_name, $power_supply_name, $pc_case_name, $price, $last_updated_by, $custom_pc_id]);
    if ($executeQuery) {
        return true;
    }
    return false;
}
function deleteCustomPcBuild($pdo, $custom_pc_id) {
	$sql = "DELETE FROM custom_pc WHERE custom_pc_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$custom_pc_id]);
	if ($executeQuery) {
		return true;
	}
}
function insertNewUser($pdo, $username, $password) {
	$checkUserSql = "SELECT * FROM user_passwords WHERE username =?";
	$checkUserSqlStmt = $pdo->prepare($checkUserSql);
	$checkUserSqlStmt->execute([$username]);

	if ($checkUserSqlStmt->rowCount() == 0) {
		$sql = "INSERT INTO user_passwords (username, password) VALUES (?,?)";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$username, $password]);
		if ($executeQuery) {
			$_SESSION['message'] = "User successfully inserted";
			return true;
		} 
		else {
			$_SESSION['message'] = "An error occured from the query";
		}
	}
		else {
			$_SESSION['message'] = "This User already exists";
		}
}
function loginUser($pdo, $username, $password) {
	$sql = "SELECT * FROM user_passwords WHERE username = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$username]);
	if ($executeQuery) {
		$userInfoRow = $stmt->fetch();
		$usernameFromDB = $userInfoRow['username'];
		$passwordFromDB = $userInfoRow['password'];
		if ($password == $passwordFromDB) {
			$_SESSION['username'] = $usernameFromDB;
			$_SESSION['message'] = "Login successful!";
			return true;
		} 
		else {
			$_SESSION['message'] = "Username or Password invalid.";
		}
	}
	if ($stmt->rowCount() == 0) {
		$_SESSION['message'] = "Username or Password invalid.";
	}
}
function getAllUsers($pdo) {
	$sql = "SELECT * FROM user_passwords";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}
function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM user_passwords WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$user_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}
?>