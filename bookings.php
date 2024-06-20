<?php 

include('./config.php');

try {
$statement = $pdo->query ("SELECT id, clientId FROM bookings WHERE clientId IN (24, 25)");
$bookings = [];


while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $bookings[] = $row;
    }

}  catch (PDOException $error) {
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
    <h1>Liste des réservations</h1>
  <table>
    <thead>
      <tr>
        <th>
          ID
        </th>
        <th>
          Client ID
        </th>
      </tr>
    </thead>

    <tbody>
        <?php
        foreach ($bookings as $booking) {
        ?>
        <form action="./delete_booking.php" method="POST">
          <tr>
            <td><?php echo $booking['id'] ?></td>
            <td><?php echo $booking['clientId'] ?></td>
      </form>
      <td>
        <form action="./delete_booking.php" method="POST">
        <input type="checkbox" name="delete" value="<?php echo $booking['clientId'] ?>" onclick="this.form.submit()"></form>
        </form>
      </td>
      </tr>
    <?php }

    ?>

    </tbody>

  </table>
    

</body>
</html>