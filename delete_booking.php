<?php

include('./config.php');


if (isset($_POST["delete"])) {

	try {

		$statement = $pdo->prepare("DELETE FROM bookings WHERE bookings.id = :id;");
        $statement->bindParam(":id", $_POST['delete']);
        $statement->execute();
		header("Location: bookings.php");
	} catch (PDOException $error) {
		print_r($error->getMessage());
	}
}

?>
