<?php require_once './connect.php';
$connection = DB();


if (isset($_GET['id'])) {
    $sql = "SELECT * FROM customers WHERE id ='$_GET[id]'";
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

    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">


    <title>Main Index</title>
</head>

<body>
    <div class="container">

        <h1 style="text-align: center">แก้ไข ข้อมูลลูกค้า</h1>

        <div class="container">
            <form action="cussav.php" method="POST" name="save" class="MyForm">
                <!-- body -->
                <div class="modal-body">
                    <!-- check sent ID -->
                    <?php if (isset($_GET['id'])) : ?>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <?php endif ?>
                </div>
                <div class="form-group">
                            <label for="exampleFormControlInput1">ชื่อ</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $row['firstname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">นามสกุล</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $row['lastname'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ที่อยู่</label>
                            <textarea class="form-control" rows="3" name="address" id="address"><?= $row['address'] ?></textarea>
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
                            <input type="number" class="form-control" name="phone" value="<?= $row['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">วันเกิด</label>
                            <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?= $row['birthdate'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">เลขบัตรประชาชน</label>
                            <input type="number" class="form-control" id="idcardno" name="idcardno" value="<?= $row['idcard'] ?>">
                        </div>
                </div>
        </div>
        <!-- footer -->
        <div class="modal-footer">

            <a class="btn btn-danger"  href="cust.php">ปิด</a>
            
            <input button type="submit" class="btn btn-primary" name="editcus" value="บันทึก"></input>

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