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

            $sql1 = "INSERT INTO meter_log_details (meter_log_id,old_number,new_number,date_check,month,year)
                    VALUES ('$wid[$i]','$oldnum[$i]','$newnum[$i]','$month','$yearnmonth','$year')";

            $qr = mysqli_query($connection, $sql);
            $qr2 = mysqli_query($connection, $sql1);
        }
        header('location: water.php');
    }
}
