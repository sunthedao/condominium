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


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9">


                <table class="table table-bordered table-striped">
                    <form action="" method="POST">

                        <!-- month -->
                        <label for="month"> เดือน </label>
                        <select name="month" id="month">
                            <option value="January"
                            <?php 
                            if (isset($_POST['month'])){
                                if($_POST['month'] == 'January'){
                                    echo "selected";
                                }
                            }
                            ?>
                            >มกราคม</option>
                            <option value="February"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'February'){
                                    echo "selected";
                                }
                            }
                            
                             ?> >กุมพาพันธ์</option>
                            
                            <option value="March"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'March'){
                                    echo "selected";
                                }
                            }
                            ?> >มีนาคม</option>
                            <option value="April"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'April'){
                                    echo "selected";
                                }
                            }
                            ?>>เมษายน</option>
                            <option value="May"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'May'){
                                    echo "selected";
                                }
                            }
                            ?>>พฤษภาคม</option>
                            <option value="June"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'June'){
                                    echo "selected";
                                }
                            }
                            ?> >มิถุนายน</option>
                            <option value="July"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'July'){
                                    echo "selected";
                                }
                            }
                            ?> >กรกฏาคม</option>
                            <option value="August"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'August'){
                                    echo "selected";
                                }
                            }
                            ?> >สิงหาคม</option>
                            <option value="September"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'September'){
                                    echo "selected";
                                }
                            }
                            ?> >กันายน</option>
                            <option value="October"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'October'){
                                    echo "selected";
                                }
                            }
                            ?> >ตุลาคม</option>
                            <option value="November"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'November'){
                                    echo "selected";
                                }
                            }
                            ?> >พฤศจิกายน</option>
                            <option value="December"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'December'){
                                    echo "selected";
                                }
                            }
                            ?> >ธันวาคม</option>
                        </select>

                        <!-- year  -->
                        <label for="year"> ปี </label>
                        <select name="year" id="year">
                            <option value="2020"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['year'] == '2020'){
                                    echo "selected";
                                }
                            }
                            ?>>2020</option>
                            <option value="2021"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['year'] == '2021'){
                                    echo "selected";
                                }
                            }
                            ?>>2021</option>
                            <option value="2022"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['year'] == '2022'){
                                    echo "selected";
                                }
                            }
                            ?>>2022</option>
                            <option value="2023"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['year'] == '2023'){
                                    echo "selected";
                                }
                            }
                            ?>>2023</option>
                            <option value="2024"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['year'] == '2024'){
                                    echo "selected";
                                }
                            }
                            ?>>2024</option>
                            <option value="2025"
                            <?php 
                             if (isset($_POST['month'])){
                                if($_POST['month'] == 'December'){
                                    echo "selected";
                                }
                            }
                            ?>>2025</option>
                        </select>

                        <br><br>

                        <button type="submit" name="subbill">ตกลง</button>
                    </form>

                    <br><br>
                    
                        
                    <thead>
                        <tr style="text-align: center" class="font-weight-bolder">
                            <th>ห้อง</th>
                            <th>สถานะ</th>
                            <th>Print</th>
                        </tr>
                    </thead>

                    <tbody>
                     <!-- <tr>
                         <td>555</td>
                         <td> <iframe src="billPrint.php?id=144" frameborder="0" name="iframe" ></iframe> </td>
                         <td> <a href="" onclick="window.print()" target="iframe">Print</a> </td>
                     </tr> -->

                        <?php
                        if (isset($_POST['subbill'])) {
                            $year = $_POST['year'];
                            $month = $_POST['month'];

                            $sqlBill = "SELECT ord.id as ord_id , ord.month , ord.year, ord.status , r.id , r.name
                            FROm orders AS ord left join rooms as r
                            ON ord.room_id = r.id 
                            WHERE ord.month = '$month' and ord.year = '$year'";
                            
                            //! OLD SQL 
                            // "SELECT r.id ,r.name , ord.status , ord.month , ord.year ,ord.id as ord_id
                            //             FROM rooms as r left join orders as ord
                            //             ON r.id = ord.room_id
                            //             WHERE ord.month = '$month' and year = '$year'";

                            $qrBill = mysqli_query($connection, $sqlBill);
                            while ($row = mysqli_fetch_assoc($qrBill)) {
                                        
                                echo "<tr style='text-align: center'>";
                                
                                echo "<td>" . $row['name'] . "</td>";
                                if ($row['status'] == 0) {
                                    $notpay = "<button class='btn btn-danger'>". "ยังไม่ชำระ"  ."</button>" ;
                                } else {
                                    $notpay = "<button class='btn btn-primary'>". "ชำระเงินแล้ว"  ."</button>" ; 
                                }
                                echo "<td>" .  $notpay . "</td>";
                                
                                echo "<td>" . '<a href="billPrint.php?id=' . $row['ord_id'] . '"  class="btn btn-success">' . "ชำระ" . '</a>' .
                                    '<iframe src="bprint.php?id=' . $row['ord_id'] . '" style="display:none;" name="frame'. $row['ord_id'] .'">' . '</iframe>' .
                                    '<button type="submit" class="btn btn-primary" onclick=' . "frames['frame".$row['ord_id']."'].print()" . '>' . "ปริ้นบิล" . '</button>' . "</td>";
                                // '<input type="button" class="btn btn-primary" onclick='."frames['frame'].print()".' value="ปริ้นบิล">';

                                // '<iframe src="billPrint.php?id=1"  name="test">'.'</iframe>'.
                                //         '<input type="button" class="btn btn-primary" onclick="frames["test"].print()" value="printletter">';



                                echo "</tr>";
                            }
                            
                        }

                        ?>

                        
                        <!-- <iframe src="billPrint.php?id=1" style="display:none;" name="frame"></iframe>
                        <input type="button" class="btn btn-primary" onclick="frames['frame'].print()" value="printletter"> -->


                        <!-- <tr>
                              '<iframe src="billPrint.php?id=' . $row['ord_id'] .'" style="display:none;" name="frame" >' ;
                            '<input type="button" onclick="frames['frame'].print()"  value="printletter">' ."ปุ่ม" ;
                            <td>1001</td>
                            <td>ยังไม่จ่าย</td>
                            <td><button type="submit" name="print" id="print" class="btn btn-success">ปริ้น</button></td>
                        </tr> -->
                    </tbody>
                    

                    
                </table>

                <!-- <div class="container">
                    <button style="float: right;" class="btn btn-primary">ปริ้นทั้งหมด</button>
                </div> -->

                
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