<?php require_once './connect.php';
$connection = DB();
session_start();

$sqlR = "SELECT id , name FROM rooms WHERE customer_id = 0 Order by id";
$qrR = mysqli_query($connection, $sqlR);
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

                    <div class="mt-4 col-md-6">
                        <a href="repair.php">
                            <i class="fas fa-2x fa-tools"></i>
                            แจ้งซ่อม</a>
                    </div>


                </div>
            </div>


            <!-- 5 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-5">
                <h3 class="text-center">ห้อง</h3>
                <div class="container">
                    <table class="table table-bordered table-striped" style="width: 100%">

                        <thead style="text-align: center">
                            <tr>
                                <th>ห้อง</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>

                        <tbody style="text-align: center">
                            <?php while ($row = mysqli_fetch_assoc($qrR)) {
                                echo "<tr>";
                                echo "<td>" . '<button type="submit" name="empty" id="empty" class="btn btn-info">' . $row['name'] . '</button>' . "</td>";
                                echo "<td>" .'<button type="submit" name="empty" id="empty" class="btn btn-success">' . "ว่าง" . '</button>' . "</td>";
                                echo "</tr>";
                            }
                                
                            ?>
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- ค้างชำระ -->
            <div class="mt-4 col-md-4">
                <h3 class="text-center">ห้องที่ค้างชำระ</h3>
                <table class="table table-bordered table-striped">
                    <thead style="text-align: center">
                        <tr>
                            <th>ห้องที่ยังไม่ได้ทำการชำระ</th>
                            <th>จำนวนเงิน</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">


                    <?php

                    $sqlino = "SELECT r.id ,r.name , ord.status , ord.month , ord.year ,ord.id as ord_id , ord.total_price
                    FROM rooms as r left join orders as ord
                    ON r.id = ord.room_id
                    WHERE ord.status = '0'";
                    $qrino = mysqli_query($connection,$sqlino);
                    
                    while ($row = mysqli_fetch_assoc($qrino)){
                        $tprice = $row['total_price'];
                        $ttprice = number_format($tprice);

                        echo "<tr>" ;  
                        // echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . '<button type="submit" name="empty" id="empty" class="btn btn-info">' . $row['name'] . '</button>'. "</td>";
                        echo "<td>" .'<button type="submit" name="empty" id="empty" class="btn btn-danger">' . $ttprice . '</button>' . "</td>";
                        echo "</tr>" ;  


                    }


                        ?>
                    </tbody>
                </table>
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