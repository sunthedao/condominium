<?php
require_once './connect.php' ;
$connection = DB();


if (isset($_POST['OK'])) {
    $datecall = (isset($_POST['datecall']) ? $_POST['datecall'] : '');
    $Idrooms = (isset($_POST['sl']) ? $_POST['sl'] : '');
    $dt = (isset($_POST['detail']) ? $_POST['detail'] : '');

    $month = strftime('%B',strtotime($datecall));
    $year  = strftime('%Y',strtotime($datecall));


    $sql = "INSERT INTO repair (service_id , room_id , detail , date_call , month , year) VALUES ('5','$Idrooms' ,'$dt','$datecall','$month','$year')";
    $qr  = mysqli_query($connection, $sql);



    if($qr){
        header('location: repair.php');
    }
}


if(isset($_POST['mtn'])){

    $Rid = $_POST['sl2'];
    $d = $_POST['datedone'];
    $price = $_POST['price'];

    $month = strftime('%B',strtotime($d));
    $year  = strftime('%Y',strtotime($d));


    // update date_done and price to repair
    $UpdateRP = "UPDATE repair SET
                 date_do = '$d' , 
                 price = '$price' 
                 WHERE repair.room_id = '$Rid'";
    $qrinsert = mysqli_query($connection,$UpdateRP);


    // echo $Rid . " " . $d . " " . $price  . "<br>" .$month . " " .$year .'<br>';

    // ----- SELECT id from order user id room and month and year to selec
    $sqlForder = "SELECT id from orders as od 
                WHERE od.room_id ='$Rid' and od.month = '$month' and od.year = '$year'";
    
    $qrForder = mysqli_query($connection, $sqlForder);

    $row = mysqli_fetch_assoc($qrForder);

    $order_id = $row['id'];
    // ------ OK done we get order ID

    // insert to order_details with order_id
    $orderdt = "INSERT INTO order_details (service_id , amount , price , total , order_id) 
                VALUES ('5' , '1' , '$price' , '$price' , '$order_id')";

    $qroddt = mysqli_query($connection , $orderdt);

    if ($qroddt){
        
        header('location: repair.php');
    } else {
        echo "Error " . mysqli_error($connection);
    }

    // echo $order_id;

}
