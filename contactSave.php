<?php
require_once './connect.php';
$connection = DB();


if (isset($_POST['insertCont'])) {

    $cus = $_POST['cus'];
    $building = $_POST['building'];
    $room = $_POST['room'];
    $con = $_POST['con'];
    $datebegin = $_POST['datebegin'];
    $dateend = $_POST['dateend'];
    $price = $_POST['price'];
    $earnest = $_POST['earnest'];
    $iduser = $_POST['iduser'];
    $status = $_POST['status'];
    $type = $_POST['type'];

    
    

    $sql1 = "INSERT into contracts(room_id,contract_no,create_date,end_date,price,earnest,status,type_id,customer_id,user_id,building_id) 
            VALUES ('$room','$con','$datebegin','$dateend','$price','$earnest','$status','$type','$cus','$iduser','$building')";

    $qr1 = mysqli_query($connection,$sql1);

    $sql2 = "UPDATE rooms SET customer_id = '$cus' WHERE rooms.id = '$room'";
            
    $qr2 = mysqli_query($connection,$sql2);


            if ($qr1 && $qr2){
                header('location: home.php');
            } else{
                echo 'something wrong check your code' . mysqli_errno($connection);
            }

    // echo $cus.'<br>'.$room ;
}


?>