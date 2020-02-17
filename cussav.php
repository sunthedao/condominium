<?php
require_once './connect.php';
$connection = DB();
// btn savecus from contact page
if(isset($_POST['savecus'])){
    $Firstname = $_POST['firstname'];
    $Lastname = $_POST['lastname'];
    $Address = $_POST['address'];
    $amphur = $_POST['amphur'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $Postcode = $_POST['postcode'];
    $Phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $idcardno = $_POST['idcardno'];
    


    $sql = "INSERT INTO customers (firstname,lastname,address,amphur,district,province,postcode,phone,birthdate,idcard) 
            VALUES ('$Firstname','$Lastname','$Address','$amphur','$district','$province','$Postcode','$Phone','$birthdate','$idcardno')";

    $query = mysqli_query($connection,$sql);
    if ($query){
            echo '<script> alert ("Data saved");</script>';
            header('Location: contact.php');
    } else {
        echo '<script> alert ("Something Wrong")</script>' . mysqli_error($connection);
    }
}

// btn insertcus
if(isset($_POST['insertcus'])){
    $Firstname = $_POST['firstname'];
    $Lastname = $_POST['lastname'];
    $Address = $_POST['address'];
    $amphur = $_POST['amphur'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $Postcode = $_POST['postcode'];
    $Phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $idcardno = $_POST['idcardno'];
    
    


    $sql = "INSERT INTO customers (firstname,lastname,address,amphur,district,province,postcode,phone,birthdate,idcard) 
            VALUES ('$Firstname','$Lastname','$Address','$amphur','$district','$province','$Postcode','$Phone','$birthdate','$idcardno')";

    $query = mysqli_query($connection,$sql);
    if ($query){
            echo '<script> alert ("Data saved");</script>';
            header('Location: cust.php');
    } else {
        echo '<script> alert ("Something Wrong")</script>' . mysqli_error($connection);
    }
}

// if receive from ID = EDIT
if(isset($_POST["id"])){
    $Firstname = $_POST['firstname'];
    $Lastname = $_POST['lastname'];
    $Address = $_POST['address'];
    $amphur = $_POST['amphur'];
    $district = $_POST['district'];
    $province = $_POST['province'];
    $Postcode = $_POST['postcode'];
    $Phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $idcardno = $_POST['idcardno'];

    $sql = "UPDATE customers SET firstname = '$Firstname',
            lastname = '$Lastname',
            address = '$Address',
            amphur = '$amphur',
            district = '$district', 
            phone = '$province',
            postcode = '$Postcode',
            phone = '$Phone',
            birthdate = '$birthdate',
            idcard = '$idcardno' 
            WHERE id ='$_POST[id]'";
    
    $query = mysqli_query($connection,$sql);

    if($query){
            echo '<script> alert ("Data Saved"); </script>';
            header('Location: cust.php');
    
        } else {
            echo '<script> alert ("Data Not Saved") ;</script>' .mysqli_error($connection);
        }

   
}

?>

