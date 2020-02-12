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
    <div class="container-fluid">
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
    <div id="first" class="container-fluid">
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
                        <a href="">
                            <i class="fas fa-2x fa-clipboard"></i>
                            บันทึกค่าใช้จ่าย</a><br>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="">
                            <i class="fas fa-2x fa-tint"></i>
                            บันทึกค่าน้ำ</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="">
                        <i class="fas fa-2x fa-file-invoice"></i>
                        บิล</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="">
                        <i class="fas fa-2x fa-database"></i>
                        ข้อมูล</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="">
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


            <!-- 5 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-5">
                <h3 class="text-center">สัญญา</h3>
                <div class="container">
                    <table class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ห้อง</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>ห้องแรก</td>
                                <td>ว่าง</td>
                            </tr>
                            <tr>
                                <td>ห้องสอง</td>
                                <td>ก็ยังว่าง</td>
                            </tr>
                        </tbody>
                    </table>
                </div>              
            </div>

            <!-- ค้างชำระ -->
            <div class="mt-4 col-md-4">
                <h3 class="text-center">ห้องที่ค้างชำระ</h3>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                    <th>ห้องที่ยังไม่ได้ทำการชำระ</th>
                    <th>จำนวนเงิน</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ห้องแรก</td>
                            <td>5ล้าน</td>
                        </tr>
                        <tr>
                            <td>ห้องสอง</td>
                            <td>3ล้าน</td>
                        </tr>
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