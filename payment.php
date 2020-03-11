<?php

require_once './connect.php';
$connection = DB();
session_start();

// sql for rooms
$sqlr = "SELECT id , name from ROOMS WHERE customer_id != 0";
$qrR = mysqli_query($connection, $sqlr);


// sql for Service
$sqlservice = "SELECT id , name from services";
$qrService = mysqli_query($connection, $sqlservice);



if (isset($_POST['Fsubmit'])){
   $ord_id = $_POST['test'];
    $Stype = $_POST['Stype'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];

    $sql = "INSERT into order_details (service_id,amount,unit,price,total,order_id) VALUES ('$Stype','$unit','$price','$price','$price','$ord_id')";
    
    $qr = mysqli_query($connection,$sql);

    // if($qr){
    //     echo "<tbody>" ;
    //     echo "<tr>";
    //     echo "<td>" . "test" . "</td>";
         
    //     echo "</tr>";
    //     echo  "</tbody>";
       
    // }
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

                    <!-- <div class="mt-4 col-md-6">
                        <a href="">
                            <i class="fas fa-2x fa-users-cog"></i>
                            แอดมิน</a>
                    </div> -->


                </div>
            </div>


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9">
                <h3 class="text-center">ค่าใช้จ่าย</h3>
                <div class="form-group">
                    <form action="" method="POST">
                        <label for="room"></label>
                        <select class="form-control" name="room" id="room">
                            <?php while ($row = mysqli_fetch_assoc($qrR)) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endwhile; ?>
                        </select><br>

                        <!-- month -->
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


                        <button type="submit" name="subroom">ตกลง</button>
                    </form>
                </div><br>
                <div class="container">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#MyModal">เพิ่มค่าบริการ</button>
                </div><br>

                <div class="container">
                    <table class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr style="text-align: center" class="font-weight-bolder">

                                <th style="font-size: 20px">ห้อง</th>
                                <th style="font-size: 20px">รายละเอียด</th>
                                <th style="font-size: 20px">จำนวน</th>
                                <th style="font-size: 20px">ราคา</th>
                                

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            if (isset($_POST['subroom'])) {

                                $month = isset($_POST['month']) ? $_POST['month'] : '';
                                $year = isset($_POST['year']) ? $_POST['year'] : '';
                                $room = isset($_POST['room']) ? $_POST['room'] : '';

                                $sql = "SELECT r.id , r.name as room_name , ord.room_id, ord.id as ord_id , od.amount , od.price , ser.name as service_name
                                            FROM rooms as r left join orders as ord
                                            ON r.id = ord.room_id left join order_details as od
                                            ON ord.id = od.order_id left join services as ser
                                            ON od.service_id = ser.id
                                            WHERE r.id = '$room' and ord.month = '$month' and ord.year = '$year'";

                                $qrRoom = mysqli_query($connection, $sql);

                                // print_r($qrRoom);

                                while ($row = mysqli_fetch_assoc($qrRoom)) {
                                    echo "<tr style='text-align: center'>";
                                    echo "<td style='font-size: 20px'>" . $row["room_name"] . "</td>";
                                    echo "<td style='font-size: 20px'>" . $row["service_name"] . "</td>";
                                    echo "<td style='font-size: 20px'>" . $row["amount"] . "</td>";
                                    echo "<td style='font-size: 20px'>" . $row["price"] . "</td>";
                                    echo "</tr>";

                                    $test = $row["ord_id"];
                                   
                                }
                                
                                $sqlwater = "select mld.old_number , mld.new_number , mld.price_water , mld.month , mld.year , r.name as room_name , r.id
                                            from meter_log_details as mld left join meter_logs as ml
                                            ON mld.meter_log_id = ml.id left join rooms as r
                                            ON ml.id = r.id
                                            WHERE r.id = '$room' and month = '$month' and year = '$year'";
                                $qrwater = mysqli_query($connection,$sqlwater);

                                while ($row = mysqli_fetch_assoc($qrwater)){

                                    $amount = $row['new_number'] - $row['old_number'];
                                    $price = $amount * 12 ;

                                    echo "<tr style='text-align: center'>";
                                    echo "<td style='font-size: 20px'>" . $row["room_name"] . "</td>";
                                    echo "<td style='font-size: 20px'>" . "ค่าน้ำประปา" . "</td>";
                                    echo "<td style='font-size: 20px'>" . $amount . "</td>";
                                    echo "<td style='font-size: 20px'>" . $price . "</td>";
                                    echo "</tr>";
                                }
                                
                            }

                                // if (isset($_POST['Fsubmit'])){
                                //     $month = isset($_POST['month']) ? $_POST['month'] : '';
                                //     $year = isset($_POST['year']) ? $_POST['year'] : '';
                                //     $room = isset($_POST['room']) ? $_POST['room'] : '';
    
                                //     $sql = "SELECT r.id , r.name as room_name , ord.room_id, ord.id as ord_id , od.amount , od.price , ser.name as service_name
                                //                 FROM rooms as r left join orders as ord
                                //                 ON r.id = ord.room_id left join order_details as od
                                //                 ON ord.id = od.order_id left join services as ser
                                //                 ON od.service_id = ser.id
                                //                 WHERE r.id = '$room' and ord.month = '$month' and ord.year = '$year'";
    
                                //     $qrRoom = mysqli_query($connection, $sql);
    
                                //     // print_r($qrRoom);
    
                                //     while ($row = mysqli_fetch_assoc($qrRoom)) {
                                //         echo "<tr style='text-align: center'>";
                                //         echo "<td style='font-size: 20px'>" . $row["room_name"] . "</td>";
                                //         echo "<td style='font-size: 20px'>" . $row["service_name"] . "</td>";
                                //         echo "<td style='font-size: 20px'>" . $row["amount"] . "</td>";
                                //         echo "<td style='font-size: 20px'>" . $row["price"] . "</td>";
    
                                //         echo "</tr>";
    
                                //         $test = $row["ord_id"];
                                       
                                //     }
                                    
                                // }

                            

                            ?>

                            <!-- 
                                // echo "<td style='font-size: 20px'>" .$room."</td>";
                                // echo "<td style='font-size: 20px'>" .$type."</td>";
                                // echo "<td style='font-size: 20px'>" .$type."</td>";
                                // echo "<td style='font-size: 20px'>" .$type."</td>";

                                // 



                                // echo "<td style='font-size: 20px'>" .$type."</td>"; -->






                        </tbody>
                    </table>
                    <br>
                    <br>

                    <!-- <div class="container">
                        <button style="float: right;" class="btn btn-danger">ลบ</button>
                        <button style="float: right;" class="btn btn-wanring">แก้ไข</button>
                    </div> -->


                </div>
            </div>

        </div>




    </div>
    </div>



    <!-- modal -->
    <div class="modal fade" id="MyModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h1 class="modal-title">ค่าบริการ</h1><br>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>


                <!-- modal body -->
                <form action="" method="POST" id="forservice">
                    <div class="modal-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รายการ</th>
                                    <th>จำนวน</th>
                                    <th>ราคา</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="Stype" id="Stype">
                                            <?php while ($row = mysqli_fetch_assoc($qrService)) : ?>
                                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                            <?php endwhile; ?>
                                        </select></td>
                                    <td><input type="number" name="unit" id="unit"></td>
                                    <td><input type="number" name="price" id="price"></td>
                                    <input type="hidden" name="test" id="test" value="<?= $test ?>">
                                    <input type="hidden" name="month" id="month" value="<?= $month ?>">
                                    <input type="hidden" name="year" id="year" value="<?= $year ?>">
                                    <input type="hidden" name="room" id="room" value="<?= $room ?>">
                                    <!-- <?= $test; ?> -->
                                    <!-- <?= $month; ?> -->
                                    <!-- <?= $year; ?> -->
                                    <!-- <?= $room; ?> -->

                                     <!-- <? $_POST['test'] = $test; ?> -->
                                </tr>
                            </tbody>

                        </table>



                    </div>


                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <?php if (isset($_POST['room'])) : ?>
                            <input type="hidden" name="subroom" value="<?= $_POST['room'] ?>">
                        <?php endif ?>

                        <!-- <input type="hidden" name="room1" value="<? $room ?>"> -->
                        <button type="submit" name="Fsubmit" class="btn btn-primary">เพิ่ม</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
                    </div>
                </form>
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