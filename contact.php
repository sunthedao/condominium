<?php require_once './connect.php';
$connection = DB();
session_start();

// query CUstomers
$sqlCus = "select  id , firstname from customers ORDER BY customers.id DESC";
$queryCus = mysqli_query($connection, $sqlCus);

// Query Buildings
$sqlBuild = "SELECT id , name from buildings";
$qrBuild = mysqli_query($connection, $sqlBuild);
// Query Rooms
$sqlR = "SELECT id , name from rooms WHERE customer_id = 0";
$qrRooms = mysqli_query($connection, $sqlR);

// Contact types
$sqlConT = "SELECT id , description from contract_types";
$qrConT = mysqli_query($connection, $sqlConT);


// Contact Status
// $sqlConS = "SELECT status from contracts";
// $qrConS = mysqli_query($connection,$sqlConS);

// Contact No.
$number = 1;
$pad = str_pad($number, 3, "0", STR_PAD_LEFT);
$date = date("Ymd") . $pad;
// $newd = '';

$sqlconno = "SELECT MAX(contract_no) as maxid FROM contracts";
$qrconno = mysqli_query($connection,$sqlconno);

while ($row = mysqli_fetch_assoc($qrconno)){
    $maxid = $row['maxid'].'<br>';
    // echo (int)$maxid.'<br>';
    // echo $date;
 if ($date < $maxid){
   
     $maxmax = (int)$maxid + 1;
    // echo ($date += 1).'<br>';

 } else{
    $maxmax = $date;
 }
   

}


// $check_row = mysqli_num_rows($qrconno);
// if($check_row > 0){
//     $date += 1 ;
//     $newd = $date ;
//     // echo $newd.'<br>';
// }
// echo $date;

// $sqlConno = "SELECT contract_no from contracts";
// $queryConno = mysqli_query($connection,$sqlConno);


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


    <title>Home</title>
</head>

<body>
    <!-- menu -->
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
    <!-- end menu -->
    <br>

    <!-- vertical Menu -->
    <div id="first" class="container">
        <div class="row">
            <!-- 3 ไว้แสดง Menu -->
            <div class="mt-4 col-md-3">
                <div class="row">
                    <div class="col-6">
                        <a href="">
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

                    <div class="mt-4 col-md-6">
                        <a href="repair.php">
                            <i class="fas fa-2x fa-tools"></i>
                            แจ้งซ่อม</a>
                    </div>

                </div>
            </div>


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9">
                <h3 class="text-center">สัญญา</h3>
                <div class="container">
                    <form action="contactSave.php" method="POST">
                        <div class="form-group">
                        <label for="month"> เดือน </label>
                        <select name="month" id="month">
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

                        <!-- year  -->
                        <label for="year"> ปี </label>
                        <select name="year" id="year">
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                        </select>
                        <br>
                            <a href="custAdd.php" class="btn btn-success" title="กรณีที่ยังไม่มีข้อมูลของลูกค้า">กรอกข้อมูลลูกค้า</a><br>

                            <!-- Customer -->
                            <label for="cus" class="btn btn-primary">ลูกค้า</label>
                            <select class="form-control" name="cus" id="cus">
                                <?php while ($row = mysqli_fetch_assoc($queryCus)) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['firstname'] ?></option>
                                <?php endwhile; ?>
                            </select> <br>

                            <!-- Building -->
                            <label for="building" class="btn btn-primary">ตึก</label>
                            <select class="form-control" name="building" id="building">
                                <?php while ($row = mysqli_fetch_assoc($qrBuild)) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php endwhile; ?>
                            </select> <br>

                            <!-- ROOM -->
                            <label for="room" class="btn btn-primary">ห้อง</label>
                            <select class="form-control" name="room" id="room">
                                <?php while ($row = mysqli_fetch_assoc($qrRooms)) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php endwhile; ?>
                            </select> <br>

                            <label for="con" class="btn btn-primary">เลขที่สัญญา</label>
                            <input type="text" name="con" id="con" value="<?= $maxmax ?>"> <br> <br>

                            <label for="datebegin" class="btn btn-primary">วันที่สัญญา</label>
                            <input type="date" name="datebegin" id="datebegin" value="<?php echo date("Y-m-d"); ?>">
                            <!-- date("Y/m/d") -->

                            <label for="dateend" class="btn btn-primary">วันที่สิ้นสุดสัญญา</label>
                            <input type="date" name="dateend" id="dateend" required="required" title="d"> <br><br>

                            <label for="price" class="btn btn-primary">ราคาห้อง</label>
                            <input type="number" size="100" min="0" max="1000000" step="1" name="price" id="price" required="required"> <br><br>

                            <label for="earnest" class="btn btn-primary">ค่ามัดจำ</label>
                            <input type="number" min="0" max="1000000" step="1" name="earnest" id="earnest" required="required"> <br><br>

                            <label for="status" class="btn btn-primary">สถานะ</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1">อนุมัติ</option>
                                <option value="0">รออนุมัติ</option>
                            </select>

                            <!-- contact type -->
                            <label for="type" class="btn btn-primary">ประเภท</label>
                            <select class="form-control" name="type" id="type">
                                <?php while ($row = mysqli_fetch_assoc($qrConT)) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['description'] ?></option>
                                <?php endwhile; ?>
                            </select> <br>

                            <label for="user" class="btn btn-primary">พนักงาน</label>
                            <input type="hidden" name="iduser" id="iduser" value="<?= $_SESSION['id'] ?>">
                            <input type="text" name="user" id="user" value="<?= $_SESSION['name'] ?>">

                            <br><br><br>

                            <button type="submit" class="btn btn-success float-right" name="insertCont" value="submit">ยืนยัน</button>



                        </div>
                    </form>
                </div>




            </div>
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