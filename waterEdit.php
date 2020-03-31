<?php require_once './connect.php';
$connection = DB();





?>

<!DOCTYPE html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

<!-- css -->
<link rel="stylesheet" href="style.css">

<!-- awesome Font -->
<script src="https://kit.fontawesome.com/c1e251547b.js" crossorigin="anonymous"></script>

<!-- pdf -->
<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Water</title>
    <style>
        h1 {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>แก้ไขค่าน้ำ</h1>
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div style="float: left">
                        <label for="month"> เลือกเดือนและปี ที่จะทำการแก้ไข </label>
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
                    </div>
                    <div style="float: center">
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
                    <div>
                        <button type="submit" name="OKAY" id="OKAY" class="btn btn-primary">ตกลง</button>
                    </div>
    </form>
    </div>
    </div>
    </div>

    <form action="waterS.php" method="POST">
        <input type="hidden" id="month1" name="month1" value="<?= $month ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center">
                                <th>ห้อง</th>
                                <th>เลขมิเตอร์ใหม่</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            if (isset($_POST['OKAY'])) {
                                $month = $_POST['month'];
                                $year = $_POST['year'];

                                $editsql = "SELECT r.name , mtl.meter_current,mtl.id as mtl_id , mld.id as mld_id,mld.old_number , mld.new_number , mld.month , mld.year 
                                FROM rooms as r left join meter_logs as mtl 
                                ON r.meter_logs_id = mtl.id left join meter_log_details as mld 
                                ON mtl.id = mld.meter_log_id 
                                WHERE r.customer_id != 0 and mld.month = '$month' and mld.year = '$year'";

                                // echo "ssdsfsd";
                                $qredit = mysqli_query($connection, $editsql);

                                while ($row = mysqli_fetch_assoc($qredit)){
                                    echo "<tr style='text-align: center'>";
                                    echo "<input type='hidden' name='mc[]' id='mc' value='".$row['mtl_id'] ."'>";
                                    echo "<input type='hidden' name='mld[]' id='mld' value='".$row['mld_id'] ."'>";
                                    echo "<td>".'<input type="number" name="rname" id="rname" value="'. $row['name'] .'" readonly>'."</td>";
                                    echo "<td>".'<input type="number" name="cnumber[]" id="cnumber" value="'. $row['meter_current'] .'">'."</td>"; 
                                    echo "</tr>";
                                    
                                }
                            }
                            ?>
                           
                        </tbody>
                    
                    </table>
                    <button type="submit" name="Editsave" id="Editsave" style="float: right" class="btn btn-success">ตกลง</button>
                </div>
            </div>
        </div>
    </form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>