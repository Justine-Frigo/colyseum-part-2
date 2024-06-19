<?php

include('./config.php');

if (isset($_POST['create'])) {
    $sql = 'INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) VALUES (:title, :performer, :date, :showTypesId, :firstGenresId, :secondGenreId, :duration, :startTime);';

    $date = !empty($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : null;

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':performer', $_POST['performer']);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':showTypesId', $_POST['showTypesId']);
    $stmt->bindParam(':firstGenresId', $_POST['firstGenresId']);
    $stmt->bindParam(':secondGenreId', $_POST['secondGenreId']);
    $stmt->bindParam(':duration', $_POST['duration']);
    $stmt->bindParam(':startTime', $_POST['startTime']);
    $stmt->execute();

    if(isset($_POST['show'])){
        if($_POST['showTypesId'] !=0){
            $sql = 'INSERT INTO genres (genre, showTypesId) VALUES (:genre, :showTypesId);';
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':genre', $_POST['genre']);
            $stmt->bindParam(':showTypesId', $_POST['showTypesId']);
            $stmt->execute();
        } else {
            echo 'Information du genre non valide !';
        }
    }
    echo 'Spectacle créé avec succès !';
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
    <h1>Ajouter un spectacle</h1>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="title">Titre</label>
        <input type="text" name="title"><br>
        <label for="performer">Artiste</label>
        <input type="text" name="performer"><br>
        <label for="date">Date</label>
        <input type="date" name="date"><br>
        <label for="showTypesId">Type de spectacle</label>
        <select name="showTypesId">
        <option value="0" selected hidden>Choisissez un type de spectacle</option>
            <option value="1">Concert</option>
            <option value="2">Théâtre</option>
            <option value="3">Humour</option>
            <option value="4">Danse</option>
        </select><br>
        <label for="firstGenresId">Premier genre</label>
        <select name="firstGenresId">
            <option value="0" selected hidden>Choisissez le premier genre</option>
            <option value="1">Variété et chanson française</option>
            <option value="2">Variété internationale</option>
            <option value="3">Pop/Rock</option>
            <option value="4">Musique électronique</option>
            <option value="5">Folk</option>
            <option value="6">Rap</option>
            <option value="7">Hip Hop</option>
            <option value="8">Slam</option>
            <option value="9">Reggae</option>
            <option value="10">Clubbing</option>
            <option value="11">RnB</option>
            <option value="12">Soul</option>
            <option value="13">Funk</option>
            <option value="14">Jazz</option>
            <option value="15">Blues</option>
            <option value="16">Country</option>
            <option value="17">Gospel</option>
            <option value="18">Musique du monde</option>
            <option value="19">Classique</option>
            <option value="20">Opéra</option>
            <option value="21">Autres</option>
            <option value="22">Drame</option>
            <option value="23">Comédie</option>
            <option value="24">Comtemporain</option>
            <option value="25">Monologue</option>
            <option value="26">One Man / Woman show</option>
            <option value="27">Café-Théâtre</option>
            <option value="28">Stand up</option>
            <option value="29">Autres</option>
            <option value="30">Contemporaine</option>
            <option value="31">Classique</option>
            <option value="32">Urbaine</option>
        </select><br>
        <label for="secondGenreId">Second genre</label>
        <select name="secondGenreId">
            <option value="0" selected hidden>Choisissez le second genre</option>
            <option value="1">Variété et chanson française</option>
            <option value="2">Variété internationale</option>
            <option value="3">Pop/Rock</option>
            <option value="4">Musique électronique</option>
            <option value="5">Folk</option>
            <option value="6">Rap</option>
            <option value="7">Hip Hop</option>
            <option value="8">Slam</option>
            <option value="9">Reggae</option>
            <option value="10">Clubbing</option>
            <option value="11">RnB</option>
            <option value="12">Soul</option>
            <option value="13">Funk</option>
            <option value="14">Jazz</option>
            <option value="15">Blues</option>
            <option value="16">Country</option>
            <option value="17">Gospel</option>
            <option value="18">Musique du monde</option>
            <option value="19">Classique</option>
            <option value="20">Opéra</option>
            <option value="21">Autres</option>
            <option value="22">Drame</option>
            <option value="23">Comédie</option>
            <option value="24">Comtemporain</option>
            <option value="25">Monologue</option>
            <option value="26">One Man / Woman show</option>
            <option value="27">Café-Théâtre</option>
            <option value="28">Stand up</option>
            <option value="29">Autres</option>
            <option value="30">Contemporaine</option>
            <option value="31">Classique</option>
            <option value="32">Urbaine</option>
        </select><br>
        <label for="duration">Durée</label>
        <input type="time" name="duration"><br>

        <label for="startTime">Début</label>
        <input type="time" name="startTime"><br>
        <button type="submit" name="create">Ajouter un spectacle</button>
    </form>

</body>

</html>