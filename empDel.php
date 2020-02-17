<?php
require_once './connect.php';
$con = DB();

if (isset($_GET["id"])){
    $sql = "DELETE FROM users WHERE id='$_GET[id]'";
    $query = mysqli_query($con,$sql);

    if($query){
        header('location: emp.php');
    }else
    echo "Cant Delete your data  Please check ur Code " .mysqli_error($con);
}




?>
