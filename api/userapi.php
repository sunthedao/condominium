<?php
require_once './../connect.php';

header("Content-Type:application/json");

$connection = DB();

if (isset($_POST['Action'])) {
    if ($_POST['Action'] == 'CallOd') {

        $Rid = $_POST['roomid'];
        $year = $_POST['year'];
        $Cusid = $_POST['CustomerId'];
        $month = $_POST['month'];

        //! Find ORder ID
        $Fsql = "SELECT ord.id as ord_id
        FROm orders as ord
        WHERE ord.month = '$month' and ord.year = '$year' and ord.customer_id = '$Cusid' and ord.room_id = '$Rid'";

        $qrF = mysqli_query($connection, $Fsql);

        if (mysqli_num_rows($qrF) > 0) {
            while ($row = mysqli_fetch_assoc($qrF)) {
                $Odid = $row['ord_id'];
            }

            //! Find price for room and other price
            $scsql = "SELECT od.id , od.month , od.year , r.name as room_name , cus.firstname , ord.amount , ord.unit ,ord.price ,sv.name as sv_name
            from orders as od left join order_details as ord
            ON od.id = ord.order_id left join services as sv
            ON ord.service_id = sv.id left join rooms as r
            ON od.room_id = r.id left join customers as cus
            ON od.customer_id = cus.id
            WHERE od.id = '$Odid' and ord.price != 0";

            $qrSc = mysqli_query($connection, $scsql);
            $sv_name = [];
            $amount = [];
            $price = [];

            if (mysqli_num_rows($qrSc) > 0) {
                while ($row = mysqli_fetch_assoc($qrSc)) {
                    // $rows[] = $row;
                    $sv_name = $row['sv_name'];
                    $amount = $row['amount'];
                    $price = (int) $row['price'];

                    $rows[] = ([
                        "sv_name" => $sv_name,
                        "amount" => $amount,
                        "price" => $price,
                        // "text" => "สำเร็จ"
                    ]);

                    $a['data'] = $rows;
                }
            }

            //! Find Water Price
            $Trsql = "SELECT mld.old_number , mld.new_number , mld.price_water , ods.id as order_id , ods.room_id 
            FROM meter_log_details as mld left join orders as ods 
            ON mld.meter_log_id = ods.meterlog_details_id
            WHERE ods.id = '$Odid' AND mld.month = '$month'";

            $qrTr = mysqli_query($connection, $Trsql);

            if (mysqli_num_rows($qrTr) > 0) {
                while ($row = mysqli_fetch_assoc($qrTr)) {
                    // $rows[] = $row;
                    $sv_name = "ค่าน้ำ";
                    $amount = ($row['new_number'] - $row['old_number']);
                    $price = (int) $row['price_water'];

                    $rows[] = ([
                        "sv_name" => $sv_name,
                        "amount" => $amount,
                        "price" => $price
                    ]);
                    $a['data'] = $rows;
                }
            }
        } else {
            $rows[] = ([
                "status" => false,
                "text" => "ไม่มีค่าใช้จ่ายสำหรับเดือนนี้"
            ]);
            $a['data'] = $rows;
        }

        echo json_encode($a);
    }
}



