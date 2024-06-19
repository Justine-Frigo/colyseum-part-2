<?php
include('./config.php');

$original_show = [];

if (isset($_POST["update"])) {
    $id = $_POST["id"];
    try {
        $statement = $pdo->prepare("SELECT * FROM shows WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $original_show = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$original_show) {
            echo "Spectacle not found with id: $id";
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}

if (isset($_POST['button'])) {
    try {
        $sql = "UPDATE shows SET title = :title, performer = :performer, date = :date, showTypesId = :showTypesId, firstGenresId = :firstGenresId, secondGenreId = :secondGenreId, duration = :duration, startTime = :startTime WHERE id = :id";
        $statement = $pdo->prepare($sql);

        $date = !empty($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : null;

        $statement->bindParam(':title', $_POST['title']);
        $statement->bindParam(':performer', $_POST['performer']);
        $statement->bindParam(':date', $date);
        $statement->bindParam(':showTypesId', $_POST['showTypesId']);
        $statement->bindParam(':firstGenresId', $_POST['firstGenresId']);
        $statement->bindParam(':secondGenreId', $_POST['secondGenreId']);
        $statement->bindParam(':duration', $_POST['duration']);
        $statement->bindParam(':startTime', $_POST['startTime']);
        $statement->bindParam(':id', $_POST['id'], PDO::PARAM_INT);

        $statement->execute();
        echo 'Spectacle mis à jour avec succès !';
        header("Location: shows.php");
        exit();
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
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
<h1>Mettre à jour un spectacle</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo isset($original_show['id']) ? $original_show['id'] : ''; ?>">

    <label for="title">Titre</label>
    <input type="text" name="title" value="<?php echo isset($original_show['title']) ? $original_show['title'] : ''; ?>"><br>

    <label for="performer">Artiste</label>
    <input type="text" name="performer" value="<?php echo isset($original_show['performer']) ? $original_show['performer'] : ''; ?>"><br>

    <label for="date">Date</label>
    <input type="date" name="date" value="<?php echo isset($original_show['date']) ? $original_show['date'] : ''; ?>"><br>

    <label for="showTypesId">Type de spectacle</label>
    <select name="showTypesId">
        <option value="0" selected hidden>Choisissez un type de spectacle</option>
        <option value="1" <?php echo isset($original_show['showTypesId']) && $original_show['showTypesId'] == 1 ? 'selected' : ''; ?>>Concert</option>
        <option value="2" <?php echo isset($original_show['showTypesId']) && $original_show['showTypesId'] == 2 ? 'selected' : ''; ?>>Théâtre</option>
        <option value="3" <?php echo isset($original_show['showTypesId']) && $original_show['showTypesId'] == 3 ? 'selected' : ''; ?>>Humour</option>
        <option value="4" <?php echo isset($original_show['showTypesId']) && $original_show['showTypesId'] == 4 ? 'selected' : ''; ?>>Danse</option>
    </select><br>

    <label for="firstGenresId">Premier genre</label>
    <select name="firstGenresId">
        <option value="0" selected hidden>Choisissez le premier genre</option>
        <option value="1" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 1 ? 'selected' : ''; ?>>Variété et chanson française</option>
        <option value="2" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 2 ? 'selected' : ''; ?>>Variété internationale</option>
        <option value="3" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 3 ? 'selected' : ''; ?>>Pop/Rock</option>
        <option value="4" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 4 ? 'selected' : ''; ?>>Musique électronique</option>
        <option value="5" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 5 ? 'selected' : ''; ?>>Folk</option>
        <option value="6" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 6 ? 'selected' : ''; ?>>Rap</option>
        <option value="7" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 7 ? 'selected' : ''; ?>>Hip Hop</option>
        <option value="8" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 8 ? 'selected' : ''; ?>>Slam</option>
        <option value="9" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 9 ? 'selected' : ''; ?>>Reggae</option>
        <option value="10" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 10 ? 'selected' : ''; ?>>Clubbing</option>
        <option value="11" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 11 ? 'selected' : ''; ?>>RnB</option>
        <option value="12" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 12 ? 'selected' : ''; ?>>Soul</option>
        <option value="13" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 13 ? 'selected' : ''; ?>>Funk</option>
        <option value="14" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 14 ? 'selected' : ''; ?>>Jazz</option>
        <option value="15" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 15 ? 'selected' : ''; ?>>Blues</option>
        <option value="16" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 16 ? 'selected' : ''; ?>>Country</option>
        <option value="17" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 17 ? 'selected' : ''; ?>>Gospel</option>
        <option value="18" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 18 ? 'selected' : ''; ?>>Musique du monde</option>
        <option value="19" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 19 ? 'selected' : ''; ?>>Classique</option>
        <option value="20" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 20 ? 'selected' : ''; ?>>Opéra</option>
        <option value="21" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 21 ? 'selected' : ''; ?>>Autres</option>
        <option value="22" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 22 ? 'selected' : ''; ?>>Drame</option>
        <option value="23" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 23 ? 'selected' : ''; ?>>Comédie</option>
        <option value="24" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 24 ? 'selected' : ''; ?>>Comtemporain</option>
        <option value="25" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 25 ? 'selected' : ''; ?>>Monologue</option>
        <option value="26" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 26 ? 'selected' : ''; ?>>One Man / Woman show</option>
            <option value="27" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 27 ? 'selected' : ''; ?>>Café-Théâtre</option>
            <option value="28" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 28 ? 'selected' : ''; ?>>Stand up</option>
            <option value="29" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 29 ? 'selected' : ''; ?>>Autres</option>
            <option value="30" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 30 ? 'selected' : ''; ?>>Contemporaine</option>
            <option value="31" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 31 ? 'selected' : ''; ?>>Classique</option>
            <option value="32" <?php echo isset($original_show['firstGenresId']) && $original_show['firstGenresId'] == 32 ? 'selected' : ''; ?>>Urbaine</option>
    </select><br>

    <label for="secondGenreId">Second genre</label>
    <select name="secondGenreId">
        <option value="0" selected hidden>Choisissez le second genre</option>
        <option value="1" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 1 ? 'selected' : ''; ?>>Variété et chanson française</option>
        <option value="2" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 2 ? 'selected' : ''; ?>>Variété internationale</option>
        <option value="3" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 3 ? 'selected' : ''; ?>>Pop/Rock</option>
        <option value="4" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 4 ? 'selected' : ''; ?>>Musique électronique</option>
        <option value="5" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 5 ? 'selected' : ''; ?>>Folk</option>
        <option value="6" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 6 ? 'selected' : ''; ?>>Rap</option>
        <option value="7" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 7 ? 'selected' : ''; ?>>Hip Hop</option>
        <option value="8" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 8 ? 'selected' : ''; ?>>Slam</option>
        <option value="9" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 9 ? 'selected' : ''; ?>>Reggae</option>
        <option value="10" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 10 ? 'selected' : ''; ?>>Clubbing</option>
        <option value="11" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 11 ? 'selected' : ''; ?>>RnB</option>
        <option value="12" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 12 ? 'selected' : ''; ?>>Soul</option>
        <option value="13" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 13 ? 'selected' : ''; ?>>Funk</option>
        <option value="14" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 14 ? 'selected' : ''; ?>>Jazz</option>
        <option value="15" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 15 ? 'selected' : ''; ?>>Blues</option>
        <option value="16" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 16 ? 'selected' : ''; ?>>Country</option>
        <option value="17" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 17 ? 'selected' : ''; ?>>Gospel</option>
        <option value="18" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 18 ? 'selected' : ''; ?>>Musique du monde</option>
        <option value="19" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 19 ? 'selected' : ''; ?>>Classique</option>
        <option value="20" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 20 ? 'selected' : ''; ?>>Opéra</option>
        <option value="21" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 21 ? 'selected' : ''; ?>>Autres</option>
        <option value="22" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 22 ? 'selected' : ''; ?>>Drame</option>
        <option value="23" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 23 ? 'selected' : ''; ?>>Comédie</option>
        <option value="24" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 24 ? 'selected' : ''; ?>>Comtemporain</option>
        <option value="25" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 25 ? 'selected' : ''; ?>>Monologue</option>
        <option value="26" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 26 ? 'selected' : ''; ?>>One Man / Woman show</option>
            <option value="27" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 27 ? 'selected' : ''; ?>>Café-Théâtre</option>
            <option value="28" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 28 ? 'selected' : ''; ?>>Stand up</option>
            <option value="29" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 29 ? 'selected' : ''; ?>>Autres</option>
            <option value="30" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 30 ? 'selected' : ''; ?>>Contemporaine</option>
            <option value="31" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 31 ? 'selected' : ''; ?>>Classique</option>
            <option value="32" <?php echo isset($original_show['secondGenreId']) && $original_show['secondGenreId'] == 32 ? 'selected' : ''; ?>>Urbaine</option>
    </select><br>

    <label for="duration">Durée</label>
    <input type="time" name="duration" value="<?php echo isset($original_show['duration']) ? $original_show['duration'] : ''; ?>"><br>

    <label for="startTime">Début</label>
    <input type="time" name="startTime" value="<?php echo isset($original_show['startTime']) ? $original_show['startTime'] : ''; ?>"><br>

    <button type="submit" name="button">Mettre à jour un spectacle</button>
</form>
</body>
</html>
