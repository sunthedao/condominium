<?php require_once './connect.php';
$connection = DB();
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
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
                        <a href="">
                            <i class="fas fa-2x fa-users-cog"></i>
                            แอดมิน</a>
                    </div>


                </div>
            </div>


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9">
                <h1 class="text-center">บันทึกค่าน้ำ</h1>
                <br>

                
                <label for="building">ตึก</label>
                <select name="building" id="building">
                    <option value="">1</option>
                    <option value="">2</option>
                </select>

                <label for="floor">ชั้น</label>
                <select name="floor" id="floor">
                    <option value="">1</option>
                    <option value="">2</option>
                </select>

                <div style="float: right">
                <label for="month">ประจำเดือน</label>
                <select name="month" id="month">
                    <option value="">มกราคม</option>
                    <option value="">กุมภาพันธ์</option>
                    <option value="">มีนาคม</option>
                    <option value="">เมษา</option>
                    <option value="">พฤษภา</option>
                    <option value="">มิถุนา</option>
                    <option value="">กรกฏา</option>
                    <option value="">สิงหา</option>
                    <option value="">กันยา</option>
                    <option value="">ตุลา</option>
                    <option value="">พฤศจิกา</option>
                    <option value="">ธันวา</option>
                </select>
                </div>
                <br><br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr style="text-align: center">
                            <th>ห้อง</th>
                            <th>เลขมิตเตอร์เก่า</th>
                            <th>เลขมิตเตอร์ใหม่</th>
                            <th>จำนวน</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1001</td>
                            <td>100</td>
                            <td>150</td>
                            <td>(100-150)*12</td>
                        </tr>
                    </tbody>
                </table>
                <br><br>

                <div class="container">
                            <button style="float: right;" class="btn btn-success">บันทึก</button>
            
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