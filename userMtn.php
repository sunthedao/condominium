<?php require_once './connect.php';
$connection = DB();
session_start();


$cusname = $_SESSION['name'];
$idcard = $_SESSION['idcard'];

// find id customer with cusname and IDcard
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


// find rooms's id with CusId
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

                <!-- <h1>บริการแจ้งซ่อมของคุณ <?= $_SESSION['name'] ?> </h1> -->

                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h2>แจ้งซ่อม</h2>
                    </div>

                    <div class="card-body">
                        <form action="repairSave.php" method="POST" id="UserForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="room">ห้อง</label>
                                    <select class="custom-select" name="sl" id="sl">
                                        <option value="test">
                                            <--- เลือกห้อง ---->
                                        </option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($qrR)) {
                                            echo "<option value=" . $row['id'] . ">" .
                                                $row['name'] .
                                                "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="room">วันที่แจ้งซ่อม</label>
                                    <input type="date" class="custom-select" name="datecall" required>
                                </div>

                                <div class="col-md-12 mt-4">

                                    <label for="room">รายละเอียด</label>
                                    <input type="text" class="custom-select col-xs-4" name="detail" required>
                                </div>

                                <div class="col-md-12 text-right mt-4">

                                    <button  id="userOK" name="userOK" class="btn btn-primary float-right" >OK</button>
                                </div>

                            </div>
                        </form>


                    </div>
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

<script>
    $(document).ready(function(){
        $("#UserForm").submit(function(){
            alert("ระบบทำการ Save เรียบร้อยครับ");
        })
    })
</script>

<?php
mysqli_close($connection);
?>

</html>