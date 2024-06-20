<?php 
include('./config.php');

if (isset($_POST["delete"])) {

	try {

		$statement = $pdo->prepare("DELETE FROM clients WHERE clients.id = :id;");
        $statement->bindParam(":id", $_POST['delete']);
        $statement->execute();
		header("Location: clients.php");
	} catch (PDOException $error) {
		print_r($error->getMessage());
	}
}


?>