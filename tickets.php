<?php 

include('./config.php');

try {
$statement = $pdo->query ("SELECT id, price, bookingsId FROM tickets WHERE id IN (24, 25)");
$tickets = [];


while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $tickets[] = $row;
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
    <h1>Liste des tickets</h1>
  <table>
    <thead>
      <tr>
        <th>
          ID
        </th>
        <th>
          Price
        </th>
        <th>
            Bookings ID
        </th>
      </tr>
    </thead>

    <tbody>
        <?php
        foreach ($tickets as $ticket) {
        ?>
        <form action="./delete_ticket.php" method="POST">
          <tr>
            <td><?php echo $ticket['id'] ?></td>
            <td><?php echo $ticket['price'] ?></td>
            <td><?php echo $ticket['bookingsId'] ?></td>
      </form>
      <td>
        <form action="./delete_ticket.php" method="POST">
        <input type="checkbox" name="delete" value="<?php echo $ticket['id'] ?>" onclick="this.form.submit()"></form>
        </form>
      </td>
      </tr>
    <?php }

    ?>

    </tbody>

  </table>
    

</body>
</html>