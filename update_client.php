<?php
include('./config.php');

try {
    $database = new PDO($url, $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die("Connection failed: " . $error->getMessage());
}

$original_client = [];

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    try {
        $statement = $database->prepare("SELECT * FROM clients WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $original_client = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$original_client) {
            echo "Client not found with id: $id";
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

if (isset($_POST['button'])) {
    try {
        $sql = "UPDATE clients SET lastName = :lastName, firstName = :firstName, birthDate = :birthDate, card = :card, cardNumber = :cardNumber WHERE id = :id";
        $statement = $database->prepare($sql);

        $card = isset($_POST['card']) ? 1 : 0;
        $cardNumber = !empty($_POST['cardNumber']) ? $_POST['cardNumber'] : null;
        $birthDate = !empty($_POST['birthDate']) ? date('Y-m-d', strtotime($_POST['birthDate'])) : null;

        $statement->bindParam(':lastName', $_POST['lastName']);
        $statement->bindParam(':firstName', $_POST['firstName']);
        $statement->bindParam(':birthDate', $birthDate);
        $statement->bindParam(':card', $card, PDO::PARAM_INT);
        $statement->bindParam(':cardNumber', $cardNumber, $cardNumber === null ? PDO::PARAM_NULL : PDO::PARAM_INT);
        $statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

        $statement->execute();
        echo 'Client mis à jour avec succès !';
        header("Location: clients.php");
        exit();

    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }

    if ($card && isset($_POST['cardTypesId']) && $_POST['cardTypesId'] != 0) {
        try {
            $sql = 'INSERT INTO cards (cardNumber, cardTypesId) VALUES (:cardNumber, :cardTypesId)';
            $stmt = $database->prepare($sql);
            $stmt->bindParam(':cardNumber', $cardNumber);
            $stmt->bindParam(':cardTypesId', $_POST['cardTypesId'], PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    } elseif ($card) {
        echo 'Information de la carte non valide !';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Update</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div>
        <label for="lastName">Nom</label>
        <input type="hidden" value="<?php echo isset($original_client['id']) ? $original_client['id'] : ''; ?>" name="id">
        <input type="text" name="lastName" value="<?php echo isset($original_client['lastName']) ? $original_client['lastName'] : ''; ?>">
    </div>
    <div>
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName" value="<?php echo isset($original_client['firstName']) ? $original_client['firstName'] : ''; ?>"><br>
    </div>
    <div>
        <label for="birthDate">Date de naissance</label>
        <input type="date" name="birthDate" value="<?php echo isset($original_client['birthDate']) ? $original_client['birthDate'] : ''; ?>"><br>
    </div>
    <div>
        <label for="card">Carte</label>
        <input type="checkbox" name="card" value="1" <?php echo isset($original_client['card']) && $original_client['card'] ? 'checked' : ''; ?>><br>
    </div>
    <div>
        <label for="cardNumber">Numéro de carte (si applicable)</label>
        <input type="number" name="cardNumber" value="<?php echo isset($original_client['cardNumber']) ? $original_client['cardNumber'] : ''; ?>"><br>
    </div>
    <div>
        <label for="cardTypesId">Type de carte (si applicable)</label>
        <select name="cardTypesId">
            <option value="0">Choisissez un type de carte</option>
            <option value="1" <?php echo isset($original_client['cardTypesId']) && $original_client['cardTypesId'] == 1 ? 'selected' : ''; ?>>Fidélité</option>
            <option value="2" <?php echo isset($original_client['cardTypesId']) && $original_client['cardTypesId'] == 2 ? 'selected' : ''; ?>>Famille Nombreuse</option>
            <option value="3" <?php echo isset($original_client['cardTypesId']) && $original_client['cardTypesId'] == 3 ? 'selected' : ''; ?>>Etudiant</option>
            <option value="4" <?php echo isset($original_client['cardTypesId']) && $original_client['cardTypesId'] == 4 ? 'selected' : ''; ?>>Employé</option>
        </select><br>
    </div>
    <button type="submit" name="button">Mise à jour d'un client</button>
</form>
</body>
</html>
