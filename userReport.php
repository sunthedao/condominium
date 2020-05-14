<?php require_once './connect.php';
$connection = DB();
session_start();

$cusname = $_SESSION['name'];
$idcard = $_SESSION['idcard'];

$sql = "SELECT id from customers WHERE firstname = '$cusname' and idcard = '$idcard'";
$qr = mysqli_query($connection, $sql);

if ($qr) {
    if (mysqli_num_rows($qr) > 0) {
        while ($row = mysqli_fetch_assoc($qr)) {
            $CusId = $row['id'];
        }
    }
} else {
    echo "NO " . mysqli_error($connection);
}

$sqlR = "SELECT id , name from rooms WHERE customer_id = '$CusId'";
$qrR = mysqli_query($connection, $sqlR);



// echo 
// $sqlR = "SELECT id , name FROM rooms WHERE customer_id = 0 Order by id";
// $qrR = mysqli_query($connection, $sqlR);
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
    <!-- header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Mollis Condo</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="user.php">Home</a></li>
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

                    <div class="mt-4 col-md-6">
                        <a href="userReport.php">
                            <i class="far fa-2x fa-sticky-note"></i>
                            รายงาน</a>
                    </div>

                    <div class="mt-4 col-md-6">
                        <a href="userMtn.php">
                            <i class="fas fa-2x fa-tools"></i>
                            แจ้งซ่อม</a>
                    </div>


                </div>
            </div>


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9" style="text-align: center">

                <h1>รายงานของคุณ <?= $_SESSION['name'] ?> </h1>




                <form action="/condominium/api/userapi.php" method="POST" class="UserRp">
                    <div class="card">
                        <div class="card-header">
                            <h4>กรุณาเลือกปี สำหรับดูค่าใช้จ่าย</h4>

                            <div class="container text-left">
                                <input type="hidden" id="Cusid" name="Cusid" value="<?= $CusId ?>">
                                <input type="hidden" id="Od" name="Od" value="CallOd">
                                <?php
                                //   sqlselect room

                                echo "<label for='room'>" . "ห้อง" . "</label>";
                                echo "<select class='ml-2' name='room' id='room'>";
                                if (mysqli_num_rows($qrR) > 0) {
                                    while ($row = mysqli_fetch_assoc($qrR)) {

                                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                    }
                                    echo "</select>";
                                }





                                ?>

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
                                    <option value="October">ตุลาคม</option>
                                    <option value="November">พฤศจิกายน</option>
                                    <option value="December">ธันวาคม</option>
                                </select>


                                <label class="ml-2" for="year">ปี</label>
                                <select class="ml-2" name="year" id="year">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                </select>

                                <button class="btn btn-primary ml-2" type="submit" id="sb" name="sb"> ตกลง </button>
                                <!-- <input type="submit"  class="btn btn-primary"name="submit" id="submit"> -->
                            </div>

                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>เดือน</th>
                                        <th>ค่าใช้จ่าย</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>

                            </table>
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
<script>
    $(document).ready(function() {
        $(".UserRp").change(function() {
            let t1 = $("#room").val();
            let t2 = $("#year").val();
            let t3 = $("#month").val();
            let t4 = $("#Cusid").val();
            let t5 = $("#Od").val();



            // console.log(t1 , t2 , t3 ,t4);


        })

        $(".UserRp").submit(function(e) {
            e.preventDefault();
            // let t = ((Math.random()*100)+1);
            // console.log(t);
            let rid = $("#room").val();
            let year = $("#year").val();
            let Cid = $("#Cusid").val();
            let CallOr = $("#Od").val();
            let month = $("#month").val();

            console.log(CallOr);


            $.ajax({
                url: '/condominium/api/userapi.php',
                method: 'POST',
                data: {
                    roomid: rid,
                    month: month,
                    year: year,
                    CustomerId: Cid,
                    Action: CallOr
                },
                success: (res) => {

                }
            })



        })


    })
</script>


<?php
mysqli_close($connection);
?>

</html>