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
                <h3 class="text-center">ค่าใช้จ่าย</h3>
                <div class="form-group">
                    <label for="room"></label>
                    <select class="form-control" id="room">
                        <option>ห้อง 1001</option>
                        <option>ห้อง 1002</option>
                        <option>ห้อง 1003</option>
                        <option>ห้อง 1004</option>
                    </select>
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
                                <tr style="text-align: center">
                                    <td style="font-size: 20px">ห้อง 1001</td>
                                    <td style="font-size: 20px">ค่าเช่า</td>
                                    <td style="font-size: 20px">1</td>
                                    <td style="font-size: 20px">8000</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <br>
                        
                        <div class="container">
                            <button style="float: right;" class="btn btn-danger">ลบ</button>
                            <button style="float: right;" class="btn btn-wanring">แก้ไข</button>
                            <button style="float: right;" class="btn btn-primary">เพิ่ม</button>
                        </div>


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
                <form action="" method="" id="forservice">
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
                                    <td><select class="form-control" name="type" id="type">
                                            <option value="">ค่ามัดจำ</option>
                                            <option value="">ค่าซ่อมบำรุง</option>
                                            <option value="">ล้างรถ</option>
                                        </select></td>
                                    <td><input type="number" name="unit" id="unit"></td>
                                    <td><input type="number" name="price" id="price"></td>
                                </tr>
                            </tbody>
                        </table>



                    </div>
                </form>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="submit" value="submit" class="btn btn-primary">เพิ่ม</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>

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