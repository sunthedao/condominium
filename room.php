<?php require_once './connect.php';
$connection = DB();
session_start();


if (isset($_GET['name'])) {
    //! define how many results you want per page
    $results_per_page = 10;

    $valueSearch = $_GET['name'];
    // !determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //! determine the sql LIMIT starting number for the results on the displaying page
    // page 1 10 results per page , LIMIT 0,10
    // page 2 10 results per page , LIMIT 10,10
    // page 3 10 results per page , LIMIT 20,10
    // starting_limit_number = (page1-1)*10
    $this_page_first_result = ($page - 1) * $results_per_page;

    //! find out the number of Searchresults rows in database
    //  $sql1 = "SELECT * FROM users";
    // $result = mysqli_query($connection, $sql);
    $sql1 = "SELECT * from rooms WHERE name LIKE '%$valueSearch%'";
    // . $this_page_first_result . ',' . $results_per_page;
    $SearchResult = mysqli_query($connection, $sql1);


    //! check how many rows with mysqli_num_rows
    $number_of_results = mysqli_num_rows($SearchResult);


    //! determine number of total pages available
    // number of page = result / 10;
    $number_of_pages = ceil($number_of_results / $results_per_page);

    $sql = "SELECT r.id ,r.name as room_name, r.floor as room_floor,r.meter_serial as room_meter, b.name as building_name , c.firstname as cus_name
            FROM rooms as r LEFT JOIN buildings as b
            ON r.building_id = b.id LEFT JOIN customers as c
            ON r.customer_id = c.id
            WHERE r.name LIKE '%$valueSearch%' ORDER BY id DESC LIMIT " . $this_page_first_result . ',' . $results_per_page;
    $result = mysqli_query($connection, $sql);
} else {
    // $sql = "SELECT * from users LIMIT 10";
    // $result = mysqli_query($connection, $sql);

    //! define how many results you want per page
    $results_per_page = 10;

    //! find out the number of results rows in database
    $sql1 = "SELECT * FROM rooms";
    $result = mysqli_query($connection, $sql1);
    //! check how many rows with mysqli_num_rows
    $number_of_results = mysqli_num_rows($result);

    //! determine number of total pages available
    // number of page = result / 10;
    $number_of_pages = ceil($number_of_results / $results_per_page);

    // !determine which page number visitor is currently on
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //! determine the sql LIMIT starting number for the results on the displaying page
    // page 1 10 results per page , LIMIT 0,10
    // page 2 10 results per page , LIMIT 10,10
    // page 3 10 results per page , LIMIT 20,10
    // starting_limit_number = (page1-1)*10
    $this_page_first_result = ($page - 1) * $results_per_page;
    // retrieve selected results from database and display them on page
    $sql = "SELECT r.id ,r.name as room_name, r.floor as room_floor,r.water_number as room_waternum, b.name as building_name , c.firstname as cus_name
            FROM rooms as r LEFT JOIN buildings as b
            ON r.building_id = b.id LEFT JOIN customers as c
            ON r.customer_id = c.id 
            ORDER BY r.id ASC LIMIT " . $this_page_first_result .  ',' . $results_per_page;
    // SELECT r.name as room_name, r.floor as room_floor , b.name as building_name , c.firstname as cus_name
    // FROM rooms as r LEFT JOIN buildings as b
    // ON r.building_id = b.id LEFT JOIN customers as c
    // on r.customer_id = c.id
    // ORDER BY r.id ASC LIMIT 0,10
    $result = mysqli_query($connection, $sql);
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
                            <li class="name"><span> ยินดีต้อนรับ <?=$_SESSION['name'] ?> </span></li>
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

                    <!-- มีเฉพาะหัวหน้าเท่านั้น -->
                    <div class="mt-4 col-md-6">
                        <a href="">
                            <i class="fas fa-2x fa-users-cog"></i>
                            แอดมิน</a>
                    </div>


                </div>
            </div>


            <!-- 9 ไว้แสดง Content -->
            <div id="md11" class="mt-4 col-md-9">
                <div class="row">

                    <!-- Search -->
                    <div class="col-md-6">
                        <div class="float-left">
                            <div class="col">
                                <form class="form-inline md-form form-sm active-cyan-2 mt-2" action="" method="GET">
                                    <input name="name" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search" <?php echo ((isset($_GET['name'])) ? 'value= ' . $_GET['name'] : '') . '' ?>>
                                    <!-- Eco แบบมีเงื่อนไข -->
                                    <i class="fas fa-search" aria-hidden="true"></i>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Icon ADD -->
                    <div class="col-md-6">
                        <div class="float-right">
                            <button type="button" class="btn btn-sm btn-light color-green" value="1">
                                <i class="fas fa-2x fa-plus" id="icon" data-toggle="modal" data-target="#myModal"></i>
                            </button>
                        </div>
                    </div>
                </div> <br>
                <h3 class="text-center">ข้อมูลห้อง</h3>
                <table class="table table-bordered table-striped" style="width: 100%">
                    <thead style="text-align: center" class="">
                        <tr>
                            <th style="font-size: 20px">ห้อง</th>
                            <th style="font-size: 20px">ชั้น</th>
                            <th style="font-size: 20px">อาคาร</th>
                            <th style="font-size: 20px">ชื่อลูกค้า</th>
                            <th style="font-size: 20px">เลข มิเตอร์น้ำ</th>
                            <th style="font-size: 20px">แก้ไขหรือลบ</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["room_name"] . "</td>";
                            echo "<td>" . $row["room_floor"] . "</td>";
                            echo "<td>" . $row["building_name"] . "</td>";
                            echo "<td>" . $row["cus_name"] . "</td>";
                            echo "<td>" . $row["room_waternum"] . "</td>";
                            echo "<td>" . '<a style="color:green;" href="roomEdit.php?id=' . $row["id"] . '"> แก้ไข </a>'
                                . '<a style="color:red;" onclick="deleteAlert(' . $row["id"] . ')"> ลบ </a>' . "</td>";
                            echo "</tr>";
                        }

                        ?>
                    </tbody>
                </table>




                <!-- pagination -->
                <div class="container">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">


                            <?php
                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                echo '<li class="page-item"><a class="page-link" href="room.php?page=' . $page .
                                    ((isset($_GET['name'])) ? "&name=" . $_GET['name'] : '') . '">'  .  $page   .  ' </a></li>  ';
                                //! &name ถ้าให้มันแสดงออกไป url (www.gdsf.com/id=12&name=)  ใส่double quote แต่ถ้าให้มันแสดงเป็น Code ใส่ Single quote '<li>'

                            }

                            ?>


                        </ul>
                    </nav>
                </div>

            </div>



        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">เพิ่มห้อง</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="roomSave.php" method="POST" name="save" class="MyForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">เลขห้อง</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">รายละเอียดห้อง</label>
                            <input type="text" class="form-control" id="detail" name="detail">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ชั้น</label>
                            <input type="text" class="form-control" id="floor" name="floor">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">ขนาดห้อง</label>
                            <input type="text" class="form-control" id="size" name="size">
                        </div>
                        <div class="form-group">
                            <php $sql="SELECT name FROM buildings" ; ?>
                                <label for="exampleFormControlTextarea1"> รหัสตึก </label>
                                <input type="text" class="form-control" id="building_id" name="building_id" value="1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> รหัสลูกค้า </label>
                            <input type="number" class="form-control" id="customer_id" name="customer_id">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> เลขมิเตอร์น้ำ </label>
                            <input type="text" class="form-control" id="water_number" name="water_number" value="0">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> ค่าน้ำมาตรฐาน </label>
                            <input type="text" class="form-control" id="water_price" name="water_price" value="12">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-success" name="insertroom" value="submit">เพิ่มข้อมูลห้องพัก</button>
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
    function deleteAlert(id) {
        if (confirm('Are you sure to delete ?')) {
            window.location.href = 'roomDel.php?id=' + id;
        }

        return false;
    }
</script>


<?php
mysqli_close($connection);
?>

</html>