<?php require_once './connect.php';
$connection = DB();


if (isset($_GET['id'])) {
    $sql = "SELECT * FROM rooms WHERE id ='$_GET[id]'";
    $query = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($query);
}




?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="style.css">

    <!-- awesome Font -->
    <script src="https://kit.fontawesome.com/c1e251547b.js" crossorigin="anonymous"></script>


    <title>Main Index</title>
</head>

<body>
    <div class="container">

        <h1 style="text-align: center">แก้ไข ข้อมูล</h1>

        <div class="container">
            <form action="roomSave.php" method="POST" name="save" class="MyForm">
                <!-- body -->
                <div class="modal-body">
                    <!-- check sent ID -->
                    <?php if (isset($_GET['id'])) : ?>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">เลขห้อง</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">รายละเอียดห้อง</label>
                    <input type="text" class="form-control" id="detail" name="detail" value="<?= $row['detail'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">ชั้น</label>
                    <input type="text" class="form-control" id="floor" name="floor" value="<?= $row['floor'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">ขนาดห้อง</label>
                    <input type="text" class="form-control" id="size" name="size" value="<?= $row['size'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"> รหัสตึก </label>
                    <input type="text" class="form-control" id="building_id" name="building_id" value="<?= $row['building_id'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"> รหัสลูกค้า </label>
                    <input type="text" class="form-control" id="customer_id" name="customer_id" value="<?= $row['customer_id'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"> S/N มิเตอร์ </label>
                    <input type="text" class="form-control" id="meter_serial" name="meter_serial" value="<?= $row['meter_serial'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"> เลขมิเตอร์น้ำ </label>
                    <input type="text" class="form-control" id="water_number" name="water_number" value="<?= $row['water_number'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"> ค่าน้ำมาตรฐาน </label>
                    <input type="text" class="form-control" id="water_price" name="water_price" value="12" value="<?= $row['water_price'] ?>">
                </div>


                </select>
        </div>
    </div>
    <!-- footer -->
    <div class="modal-footer">

        <a class="btn btn-danger" href="room.php">ปิด</a>

        <input button type="submit" class="btn btn-primary" name="editdata" value="บันทึก"></input>

    </div>
    </form>
    </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<?php
mysqli_close($connection);
?>

</html>