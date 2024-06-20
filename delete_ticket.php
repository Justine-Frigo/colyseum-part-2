<?php

include('./config.php');


if (isset($_POST["delete"])) {

	try {

		$statement = $pdo->prepare("DELETE FROM tickets WHERE tickets.id = :id;");
        $statement->bindParam(":id", $_POST['delete']);
        $statement->execute();
		header("Location: tickets.php");
	} catch (PDOException $error) {
		print_r($error->getMessage());
	}
}

?>
