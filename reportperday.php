<?php require_once './connect.php';
$connection = DB();
session_start();










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

    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    <!-- awesome Font -->
    <script src="https://kit.fontawesome.com/c1e251547b.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="css/fontawesome.css"> -->
    <style>
        @media print {
            #nono {
                display: none;
            }

            #nono1 {
                display: none;
            }

            .Ono {
                display: none;
            }

            #rproom {
                display: none;
            }

            #p1 {
                display: none;
            }

            #p2 {
                display: none;
            }
        }
    </style>

    <title>Home</title>
</head>

<body>



    <div class="container" media="print" id="nono">
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
    <div id="first" class="container" media="print">
        <div class="row">
            <!-- 3 ไว้แสดง Menu -->
            <div class="mt-4 col-md-3" id="nono1">
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


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9">
                <h1 class="text-center"> รายงานเก็บค่าเช่าในแต่ละวัน </h1>

                <form action="" method="POST">
                    <div style="float: left" class="Ono">
                        <label for="month"> เดือนสำหรับรายงาน </label>
                        <input type="date" id="dt" name="dt" value="<?php echo isset($_POST['dt']) ? $_POST['dt'] : '';?>">

                        
                    </div>
                    <!-- // $date = date('Y-m-d'); -->

                    <button type="submit" id="rproom" name="rproom" class="btn btn-primary ml-3">ตกลง</button>
                </form>

                <!-- <?= $_POST['dt'] ?> -->

                <?php
                if (isset($_POST['rproom'])) {
                    $dt = isset($_POST['dt']) ? $_POST['dt'] : '';
                    // $year = isset($_POST['year']) ? $_POST['year'] : '';

                    echo "<h3 class='text-center'>" . $dt .  "</h3>";
                }
                ?>
                <table class="table table-bordered table-striped" style="text-align: center">
                    <thead>
                        <tr>
                            <th>ห้อง</th>
                            <th>ชื่อผู้เช่า</th>
                            <th>วันที่ชำระ</th>

                            <th>จำนวนเงิน</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['rproom'])) {
                            $month = isset($_POST['month']) ? $_POST['month'] : '';
                            $year = isset($_POST['year']) ? $_POST['year'] : '';

                            $sqlst = "SELECT id , month , year FROM orders as od WHERE od.payment_at = '$dt'";
                            $qrst = mysqli_query($connection, $sqlst);


                            while ($row = mysqli_fetch_assoc($qrst)) {
                                $odst[] = $row['id'];
                            }

                            if (mysqli_num_rows($qrst) == 0) {
                                echo "<tr>";
                                echo "<td>" .  "</td>";
                                echo "<td>" .  "</td>";
                                echo "<td>" . "ไม่พบรายการชำระในวันนี้" . "</td>";
                                echo "<td>" . "</td>";
                                echo "</tr>";
                            } else {





                                // print_r($odst);
                                // print_r($odst);

                                foreach ($odst as $i) {


                                    // $sqlwater = 

                                    $sqltest = "SELECT od.meterlog_details_id , mld.price_water 
                                    FROM orders as od left join meter_log_details as mld 
                                    ON od.meterlog_details_id = mld.meter_log_id 
                                    WHERE od.id = '$i' Order by mld.id DESC LIMIT 1";
                                    //  and od.month = '$month' and od.year = '$year' 
                                    // and mld.month ='$month' and mld.year ='$year'";

                                    // echo    "SELECT mld.price_water as water , ods.id as order_id , rooms.name as room_name , cus.firstname
                                    //                 FROM meter_log_details as mld left join orders as ods 
                                    //                 ON mld.meter_log_id = ods.meterlog_details_id left join rooms
                                    //                 ON ods.room_id = rooms.id left join customers as cus
                                    //                 ON ods.customer_id = cus.id
                                    //                 WHERE ods.month = '$month' and mld.month = '$year' and ods.id ='$i'";
                                    // "SELECT * FROM meter_log_details WHERE meter_log_id ='14'";

                                    $qrsss = mysqli_query($connection, $sqltest);
                                    $row1 = mysqli_fetch_assoc($qrsss);
                                    $plz = $row1['price_water'];
                                    // $cv = (int)$plz;




                                    // echo "ค่าน้ำ". $plz .'<br>';
                                    //    $waer = $row['price_water'];


                                    //    echo  "ค่าน้ำ".$waer.'<br>';
                                    // $row = mysqli_fetch_assoc($qrorder);
                                    // $total = number_format($row['total_price']);
                                    // ผลรวม
                                    $sqlsum = "SELECT sum(total) as st
                                                FRom order_details
                                                WHERE order_id = $i";

                                    $qrsum = mysqli_query($connection, $sqlsum);

                                    $row = mysqli_fetch_assoc($qrsum);
                                    $ttt = $row['st'];
                                    $tsum = $ttt + $plz;

                                    // echo $ttt.'<br>';
                                    // echo "ผลรวม". $tsum .'<br>';


                                    $sql = "SELECT od.id , od.payment_at as pay , r.name as room_name , cus.firstname as firstname
                                                FROM orders as od left join rooms as r 
                                                ON od.room_id = r.id left join customers as cus 
                                                ON od.customer_id = cus.id WHERE od.id = '$i'";
                                    $qr = mysqli_query($connection, $sql);

                                    $row = mysqli_fetch_assoc($qr);
                                    $dt = $row['pay'];

                                    echo "<tr>";
                                    echo "<td>" . $row['room_name'] . "</td>";
                                    echo "<td>" . $row['firstname'] . "</td>";
                                    echo "<td>" . $dt . "</td>";
                                    echo "<td>" . number_format($tsum) . "</td>";
                                    echo "</tr>";

                                    $a[] = $tsum;
                                }

                                $c = array_sum($a);
                                echo "<tr>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "รวม" . "</td>";
                                echo "<td>" . number_format($c) . "</td>";
    
                                echo  "</tr>";
                            }


                           
                        }







                        ?>



                        <!--                  

                        <tr>
                            <td></td>
                            <td>รวมค่าห้อง</td>
                            <td> <?= number_format($c)  ?> </td>
                        </tr> -->
                    </tbody>


                </table>


                <button style="float: right" onclick="print()" class="btn btn-success" id="p1"> ปริ้น </button>
                <a href="home.php" class="btn btn-primary" style="float:right" id="p2"> กลับหน้าหลัก</a>

            </div>



        </div>
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