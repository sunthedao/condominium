<?php
require_once './connect.php';
$connection = DB();

// btn insertbuild
if(isset($_POST['insertbuild'])){
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $address = $_POST['address'];
    $amphur = $_POST['amphur'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $juris = $_POST['juris'];
    $dayof = $_POST['dayof'];
    $fine = $_POST['fine'];

    $sql = "INSERT INTO buildings (name,detail,address,amphur,district,province,postcode,phone,juristic_id,day_of_fine,fine) 
            VALUES ('$name','$detail','$address','$amphur','$district','$province','$postcode','$phone','$juris','$dayof','$fine')";

    $query = mysqli_query($connection,$sql);
    if ($query){
            echo '<script> alert ("Data saved");</script>';
            header('Location: building.php');
    } else {
        echo '<script> alert ("Something Wrong")</script>' . mysqli_error($connection);
    }
}

// if receive from ID = EDIT
if(isset($_POST["id"])){
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $address = $_POST['address'];
    $amphur = $_POST['amphur'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $postcode = $_POST['postcode'];
    $phone = $_POST['phone'];
    $juris = $_POST['juris'];
    $dayof = $_POST['dayof'];
    $fine = $_POST['fine'];

    $sql = "UPDATE buildings SET name = '$name',
            detail = '$detail',
            address = '$address',
            amphur = '$amphur',
            district = '$district', 
            province = '$province',
            postcode = '$postcode',
            phone = '$phone',
            juristic_id = '$juris' ,
            day_of_fine = '$dayof',
            fine = '$fine'
            WHERE id ='$_POST[id]'";
    
    $query = mysqli_query($connection,$sql);

    if($query){
            echo '<script> alert ("Data Saved"); </script>';
            header('Location: building.php');
    
        } else {
            echo '<script> alert ("Data Not Saved") ;</script>' .mysqli_error($connection);
        }



    
}

?>

