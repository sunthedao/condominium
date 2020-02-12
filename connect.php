<?php 

function DB(){
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $DBName = 'condominium';

    $conn = mysqli_connect($servername, $username, $password,$DBName);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    return $conn;

}

?>