<?php
require_once 'dbConfig.php';
require_once 'models.php';

if(isset($_POST['insertPcBuilderBtn'])) {

    $query = insertPcBuilder($pdo, $_POST['fname'], $_POST['lname'],
        $_POST['DoB'], $_POST['Sp']);

    if ($query) {
        header("Location: ../index.php");
    }
    else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editPcBuilderBtn'])) {

	$query = updatePcBuilder($pdo, $_POST['fname'], $_POST['lname'], 
		$_POST['DoB'], $_POST['Sp'], $_GET['pc_builder_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Edit failed";;
	}

}
if (isset($_POST['deletePcBuilderBtn'])) {
	$query = deletePcBuilder($pdo, $_GET['pc_builder_id']);

	if ($query) {
		header("Location: ../index.php");
	}

	else {
		echo "Deletion failed";
	}
}
if (isset($_POST['insertNewCustomBuildPc'])) {
	if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];

	$query = insertCustomPc($pdo, $_POST['CPname'], $_POST['MBmodel'], $_POST['CFmodel'], $_POST['Pmodel'], $_POST['Rinfo'],
    $_POST['GPUname'], $_POST['PSname'],$_POST['PCname'], $_POST['Price'], $_GET['pc_builder_id'], $username );

	if ($query) {
		header("Location: ../viewcustombuilds.php?pc_builder_id=" .$_GET['pc_builder_id']);
	}
	else {
		echo "Insertion failed";
	}
	} else {
	echo "User not logged in.";
	}
}
if (isset($_POST['editCustomPcBuildBtn'])) {
	if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];

	$query = updateCustomPcBuild($pdo, $_POST['CPname'], $_POST['MBmodel'], $_POST['CFmodel'], $_POST['Pmodel'], $_POST['Rinfo'],
    $_POST['GPUname'], $_POST['PSname'],$_POST['PCname'], $_POST['Price'], $_GET['custom_pc_id'], $username);
	if ($query) {
		header("Location: ../viewcustombuilds.php?pc_builder_id=" .$_GET['pc_builder_id']);
		}
		else {
		echo "Update failed";
		}
	}
}
if (isset($_POST['deletePcBuildBtn'])) {
	$query = deleteCustomPcBuild($pdo, $_GET['custom_pc_id']);
	if ($query) {
		header("Location: ../viewcustombuilds.php?pc_builder_id=" .$_GET['pc_builder_id']);
	}
	else {
		echo "Deletion failed";
	}
}
if (isset($_POST['registerUserBtn'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	if (!empty($username) && !empty($password)) {
		$insertQuery = insertNewUser($pdo, $username, $password);
		if ($insertQuery) {
			header("Location: ../login.php");
		} else {
			header("Location: ../register.php");
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields are not empty before registration!";
		header("Location: ../login.php");
	}
}
if (isset($_POST['loginUserBtn'])) {
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	if (!empty($username) && !empty($password)) {
		$loginQuery = loginUser($pdo, $username, $password);
		if ($loginQuery) {
			header("Location: ../index.php");
		} else {
			header("Location: ../login.php");
		}
	} else {
		$_SESSION['message'] = "Please make sure the input fields are not empty before loging in!";
		header("Location: ../login.php");
	}
}
if (isset($_GET['logoutAUser'])) {
	unset($_SESSION['username']);
	header("Location: ../login.php") ;
}
?>