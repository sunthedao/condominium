<?php
require_once './connect.php';
$connection = DB();

// btn insertdata
if(isset($_POST['insertemp'])){
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Address = $_POST['Address'];
    $Born = $_POST['born'];
    $idcard = $_POST['idcardno'];
    $Phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Postcode = $_POST['postcode'];
    $degree = $_POST['degree'];

    $sql = "INSERT INTO users (name,lastname,address,born,idcardno,phone,username,password,postcode,degree) 
            VALUES ('$Firstname','$Lastname','$Address','$Born','$idcard','$Phone','$username','$password','$Postcode','$degree')";

    $query = mysqli_query($connection,$sql);
    if ($query){
            echo '<script> alert ("Data saved");</script>';
            header('Location: emp.php');
    } else {
        echo '<script> alert ("Something Wrong")</script>' . mysqli_error($connection);
    }
}

// if receive from ID = EDIT
if(isset($_POST["id"])){
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Address = $_POST['Address'];
    $Born = $_POST['born'];
    $idcard = $_POST['idcardno'];
    $Phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $Postcode = $_POST['postcode'];
    $degree = $_POST['degree'];

    $sql = "UPDATE users SET name = '$Firstname',
            lastname = '$Lastname',
            address = '$Address',
            born = '$Born',
            idcardno = '$idcard', 
            phone = '$Phone',
            username = '$username',
            password = '$password',
            degree = '$degree' 
            WHERE id ='$_POST[id]'";
    
    $query = mysqli_query($connection,$sql);

    if($query){
            echo '<script> alert ("Data Saved"); </script>';
            header('Location: emp.php');
    
        } else {
            echo '<script> alert ("Data Not Saved") ;</script>' .mysqli_error($connection);
        }



    
}

?>

