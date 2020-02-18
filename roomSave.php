<?php
require_once './connect.php';
$connection = DB();

// btn insertroom
if(isset($_POST['insertroom'])){
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $floor = $_POST['floor'];
    $size = $_POST['size'];
    $building_id = $_POST['building_id'];
    $customer_id = $_POST['customer_id'];
    $snmeter = $_POST['meter_serial'];
    $water_number = $_POST['water_number'];
    $water_price = $_POST['water_price'];


    $sql = "INSERT INTO rooms (name,detail,floor,size,building_id,customer_id,meter_serial,water_number,water_price) 
            VALUES ('$name','$detail','$floor','$size','$building_id','$customer_id','$snmeter','$water_number','$water_price')";

    $query = mysqli_query($connection,$sql);
    if ($query){
            echo '<script> alert ("Data saved");</script>';
            header('Location: room.php');
    } else {
        echo '<script> alert ("Something Wrong")</script>' . mysqli_error($connection);
    }
}

// if receive from ID = EDIT
if(isset($_POST["id"])){
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $floor = $_POST['floor'];
    $size = $_POST['size'];
    $building_id = $_POST['building_id'];
    $customer_id = $_POST['customer_id'];
    $snmeter = $_POST['meter_serial'];
    $water_number = $_POST['water_number'];
    $water_price = $_POST['water_price'];

    $sql = "UPDATE rooms SET name = '$name',
            detail = '$detail',
            floor = '$floor',
            size = '$size',
            building_id = '$building_id', 
            customer_id = '$customer_id',
            meter_serial = '$snmeter',
            water_number = '$water_number',
            water_price = '$water_price' 
            WHERE id ='$_POST[id]'";
    
    $query = mysqli_query($connection,$sql);

    if($query){
            echo '<script> alert ("Data Saved"); </script>';
            header('Location: room.php');
    
        } else {
            echo '<script> alert ("Data Not Saved") ;</script>' .mysqli_error($connection);
        }



    
}

?>

