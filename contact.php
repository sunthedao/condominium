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
                            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
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
                <h3 class="text-center">สัญญา</h3>
                <div class="container">
                    <form action="" method="">
                        <div class="form-group">
                            <a href="customer.php" class="btn btn-success" title="กรณีที่ยังไม่มีข้อมูลของลูกค้า">กรอกข้อมูลลูกค้า</a><br>
                            <label for="cus" class="btn btn-primary">ลูกค้า</label>
                            <select class="form-control" name="cus" id="cus">
                                <option value="">ลูกค้าคนที่ 1</option>
                                <option value="">ลูกค้าคนที่ 2</option>
                                <option value="">ลูกค้าคนที่ 3</option>
                                <option value="">ลูกค้าคนที่ 4</option>
                            </select> <br>

                            <label for="buiding" class="btn btn-primary">ตึก</label>
                            <select class="form-control" id="buiding">
                                <option>ตึก 1</option>
                                <option>ตึก 2</option>
                            </select>  <br>

                            <label for="room" class="btn btn-primary">ห้อง</label>
                            <select class="form-control" id="room">
                                <option>ห้อง 1001</option>
                                <option>ห้อง 1002</option>
                                <option>ห้อง 1003</option>
                                <option>ห้อง 1004</option>
                            </select>  <br>

                            <label for="con" class="btn btn-primary">เลขที่สัญญา</label>
                            <input type="number" name="con" id="con"> <br> <br>
                            
                            <label for="datebegin" class="btn btn-primary">วันที่สัญญา</label>
                            <input type="date" name="datebegin" id="datebegin">

                            <label for="dateend" class="btn btn-primary">วันที่สิ้นสุดสัญญา</label>
                            <input type="date" name="dateend" id="dateend"> <br><br>

                            <label for="price" class="btn btn-primary">ราคาห้อง</label>
                            <input type="number" size="100" min="0" max="1000000" step="1" name="price" id="price" required="required"> <br><br>

                            <label for="earnest" class="btn btn-primary">ค่ามัดจำ</label>
                            <input type="number" min="0" max="1000000" step="1" name="earnest" id="earnest" required="required"> <br><br>

                            <label for="status" class="btn btn-primary">สถานะ</label>
                            <select class="form-control" name="status" id="status">
                                <option value="">รออนุมัติ</option>
                                <option value="">ยกเลิก</option>
                            </select>

                            <label for="type" class="btn btn-primary">ประเภท</label>
                            <select class="form-control" name="type" id="type">
                                <option value="">เช่า</option>
                                <option value="">ซื้อ</option>
                            </select>

                            <label for="user" class="btn btn-primary">พนักงาน</label>
                            <select class="form-control" name="user" id="user">
                                <option value="">พนักงานคนแรก</option>
                                <option value="">พนักงานคนที่สอง</option>
                            </select>

                            <br><br><br>

                            <a href="" class="btn btn-success" style="float: right;">ยืนยัน</a>



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