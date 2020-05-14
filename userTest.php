<?php

require_once './connect.php';
$connection = DB();

$sql = "SELECT r.name as r_name , cust.firstname as cust_name , cust.lastname as cust_lastname  , cust.address , cust.birthdate , cust.idcard , cust.phone , cust.postcode
FROM rooms as r left join customers as cust
ON r.customer_id = cust.id
WHERE r.customer_id != 0";
$qr = mysqli_query($connection,$sql);

// $rows[] = '' ;
if (mysqli_num_rows($qr) > 0) {

    while($row = mysqli_fetch_assoc($qr)){
        
        $rows[] = $row;
        
        
    }
}

// print_r($rows);
// echo '<br>';


foreach($rows as $k => $v){

    // Pass for loging
    $date =  $v['birthdate'];
    $newDate = date("Ymd",strtotime($date));
    // Id room for login
    $oldname = $v['r_name'];
    $newname = "R".$oldname;

    // name's Cus
    $cusname = $v['cust_name'];
    // Lastname's Cus
    $cusLname = $v['cust_lastname'];
    // Cus's Address
    $cusAddress = $v['address'];
    // Cus'birth
    $CusBirth = $v['birthdate'];
    // Cus's idcard
    $CusIdcard = $v['idcard'];
    // Cus's phone
    $CusPhone = $v['phone'];
    // Cu's postcode
    $CusPost = $v['postcode'];


    $sqlidP = "INSERT INTO users (name,lastname,address,born,idcardno,phone,username,password,postcode,degree) 
    VALUES ('$cusname','$cusLname','$cusAddress','$date','$CusIdcard','$CusPhone','$newname','$newDate','$CusPost','cus') ";


    $qridP = mysqli_query($connection,$sqlidP);

   

    // echo "{$cusname} {$cusAddress} {$CusBirth} {$CusIdcard} {$CusPhone} {$CusPost} <br>";


    // echo "{$v['r_name']} {$v['cust_name']} {$v['address']} {$v['birthdate']} {$v['idcard']} {$v['phone']}  {$v['postcode']} <br> ";

    

}
 if($qridP){
        echo "YES";
    } else {
        echo "NO" . mysqli_error($connection);
    }

?>