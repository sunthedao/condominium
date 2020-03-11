<?php require_once './connect.php';
$connection = DB();
session_start();

$month = date('d m Y');



// $floor1 = isset($_POST['floor']) ? '1' : $_POST['floor'];

// echo $floor1;

// $year = date("F", strtotime(date("F-m") . "-1 month"));
// $yearnmonth = (isset($_POST['yearnmonth']) ? '' : '');


if (isset($_POST['okie'])) {
    $floor = $_POST['floor'];

    $sqlFl = "SELECT R.id , R.name,R.floor , ml.meter_current 
                FROm rooms as R right join meter_logs as ml 
                ON r.meter_logs_id = ml.id 
                WHERE r.floor = '$floor' and r.customer_id > 0";
    $qrFl = mysqli_query($connection, $sqlFl);
} else {
    $sqlFl = "SELECT R.id , R.name ,R.floor , ml.meter_current 
                FROm rooms as R right join meter_logs as ml 
                ON r.meter_logs_id = ml.id 
                WHERE r.floor = 1 and r.customer_id > 0";
    $qrFl = mysqli_query($connection, $sqlFl);
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


    <title>Water</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Mollis Condo</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="home.php">Home</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                            <li class="name"><span> ยินดีต้อนรับ <?= $_SESSION['name'] ?> </span></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <br>

    <!-- vertical Menu -->
    <div id="first" class="container">
        <div class="row">
            <!-- 3 ไว้แสดง Menu -->
            <div class="mt-4 col-md-3">
                <div class="row">
                    <div class="col-6">
                        <a href="contact.php">
                            <i class="fas fa-2x fa-file-signature"></i>
                            ทำสัญญา</a>
                    </div>
                    <div class="col-md-6">
                        <a href="payment.php">
                            <i class="fas fa-2x fa-clipboard"></i>
                            บันทึกค่าใช้จ่าย</a><br>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="water.php">
                            <i class="fas fa-2x fa-tint"></i>
                            บันทึกค่าน้ำ</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="bill.php">
                            <i class="fas fa-2x fa-file-invoice"></i>
                            บิล</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="billCreate.php">
                            <i class="fas fa-2x fa-file-invoice"></i>
                            สร้างบิล</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="data.php">
                            <i class="fas fa-2x fa-database"></i>
                            ข้อมูล</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="report.php">
                            <i class="far fa-2x fa-sticky-note"></i>
                            รายงาน</a>
                    </div>

                    <!-- <div class="mt-4 col-md-6">
                        <a href="">
                            <i class="fas fa-2x fa-users-cog"></i>
                            แอดมิน</a>
                    </div> -->


                </div>
            </div>


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9">
                <h1 class="text-center">บันทึกค่าน้ำ</h1>
                <br>

                <form action="" method="POST">
                    <label for="floor">ชั้น</label>
                    <select name="floor" id="floor">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <input type='submit' name="okie" value="ตกลง"></input>
                </form>

                <form action="waterS.php" method="POST">
                    <div style="float: right">
                        <label for="month">เดือน / วัน / ปี</label>
                        <input type="date" id="month" name="month" value="<?= date("Y-m-d") ?>" readonly>
                    </div>
                    <div style="float: left">
                        <label for="yearnmonth"> เดือนสำหรับที่จะคิดค่าน้ำ </label>
                        <select name="yearnmonth" id="yearnmonth">
                            <option value="January">มกราคม</option>
                            <option value="February">กุมพาพันธ์</option>
                            <option value="March">มีนาคม</option>
                            <option value="April">เมษายน</option>
                            <option value="May">พฤษภาคม</option>
                            <option value="June">มิถุนายน</option>
                            <option value="July">กรกฏาคม</option>
                            <option value="August">สิงหาคม</option>
                            <option value="September">กันายน</option>
                            <option value="Octomer">ตุลาคม</option>
                            <option value="November">พฤศจิกายน</option>
                            <option value="December">ธันวาคม</option>
                        </select>
                    </div>
                    <div style="float: center">
                        <label for="year"> ปี </label>
                        <select name="year" id="year">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>

                        </select>
                    </div>

                    <br><br>


                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th>ห้อง</th>
                                <th>เลขมิตเตอร์เก่า</th>
                                <th>เลขมิตเตอร์ใหม่</th>
                                <!-- <th>จำนวน</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($qrFl)) : ?>
                                <tr style="text-align: center">
                                    <input type="hidden" id="test" name="test" value="<?= $row['floor'] ?>">
                                    <input type="hidden" id="wid" name="wid[]" value="<?= $row['id'] ?>">
                                    <input type="hidden" id="ynm" name="ynm" value="<? $yearnmonth ?>">
                                    <td> <input type="number" id="wname" name="wname" value="<?= $row['name'] ?>" readonly> </td>
                                    <td> <input type="number" id="oldnum" name="oldnum[]" value="<?= $row['meter_current'] ?>" readonly> </td>
                                    <td> <input type="number" id="newnum" name="newnum[]" value=""> </td>
                                    <!-- <td> <input type="number" id="result" name="result" value="<?= ($row['new_number'] - $row['old_number']) ?>"  readonly>   </td>      -->
                                    <!-- <td> <input type="button" id="result" name="result" onclick="add_number()">   </td>       -->
                                </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
                    <br><br>


                    <div class="container">
                        <button type="submit" style="float: right;" class="btn btn-primary" id="savewater" name="savewater">บันทึก</button>

                    </div>

                </form>
            </div>





            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
<script>



</script>



<?php
mysqli_close($connection);
?>

</html>