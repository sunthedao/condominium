<?php require_once './connect.php';
$connection = DB();


if (isset($_GET['id'])) {
    $sql = "SELECT * FROM buildings WHERE id ='$_GET[id]'";
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

        <h1 style="text-align: center">แก้ไข ข้อมูลอาคาร</h1>

        <div class="container">
            <form action="buildingSave.php" method="POST" name="save" class="MyForm">
                <!-- body -->
                <div class="modal-body">
                    <!-- check sent ID -->
                    <?php if (isset($_GET['id'])) : ?>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">ชื่ออาคาร</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">รายละเอียดอาคาร</label>
                    <input type="text" class="form-control" id="detail" name="detail" value="<?= $row['detail'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">ที่อยู่</label>
                    <textarea class="form-control" rows="3" name="address" id="address"> <?= $row['address'] ?>" </textarea>
                </div>
                <div class="form-group">
                    <label for="amphur">อำเภอ</label>
                    <input type="text" class="form-control" id="amphur" name="amphur" placeholder="อำเภอ" value="<?= $row['amphur'] ?>">
                </div>
                <div class="form-group">
                    <label for="district">ตำบล</label>
                    <input type="text" class="form-control" id="district" name="district" placeholder="ตำบล" value="<?= $row['district'] ?>">
                </div>
                <div class="form-group">
                    <label for="province">จังหวัด</label>
                    <input type="text" class="form-control" name="province" id="province" placeholder="จังหวัด" value="<?= $row['province'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">เลขไปษณีย์</label>
                    <input type="number" class="form-control" name="postcode" value="<?= $row['postcode'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">หมายเลขโทรศัพท์</label>
                    <input type="number" class="form-control" id="phone" name="phone" value="<?= $row['phone'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">รหัสนิติบุคคล</label>
                    <input type="number" class="form-control" name="juris" id="juris" value="1" value="<?= $row['juristic_id'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">วันที่กำหนดชำระ ในแต่ละเดือน</label>
                    <input type="number" class="form-control" name="dayof" id="dayof" value="5" value="<?= $row['day_of_fine'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ค่าปรับต่อวัน</label>
                    <input type="number" class="form-control" name="fine" id="fine" value="50" value="<?= $row['fine'] ?>">
                </div>
        </div>
    </div>
    <!-- footer -->
    <div class="modal-footer">

        <a class="btn btn-danger" href="building.php">ปิด</a>

        <input button type="submit" class="btn btn-primary" name="editbuild" value="บันทึก"></input>

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