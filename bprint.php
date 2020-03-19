<?php require_once './connect.php';
$connection = DB();
session_start();

// $sqlR = "SELECT id , name FROM rooms WHERE customer_id = 0 Order by id";
// $qrR = mysqli_query($connection, $sqlR);




if (isset($_GET['id'])) {
    $ord_id = $_GET['id'];
    // echo $ord_id;
    // ค่าห้อง บลา บลา
    $sqlord = "SELECT ord.id,ord.month, ord.year, r.name as room_name ,ordt.amount ,ordt.unit  , ordt.price , sv.name as sv_name
    FROm orders as ord left join order_details as ordt
    ON ord.id = ordt.order_id left JOIN services as sv
    ON ordt.service_id = sv.id left join meter_log_details as mld
    ON ord.meterlog_details_id = mld.meter_log_id left join rooms as r
    ON ord.room_id = r.id
    WHERE ord.id = '$ord_id'";

    $qrord = mysqli_query($connection, $sqlord);


    $sqtest ="SELECT ord.id,ord.month, ord.year, r.name as room_name
    FROm orders as ord left join rooms as r
    ON ord.room_id = r.id
    WHERE ord.id = '$ord_id'";

    $qrtest = mysqli_query($connection,$sqtest);

    $row1 = mysqli_fetch_assoc($qrtest);
    $test1 = $row1['room_name'];
    $rname = $row1['room_name'];
    $month = $row1['month'];
    $year = $row1['year'];


    //  ค่าน้ำ
    $sqlwater = "SELECT mld.old_number , mld.new_number , mld.price_water , ods.id as order_id , ods.room_id 
   FROM meter_log_details as mld left join orders as ods 
   ON mld.meter_log_id = ods.meterlog_details_id
   WHERE ods.id = '$ord_id'";
    $qrwater = mysqli_query($connection, $sqlwater);
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

    <!-- pdf -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            margin: auto;
        }
    </style>

    <title><?= "บิลห้อง" . $row1['room_name'] . ' / ' . $row1['month'] . ' / ' . $row1['year'] ?></title>

    <h2 class="mt-4" align="center"> บิลห้อง <?=$test1?> </h2>
    
</head>

<body>
    <div class="container">
    
        <div class="row">
        
            <div class="mt-4 col-md-12">
                <table class="table table-bordered table-striped" style="width: 100%">
                
                    <thead>
                        <tr>
                            <th>รายการ</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>รวม</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php while ($row = mysqli_fetch_assoc($qrord)) {
                            echo    "<tr>";
                            echo   "<td>" . $row['sv_name']  .   "</td>";
                            echo    "<td>" . $row['amount']  .   "</td>";
                            echo    "<td>" . number_format($row['price'])  .   "</td>";
                            echo    "<td>" . number_format($row['price'])  .   "</td>";
                            echo    "</tr>";

                            // $b[] = $row['price'];
                            $a[] = $row['price'];
                        }
                        // print_r($a);

                        ?>
                        
                        <?php
                        while ($row = mysqli_fetch_assoc($qrwater)) {
                            $oldnum = $row['old_number'];
                            $newnum = $row['new_number'];
                            $total = $newnum - $oldnum;
                            echo "<tr>";
                            echo   "<td>" . "ค่าน้ำ"  .   "</td>";
                            echo    "<td>" . $total .   "</td>";
                            echo    "<td>" . "12"  .   "</td>";
                            echo    "<td>" . $row['price_water']  .   "</td>";
                            echo    "</tr>";
                            $a[] = $row['price_water'];
                        }
                        // print_r($a);
                        // $result = $a + $b;
                        $c = array_sum($a);
                        // printf($c);
                        // echo number_format($c);
                        ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td>รวม</td>
                            <td><?= number_format($c) ?></td>
                        </tr>
                    </tbody>

                </table>
                <?php
                //  <!-- take contents to html value -->
                // $html = ob_get_contents();
                // // take html to pdf with Write html function
                // $mpdf->WriteHTML($html);
                // // Output
                // $mpdf->Output("bill $rname$month$year.pdf");
                // ob_end_flush();
                // <title><?= "บิลห้อง" . $row1['room_name'] . ' / ' . $row1['month'] . ' / ' . $row1['year']
                ?>
                <!-- '<a href="billPrint.php?id=' . $row['ord_id'] .'" class="btn btn-success">' -->
                <!-- <button id="btbill" style="float: right"class="btn btn-primary" onclick="printbill()">พิมพ์ใบเสร็จ</button>
                <!-- <a  href="bill <?=$rname.$month.$year ?>.pdf" </a> -->
                <!-- <a id="bhome" style="float: right" href="home.php" class="btn btn-primary">กลับหน้าหลัก</a> -->
                <!-- <a id="bbill" style="float: right" href="bill.php" class="btn btn-success">กลับไปหน้าบิล</a> --> 

            </div>
        </div>
    </div>












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>




<!--  -->

</html>


<script>
    function printbill() {

        var btbill = document.getElementById("btbill");
        var bhome = document.getElementById("bhome");
        var bbill = document.getElementById("bbill");

        btbill.style.visibility = 'hidden';
        bhome.style.visibility = 'hidden';
        bbill.style.visibility = 'hidden';

        window.print();

        btbill.style.visibility = 'visible';
        bhome.style.visibility = 'visible';
        bbill.style.visibility = 'visible';


    }

            


   

</script>