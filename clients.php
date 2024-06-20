<?php

include('./config.php');

try {
  $database = new PDO($url, $_ENV["DB_USER"], $_ENV["DB_PASS"]);
  $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $statement = $database->query("SELECT * FROM clients WHERE id IN (5, 22, 24, 25)");
  $clients = [];

  while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $clients[] = $row;
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

  <h1>Liste des clients</h1>
  <table>
    <thead>
      <tr>
        <th>
          Nom
        </th>
        <th>
          Prénom
        </th>
        <th>
          Date de naissance
        </th>
        <th>
          Carte
        </th>
        <th>
          Numéro de carte
        </th>

        <th>
          Update
        </th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($clients as $client) {
      ?>
        <form action="./update_client.php" method="POST">
          <tr>
            <td><?php echo $client['lastName'] ?></td>
            <td><?php echo $client['firstName'] ?></td>
            <td><?php echo $client['birthDate'] ?></td>
            <td><?php echo $client['card'] ?></td>
            <td><?php echo $client['cardNumber'] ?></td>
            <td> <input type="submit" name="update" value="Update">
              <input type="hidden" name="id" value="<?php echo $client['id'] ?>">
            </td>
        </form>
        <td>
          <form action="./delete_client.php" method="POST">
          <input type="checkbox" name="delete" value="<?php echo $client['id'] ?>" onclick="this.form.submit()"></form>
          </form>
        </td>
        </tr>
      <?php }
      ?>

    </tbody>

  </table>

</body>

</html>