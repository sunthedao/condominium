<?php require_once './connect.php';
$connection = DB();

if (isset($_GET['id'])) {
    $aid = $_GET['id'];

    $sqlord = "SELECT ord.id,ord.month, ord.year, r.name as room_name ,ordt.amount ,ordt.unit  , ordt.price , ordt.id as ordt_id , sv.name as sv_name
    FROm orders as ord left join order_details as ordt
    ON ord.id = ordt.order_id left JOIN services as sv
    ON ordt.service_id = sv.id left join meter_log_details as mld
    ON ord.meterlog_details_id = mld.meter_log_id left join rooms as r
    ON ord.room_id = r.id
    WHERE ord.id = '$aid' and ordt.price != 0";

    $qrord = mysqli_query($connection, $sqlord);

    $sqq = "SELECT ord.id,ord.month, ord.year, r.name as room_name ,ordt.amount ,ordt.unit  , ordt.price , sv.name as sv_name
    FROm orders as ord left join order_details as ordt
    ON ord.id = ordt.order_id left JOIN services as sv
    ON ordt.service_id = sv.id left join meter_log_details as mld
    ON ord.meterlog_details_id = mld.meter_log_id left join rooms as r
    ON ord.room_id = r.id
    WHERE ord.id = '$aid'";

    $qrq = mysqli_query($connection, $sqq);

    $row1 = mysqli_fetch_assoc($qrq);
}

?>

<!DOCTYPE html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

<!-- css -->
<link rel="stylesheet" href="style.css">

<!-- awesome Font -->
<script src="https://kit.fontawesome.com/c1e251547b.js" crossorigin="anonymous"></script>

<!-- pdf -->
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bill</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>

<body>

    <form action="billsave.php" method="POST">
        <div class="container">
            <div class="row">

                <div class="mt-4 col-md-12">
                    <input type="hidden" id="odid" name="odid" value="<?= $aid ?>">
                    
                    <h1>แก้ไขบิลห้อง <?= $row1['room_name'] ?></h1>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                <th>ราคา</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($qrord)) : ?>
                                <tr>
                                    <td><?= $row['sv_name']  ?></td>
                                    <input type="hidden" id="ordtid" name="ordtid[]" value="<?= $row['ordt_id'] ?>">
                                    <td><input type="number" id="amt" name="amt[]" value="<?= $row['amount']  ?>"></td>
                                    <td><input type="number" id="prc" name="prc[]" value="<?= $row['price']  ?>"></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>


                    </table>

                    <button type="submit" id="esub" name="esub" class="btn btn-success" style="float: right">บันทึกการแก้ไข</button>

                </div>
            </div>
        </div>
    </form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>