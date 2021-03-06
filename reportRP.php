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
                <h1 class="text-center"> รายงานการแจ้งซ่อม </h1>

                <form action="" method="POST">
                    <div style="float: left" class="Ono">
                        <label for="month"> เดือนสำหรับรายงาน </label>
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
                            <option value="October">ตุลาคม</option>
                            <option value="November">พฤศจิกายน</option>
                            <option value="December">ธันวาคม</option>
                        </select>
                    </div>
                    <div style="float: center" class="Ono">
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

                    <button type="submit" id="rproom" name="rproom" class="btn btn-primary">ตกลง</button>
                </form>
                <?php
                if (isset($_POST['rproom'])) {
                    $month = isset($_POST['month']) ? $_POST['month'] : '';
                    $year = isset($_POST['year']) ? $_POST['year'] : '';

                    echo "<h3 class='text-center'>" . $month . " " . $year . "</h3>";
                }
                ?>
                <table class="table table-bordered table-striped" style="text-align: center">
                    <thead>
                        <tr>
                            <th>ห้อง</th>
                            <th>รายการแจ้งซ่อม</th>
                            <th>วันแจ้งซ่อม</th>
                            <th>วันที่ซ่อมเสร็จ</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_POST['rproom'])) {
                            $month = isset($_POST['month']) ? $_POST['month'] : '';
                            $year = isset($_POST['year']) ? $_POST['year'] : '';


                            $sql =  "SELECT rp.id , rp.detail , rp.date_call , rp.date_do , rp.price , r.name as r_name
                            FROM repair as rp left join rooms as r
                            ON rp.room_id = r.id
                            WHERE rp.month = '$month' and rp.year = '$year' and rp.price != 0
                            ORder by rp.date_call";
                            
                            // "select od.month, od.year , R.name as r_name , odt.total , rp.detail , rp.date_call , rp.date_do
                            // from orders as od left join rooms as R
                            // ON od.room_id = R.id left join order_details as odt
                            // ON od.id = odt.order_id left join repair as rp
                            // ON od.room_id = rp.room_id
                            // WHERE od.month = '$month' and od.year = '$year' and odt.service_id = '5' and rp.price != '0'
                            // ORder by r.id";

                            $qr = mysqli_query($connection, $sql);



                            if (mysqli_num_rows($qr) == 0) {
                                echo "<tr>";
                                echo "<td>" . "</td>";
                                echo "<td>" . "</td>";
                                echo "<td>" . " เดือนนี้ไม่มีการแจ้งซ่อม " . "</td>";
                                echo "<td>" . "</td>";
                                echo "</tr>";
                            } else {
                                while ($row = mysqli_fetch_assoc($qr)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['r_name'] . "</td>";
                                    echo "<td>" . $row['detail'] . "</td>";
                                    echo "<td>" . $row['date_call'] . "</td>";
                                    echo "<td>" . $row['date_do'] . "</td>";
                                    echo "</tr>";
                                }
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