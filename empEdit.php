<?php require_once './connect.php';
$connection = DB();


if (isset($_GET['id'])) {
    $sql = "SELECT * FROM users WHERE id ='$_GET[id]'";
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

        <h1 style="text-align: center">แก้ไข ข้อมูล</h1>

        <div class="container">
            <form action="empsav.php" method="POST" name="save" class="MyForm">
                <!-- body -->
                <div class="modal-body">
                    <!-- check sent ID -->
                    <?php if (isset($_GET['id'])) : ?>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <?php endif ?>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ชื่อ</label>
                    <input type="text" class="form-control" value="<?= $row['name'] ?>" name="Firstname">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">นามสกุล</label>
                    <input type="text" class="form-control" value="<?= $row['lastname'] ?>" name="Lastname">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">ที่อยู่</label>
                    <!-- textarea ไม่มี value -->
                    <textarea class="form-control" rows="3" name="Address"><?= $row['address'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">เลขไปษณีย์</label>
                    <input type="number" class="form-control" name="postcode" value="<?= $row['postcode'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">วันเกิด</label>
                    <input type="date" class="form-control" name="born" value="<?= $row['born'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">เลขบัตรประชาชน</label>
                    <input type="number" class="form-control" name="idcardno" value="<?= $row['idcardno'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">หมายเลขโทรศัพท์</label>
                    <input type="number" class="form-control" name="phone" value="<?= $row['phone'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ชื่อสำหรับ Login</label>
                    <input type="text" class="form-control" name="username" value="<?= $row['username'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">รหัสสำหรับ Login</label>
                    <input type="text" class="form-control" name="password" value="<?= $row['password'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">ระดับ</label>
                    <select name="degree" id="degree" value="<?= $row['degree'] ?>">

                        <option value="Admin"
                        <?php
                         if ($row['degree'] == 'Admin' ) {
                             echo "selected";
                         }
                        ?>
                        >Admin</option>
                       
                        <option value="user"
                        <?php
                         if ($row['degree'] == 'user' ) {
                             echo "selected";
                         }
                        ?>
                        >user</option>
                        

                    </select>
                </div>
        </div>
        <!-- footer -->
        <div class="modal-footer">

            <a class="btn btn-danger"  href="emp.php">ปิด</a>
            
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