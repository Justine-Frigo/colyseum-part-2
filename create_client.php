<?php

include('./config.php');

if (isset($_POST['create'])) {

    $sql = 'INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber) VALUES (:lastName, :firstName, :birthDate, :card, :cardNumber);';

    $card = $_POST['card'] ?? 0;
    $cardNumber = $_POST['cardNumber'];
    $birthDate = !empty($_POST['birthDate']) ? date('Y-m-d', strtotime($_POST['birthDate'])) : null;

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':lastName', $_POST['lastName']);
    $stmt->bindParam(':firstName', $_POST['firstName']);
    $stmt->bindParam(':birthDate', $birthDate);
    $stmt->bindParam(':card', $card, PDO::PARAM_INT);
    $stmt->bindParam(':cardNumber', $cardNumber, $cardNumber == '' ? PDO::PARAM_NULL : PDO::PARAM_INT);
    $stmt->execute();

    if (isset($_POST['card'])) {
        if ($_POST['cardTypesId'] != 0) {
            $sql = 'INSERT INTO cards (cardNumber, cardTypesId) VALUES (:cardNumber, :cardTypesId);';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':cardNumber', $cardNumber);
            $stmt->bindParam(':cardTypesId', $_POST['cardTypesId']);
            $stmt->execute();
        } else {
            echo 'Information de la carte non valide !';
        }
    }
    echo 'Client créé avec succès !';
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
    <h1>Ajouter un client</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="lastName">Nom</label>
        <input type="text" name="lastName"><br>
        <label for="firstName">Prénom</label>
        <input type="text" name="firstName"><br>
        <label for="birthDate">Date de naissance</label>
        <input type="date" name="birthDate"><br>
        <label for="card">Carte</label>
        <input type="checkbox" name="card" value="1"><br>
        <label for="cardNumber">Numéro de carte (si applicable)</label>
        <input type="number" name="cardNumber"><br>
        <label for="cardTypesId">Type de carte (si applicable)</label>
        <select name="cardTypesId">
            <option value="0" selected hidden>Choisissez un type de carte</option>
            <option value="1">Fidélité</option>
            <option value="2">Famille Nombreuse</option>
            <option value="3">Etudiant</option>
            <option value="4">Employé</option>
        </select><br>
        <button type="submit" name="create">Ajouter un client</button>

    </form>

</body>

</html>