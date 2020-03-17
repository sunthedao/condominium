<?php
require_once './connect.php';
$connection = DB();


if (isset($_POST['insertCont'])) {
    // $month = $_POST['month'];
    // $year = $_POST['year'];
    $cus = $_POST['cus'];
    $building = $_POST['building'];
    $room = $_POST['room'];
    $con = $_POST['con'];
    $datebegin = $_POST['datebegin'];
    $dateend = $_POST['dateend'];
    $price = $_POST['price'];
    $earnest = $_POST['earnest'];
    $iduser = $_POST['iduser'];
    $user = $_POST['user'];
    $status = $_POST['status'];
    $type = $_POST['type'];

    $total = $price + $earnest;


// echo $price . ' '. $earnest;
    // insert to Contract
    $sql1 = "INSERT into contracts(room_id,contract_no,create_date,end_date,price,earnest,status,type_id,customer_id,user_id,building_id) 
            VALUES ('$room','$con','$datebegin','$dateend','$price','$earnest','$status','$type','$cus','$iduser','$building')";
    $qr1 = mysqli_query($connection, $sql1);

    // Update who live in room by id
    $sql2 = "UPDATE rooms SET customer_id = '$cus' WHERE rooms.id = '$room'";
    $qr2 = mysqli_query($connection, $sql2);

    // Create bill with year and room
    $t1 = date('Y-m-d');
    $sqlorder = "INSERT into orders(room_id , customer_id , total_price ,order_date,juristic_id,user_id,status)
                VALUES ('$room','$cus','$total','$t1','1','$iduser','0')";
    $qrorder = mysqli_query($connection, $sqlorder);

    if ($qrorder) {
        $last_id = mysqli_insert_id($connection);

        // echo $last_id;
        // insert price  service_id 1 = rent
        $sqlod1 = "INSERT into order_details (service_id , amount , unit , price , total , order_id) 
        VALUES ('1','1','เดือน','$price','$price','$last_id')";
        $qrodprice1 = mysqli_query($connection, $sqlod1);

        // insert earnest service_id 4 = earnest
        $sqlod2 = "INSERT into order_details (service_id , amount , unit , price , total , order_id) 
        VALUES ('4','1','-','$earnest','$earnest','$last_id')";
        $qrearnest = mysqli_query($connection, $sqlod2);

        // if($qrodprice1 && $qrearnest){
        //     echo "done";
        // } else{
        //     echo "something wrong " . mysqli_errno($connection);
        // }
    }
    // echo $room. ' ' .$cus. ' ' .$total. ' ' .$t1. ' ' .'1'. ' ' .$iduser. ' ' .'0'. ' ' .$month. ' ' .$year;  




}

// customer info
$sqlcus = "SELECT firstname , lastname, amphur , district , province from customers
            WHERE customers.id = '$cus'";
$qrcus = mysqli_query($connection, $sqlcus);
$row = mysqli_fetch_assoc($qrcus);
$amp = $row['amphur'];
$dis = $row['district'];
$provice = $row['province'];
$cfirstname = $row['firstname'];
$clastname = $row['lastname'];

// Juristic info
$sqlJuris = "SELECT name , address , amphur , district , province from juristics WHERE id ='1'";
$qrJuris = mysqli_query($connection, $sqlJuris);
$rowJu = mysqli_fetch_assoc($qrJuris);
$Jname = $rowJu['name'];
$Jad = $rowJu['address'];
$Jam = $rowJu['address'];
$Jdis = $rowJu['district'];
$Jprovice = $rowJu['province'];

// building info
$sqlBuilding = "SELECT address , amphur , district , province from buildings WHERE id ='1'";
$qrBuilding = mysqli_query($connection, $sqlBuilding);
$rowB = mysqli_fetch_assoc($qrBuilding);
$Bad = $rowB['address'];
$Bamp = $rowB['amphur'];
$Bdis = $rowB['district'];
$Bpro = $rowB['province'];

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
            size: 7in 9.25in;
            margin: 27mm 16mm 27mm 16mm;
        }

        div{
            margin-left: 370px;
        }

        /* @media print{    
           #bhome{
               display: none;
           }
        } */
    </style>

    <title> </title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">หนังสือเช่าห้องชุด</h1> <br>
        <p>หนังสือสัญญาเช่าฉบับนี้ ทำที่เมื่อวันที่ <?= $datebegin ?> ทำขึ้นระหว่าง <b> <?= $clastname . ' ' . $clastname ?> แขวง/เขต <?= $dis  ?>
                อำเภอ <?= $amp ?> จังหวัด <?= $provice ?> </b> ซึ่งต่อไปในสัญญาฉบับนี้เรียกว่า "ผู้เช่า" ฝ่ายหนึ่งกับ <b><?= $Jname ?>
                อยู่บ้านเลขที่ <?= $Jad ?> ตำบล <?= $Jdis ?> อำเภอ <?= $Jam ?> จังหวัด <?= $Jprovice ?> </b>ซึ่งต่อไปในสัญญาฉบับนี้เรียกว่า
            "ผู้ให้เช่าอีกฝ่ายหนึ่ง" ทั้งสองฝ่ายตกลงกันมีข้อความดังต่อไปนี้
        </p>

        <p>
            ข้อ 1.ผู้เช่าตกลงเช่าและผู้ให้เช่าตกลงให้เช่าห้องชุด <?= $Bad ?> แขวง/ตำบล <?= $Bdis ?> เขต/อำเภอ <?= $Bamp  ?>
            จังหวัด <?= $Bpro ?> จำนวน ๑ ห้อง ในวันที่ทำสัญญาฉบับนี้เป็นต้นไป ในราคาค่าเช่าเดือนละ <?= $price ?> บาท
        </p>

        <p>
            ข้อ 2.ผู้เช่าตกลงจ่ายค่าเช่าล่วงหน้าในวันทำสัญญา เป็นจำนวนเงิน <?= $price ?> บาท
        </p>
        <p>
            ข้อ 3.ผู้เช่าตกลงชำระค่าเช่า ทุก ๆ วันที่ 1 ของเดือน เริ่มตั้งแต่เดือนที่ตกลงทำสัญญาเช่าฉบับนี้เป็นต้นไป โดยผู้เช่าตกลงเช่ามีกำหนด
            1 ปี หากครบกำหนดดังกล่าว ผู้เช่ามีสิทธิจะเช่าต่อไปในอัตราค่าเช่าเดิมก็ได้ โดยแจ้งล่วงหน้าให้ผู้เช่าทราบไม่น้อยกว่า 30 วัน
        </p>
        <p>
            ข้อ 4.ผู้ให้เช่าตกลงให้ผู้เช่าใช้สอยทรัพย์สินทุกชนิดที่อยู่ในห้องเช่าและตามรายการทรัพย์สินที่แนบท้ายสัญญา โดยผู้เช่าจะดูแลรักษาเสมือน
            ว่าเป็นทรัพย์สินของตน หากชำรุดบกพร่องใด ๆ ผู้เช่าจะต้องซ่อมแซมให้คงเดิมอยู่เสมอ
        </p>
        <p>
            ข้อ 5.ผู้เช่าตกลงที่จะดูแลรักษาห้องที่เช่าโดยให้คงสภาพดีดังเดิมทุกประการ และยินยอมให้ผู้ให้เช่า หรือผู้ที่จะได้รับมอบหมายเข้ามาในห้องที่เช่า
            ได้ตลอดเวลา เพื่อตรวจดูสภาพห้องที่เช่าได้ทุกเวลา โดยผู้เช่าให้สัญญาว่าจะไม่นำสิ่งผิดกฏหมายเข้ามาในห้องที่เช่า หากผู้ให้เช่าพบหรือบุคคลอื่น
            พบสิ่งผิดกฏหมาย ผู้เช่ายอมให้ผู้ให้เช่าบอกเลิกสัญญาเช่าได้ทันที
        </p>
        <p>
            ข้อ 6.การเช่าตามข้อ 1 ให้รวมถึงอุปกรณ์ หรือทรัพย์สินต่าง ๆ ที่อยู่ในห้องเช่าและ รายการทรัพย์สินตามรายการแนบท้ายหนังสือสัญญเช่านี้
        </p>
        <p>
            ข้อ 7.ผู้เช่าตกลงที่จะเช่าเพื่อเป็นที่พักอาศัยเท่านั้น และให้สัญญาว่าจะไม่นำห้องที่เช่าออกให้ผู้อื่นเช่าช่วง เว้นแต่จะได้รับความยินยอมเป็นหนังสือจาก
            ผู้ให้เช่า
        </p>
        <p>
            ข้อ 8.หากผู้เช่าผิดสัญญาข้อหนึ่งข้อใด ยอมให้ผู้ให้เช่าบอกเลิกสัญญาเช่าได้ทันที และยอมชดใช้ค่าเสียหาย ค่าขาดประโยชน์ตามความสมและตามสมควร
            เท่าที่ผู้ให้เช่าจะเสียหาย
        </p>
        <p>
            ข้อ 9.หากสัญญาเช่าสิ้นสุดลง โดยไม่มีการต่อสัญญาเช่า หรือผู้ให้เช่าบอกเลิกสัญญาเช่าตามข้อ 8 ดังกล่าว ผู้เช่ายอมขนย้ายทรัพย์สินและ
            บริวารออกไปจากห้องที่เช่าทันทีโดยค่าใช้จ่ายของผู้เช่าเอง
        </p>
        <p>
            ข้อ 10.ผู้เช่าสัญญาว่าจะปฏิบัติตามระเบียบข้อบังคับของอาคารโดยถือเป็นส่วนหนึ่งแห่งสัญญาเช่านี้ด้วย หากผู้เช่าไม่ปฏิบัติตาม หรือละเมิดข้อบังคับดังกล่าว
            ผู้เช่ายินดีให้ถือว่าสัญญานี้เป็นอันยกเลิกต่อกัน และยินยอมมอบการครอบครองห้องเช่าคืนแก่ผู้ให้เช่าทันที
        </p>
        <p>
            คู่สัญญาทั้งสองฝ่ายได้อ่านข้อความดังกล่าวแล้ว ตกลงที่จะทำสัญญาฉบับนี้ จึงลงลายมือชื่อไว้เป็นสำคัญ
        </p>
        <br>


        <div class="test">
            <div class="row">
                <div class="col-md-4">
                    <p>
                        ลงชื่อ........................ผู้เช่า
                        <br><br>
                        &nbsp; &nbsp;&nbsp; &nbsp;(<?= $cfirstname ?> <?= $clastname ?>)

                    </p>
                </div>
            </div>
        </div>



        <div class="test">
            <div class="row">
                <div class="col-md-4">
                    <p>
                        ลงชื่อ........................ผู้ให้เช่า
                        <br>
                        &nbsp; &nbsp;&nbsp; &nbsp;(<?= $Jname ?>)
                    </p>
                </div>
            </div>
        </div>

        <div class="test">
            <div class="row">
                <div class="col-md-4">
                    <p>
                        ลงชื่อ........................พยาน
                        <br>
                        &nbsp; &nbsp;&nbsp; &nbsp;(.............................)
                    </p>
                </div>
            </div>
        </div>


        <div class="test">
            <div class="row">
                <div class="col-md-4">

                    <p>
                        ลงชื่อ........................พยาน
                        <br>
                        &nbsp; &nbsp;&nbsp; &nbsp;(.............................)
                    </p>
                </div>
            </div>
        </div>

        <a id="bhome" style="float: right" href="home.php" class="btn btn-primary">กลับหน้าหลัก</a>
        <button id="print" style="float: right" href="" onclick="printpage()" class="btn btn-success" > ปริ้นใบสัญญา</button>
        <form action="billPrint.php?id=<?= $last_id ?>" method="POST">
            <button type="submit" style="float: right" id="test" name="test" class="btn btn-success" >ปริ้นบิล</button>
        </form>
    </div>




    </div>













    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>



<script>
    function printpage() {
        // get id  and put it into a varaible
        var bhom = document.getElementById("bhome");
        var bprint = document.getElementById("print");
        var pbill = document.getElementById("test");

        // set them to visibility to hidden
        bhom.style.visibility = 'hidden'
        bprint.style.visibility = 'hidden'
        pbill.style.visibility = 'hidden'

        window.print();

        bhom.style.visibility = 'visible';
        bprint.style.visibility = 'visible';
        pbill.style.visibility = 'visible';

    }
</script>

</html>