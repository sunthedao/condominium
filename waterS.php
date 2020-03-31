<?php
require_once './connect.php';
$connection = db();

if (isset($_POST['savewater'])) {
    $wid = $_POST['wid'];
    $oldnum = $_POST['oldnum'];
    $newnum = $_POST['newnum'];
    $month = $_POST['month'];
    $yearnmonth = $_POST['yearnmonth'];
    $year = $_POST['year'];
    $floor = $_POST['test'];
    $val = count($wid);


    $check_month = "SELECT ml.meter_current , mld.month , mld.year , r.floor
                    FROM meter_logs as ml right join meter_log_details as mld
                    ON ml.id = mld.meter_log_id right join rooms as r
                    ON mld.meter_log_id = r.meter_logs_id
                    WHERE mld.month = '$yearnmonth' and r.floor = '$floor'";
    $result = mysqli_query($connection, $check_month);
    // check row if row > 0 cant insert cuz same value

    $num = mysqli_num_rows($result);

   
    if ($num > 0) {
        echo "<script>";
        echo "alert('เดือนนี้ได้ทำการบันทึกไปแล้วครับ');";
        echo "window.location = 'water.php'; ";
        echo  "</script>";
    } else {

        for ($i = 0; $i < $val; $i++) {

            //    meter_logs
            $sql = "UPDATE meter_logs SET meter_current = '$newnum[$i]'
                    WHERE id = '$wid[$i]'";

            // meter_log_details
            $water = 12 ;
            $total = ($newnum[$i] - $oldnum[$i]) * $water ;
            $newtotal = abs($total);
            $sql1 = "INSERT INTO meter_log_details (meter_log_id,old_number,new_number,date_check,price_water,month,year)
                    VALUES ('$wid[$i]','$oldnum[$i]','$newnum[$i]','$month','$newtotal','$yearnmonth','$year')";

            $qr = mysqli_query($connection, $sql);
            $qr2 = mysqli_query($connection, $sql1);

            // take meter_log_details to order >> meter_log_id
            $updateorder = "UPDATE orders SET meterlog_details_id = $wid[$i] 
                            WHERE  room_id = $wid[$i] and month ='$yearnmonth' and year = '$year'";
            $qrupdate = mysqli_query($connection,$updateorder);
            // echo $updateorder .'<br>';
 
        }
        header('location: water.php');
    }

}




// from water Edit


if (isset($_POST['Editsave'])) {
    $mc = $_POST['mc'];
    $mld = $_POST ['mld'];
    // $rname = $_POST['r']
    $cnumber = $_POST['cnumber'];
    
    $val = count($mc);
    // $val2 = count($mld);

    //    print_r($mc);
    //     echo '<br>';
    //     print_r($mld).'<br>';
    //     echo '<br>';
    //     print_r($cnumber);
   

    
    for ($i = 0 ; $i < $val ; $i ++ ) {

        $wp = $cnumber[$i] * 12 ;
        $nwp = abs($wp);
        
        // update meter_current
        $mcsql = "UPDATE meter_logs SET meter_current = '$cnumber[$i]' WHERE id = '$mc[$i]'";
        $qrmcsql = mysqli_query($connection,$mcsql);

        // update to meter_log_details
        $mldsql = "UPDATE meter_log_details SET new_number = '$cnumber[$i]',
        price_water = '$nwp'
         WHERE id ='$mld[$i]'";
        $qrmld = mysqli_query($connection,$mldsql);

        if($qrmcsql && $qrmld){
            echo "done";
        } else{
            echo "can not save  " .mysqli_error($connection);
        }

    }

    header('location: water.php');
 
}