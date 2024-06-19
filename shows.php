<?php 

include('./config.php');

try {
    $database = new PDO($url, $_ENV["DB_USER"], $_ENV["DB_PASS"]);
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    $statement = $database->query("SELECT * FROM shows WHERE id = 1");
    $shows = [];
  
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $shows[] = $row;
    }
  } catch (PDOException $error) {
    print_r($error->getMessage());
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

<h1>Liste des spectacles</h1>
  <table>
    <thead>
      <tr>
        <th>
          Titre
        </th>
        <th>
          Artiste
        </th>
        <th>
          Date
        </th>
        <th>
          Type
        </th>
        <th>
         Premier genre
        </th>

        <th>
         Second genre
        </th>

        <th>
         Durée
        </th>
        
        <th>
          Début
        </th>
      </tr>
    </thead>

    <tbody>
        <?php
        foreach ($shows as $show) {
        ?>
        <form action="./update_show.php" method="POST">
          <tr>
            <td><?php echo $show['title'] ?></td>
            <td><?php echo $show['performer'] ?></td>
            <td><?php echo $show['date'] ?></td>
            <td><?php echo $show['showTypesId'] ?></td>
            <td><?php echo $show['firstGenresId'] ?></td>
            <td><?php echo $show['secondGenreId'] ?></td>
            <td><?php echo $show['duration'] ?></td>
            <td><?php echo $show['startTime'] ?></td>
            <td> <input type="submit" name="update" value="Update">
              <input type="hidden" name="id" value="<?php echo $show['id'] ?>">
            </td>
        </tr>
      </form>
    <?php }
    ?>

    </tbody>

  </table>
    
</body>
</html>