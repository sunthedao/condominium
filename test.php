<?php require_once './connect.php';
$connection = DB();

    if(isset($_GET['id'])){
        $sqlord = "SELECT ord.id,ord.month, ord.year, r.name as room_name ,ordt.amount ,ordt.unit  , ordt.price , sv.name as sv_name
FROm orders as ord left join order_details as ordt
ON ord.id = ordt.order_id left JOIN services as sv
ON ordt.service_id = sv.id left join meter_log_details as mld
ON ord.meterlog_details_id = mld.meter_log_id left join rooms as r
ON ord.room_id = r.id
WHERE ord.id = '1'";

$qrord = mysqli_query($connection, $sqlord);

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

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>name</th>
                <th>amout</th>
                <th>unit</th>
                <th>price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php while ($row = mysqli_fetch_assoc($qrord)) : ?>
                    <td><?= $row['sv_name'] ?></td>
                    <td><?= $row['amount'] ?></td>
                    <td><?= $row['unit'] ?></td>
                    <td><?= $row['price'] ?></td>
            </tr>
        </tbody>

    <?php endwhile; ?>
    </table>

</body>

</html>

