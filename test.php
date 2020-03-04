<?php
require_once './connect.php';
$connection = DB();

$sql = "SELECT id FROM rooms ORDER BY id DESC limit 1";
$qr = mysqli_query($connection,$sql);





?>