<?php
require_once './connect.php';
$connection = DB();

// from bill creat
if (isset($_POST['savebill'])) {
    // room ID
    $id = $_POST['id'];
    // room name
    $name = $_POST['name'];
    $price = $_POST['price'];
    // $earnest = $_POST['earnest'];
    // customer id
    $cus = $_POST['cus'];
    $juris = $_POST['juris'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    // day for pay
    $paydate = $_POST['paydate'];

    //! user id LOG IN
    $usid = $_POST['empid'];

    // date
    $t1 = date('Y-m-d');


    //! COUNT for LOOP
    $val = count($id);
    // echo $icount.'<br>';

    $sqlorder = "SELECT month FROM orders WHERE month = '$month'";
    $qrorder = mysqli_query($connection, $sqlorder);

    $num = mysqli_num_rows($qrorder);

    if ($num > 0) {
        echo "<script>";
        echo "alert('เดือนนี้ได้ทำการบันทึกไปแล้วครับ');";
        echo "window.location = 'billCreate.php'; ";
        echo  "</script>";
    } else {

        for ($i = 0; $i < $val; $i++) {

            $total = $price[$i];
            $sql1 = "INSERT INTO orders (room_id,customer_id,total_price,order_date,juristic_id,user_id,status,payment_date,month,year) 
                    VALUES ('$id[$i]','$cus[$i]','$total','$t1','$juris[$i]','$usid','0','$paydate','$month','$year')";
             $qr1 = mysqli_query($connection, $sql1);


            // ! insert to order_details
            $sqllastid = "SELECT id from orders order by id DESC LIMIT 1";
            $qr = mysqli_query($connection,$sqllastid);
            while ($row = mysqli_fetch_assoc($qr)){
                $last_id = $row['id'];
            }
            // ค่าเช่า type = 1 , ค่ามัดจำ type = 4
            // ! mysqli_insert_id >> เลือก id ล่าสุดจาก table นั้น ๆ
            // $last_id = mysqli_insert_id($connection);
            $sql2 = "INSERT INTO order_details (service_id , amount , unit ,price , total , order_id)
                    VALUES ('1','1','เดือน','$price[$i]','$price[$i]','$last_id')";
            $qr2 = mysqli_query($connection, $sql2);
            // $sql3 = "INSERT INTO order_details (service_id , amount , unit ,price , total , order_id)
            //          VALUES ('4','1','-','$earnest[$i]','$earnest[$i]','$last_id')";

           
            
            // $qr3 = mysqli_query($connection, $sql3);

          
        }
        if ($qr1 && $qr2) {
            header('location: billCreate.php');
        } else {
            echo "Something Wrong" . mysqli_error($connection);
        }
    }
   
}



// from BIll EDIT
if(isset($_POST['esub'])){
    $oid = $_POST['odid'];
    $ordtid = $_POST['ordtid'];
    // $svid = $_POST['svid'];
    $amt = $_POST['amt'];
    $prc = $_POST['prc'];
    $val = count($ordtid);

    // echo $oid. '<br>'  ;

    // echo $val . '<br>'  ;
    // print_r($ordtid);
    // print_r($amt);
    // print_r($prc);

    for ($i = 0 ; $i < $val ; $i++){
        $svsql = "UPDATE order_details SET amount = '$amt[$i]' , 
        unit = '$prc[$i]' ,
        price = '$prc[$i]' , 
        total = '$prc[$i]'
        WHERE id = '$ordtid[$i]'";

        $qrsv = mysqli_query($connection,$svsql);

    }

  
        header("location: billPrint.php?id=$oid");

}

// from Bill Print for change status

if(isset($_GET['id'])){
    $idt = $_GET['id'];
    $date = date('Y-m-d');
    $sqlstatus = "UPDATE orders SET status = '1' , payment_at = '$date' WHERE id = '$idt'";
    $qrstatus = mysqli_query($connection,$sqlstatus);
    // 
    if($qrstatus){
        header("location: home.php");
    }
}