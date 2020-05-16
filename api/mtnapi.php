<?php
require_once './../connect.php';

header("Content-Type:application/json");
$connection = DB();

 if(isset($_POST['action'])){
     if($_POST['action'] ==  1){
         $val = $_POST['action'];
        
         $sqlst = "SELECT rp.id , rp.detail , rp.date_call , rp.date_do , rp.price , r.name as r_name
         FROM repair as rp left join rooms as r
         ON rp.room_id = r.id
         WHERE rp.price = 0
         ORder by rp.date_call";
         $qrst = mysqli_query($connection,$sqlst);

         if(mysqli_num_rows($qrst) > 0) {
             while($row = mysqli_fetch_assoc($qrst)){
                 $rows[] = ([
                     "action" => true ,
                     "room" => $row['r_name'],
                    "detail" => $row['detail'],
                    "DayCall" => $row['date_call'],
                    "status" => "ยังไม่ได้ทำการซ่อม"
                 ]);

                 $a['data'] = $rows;


             }
         } else {

            $rows[] = ([
                "action" => false ,
                "text" => "ไม่มีข้อมูลครับ"
            ]);

            $a['data'] = $rows;

            echo json_encode($a);
         }

         echo json_encode($a);

     } 

     if($_POST['action'] == 2){
        
        $sqlnd = "SELECT rp.id , rp.detail , rp.date_call , rp.date_do , rp.price , r.name as r_name
        FROM repair as rp left join rooms as r
        ON rp.room_id = r.id
        WHERE rp.price > 0
        ORder by rp.date_call";

        $qrsqlnd = mysqli_query($connection,$sqlnd);

        if(mysqli_num_rows($qrsqlnd) > 0) {
            while($row = mysqli_fetch_assoc($qrsqlnd)){
                $rows[] = ([
                    "action" => true ,
                    "room" => $row['r_name'],
                   "detail" => $row['detail'],
                   "DayCall" => $row['date_call'],
                   "status" => "ซ่อมเสร็จแล้ว"
                ]);

                    $a['data'] = $rows;
            }
        }else {
            $rows[] = ([
                "action" => false ,
                "text" => "ไม่มีข้อมูลครับ"
            ]);

            $a['data'] = $rows;

            echo json_encode($a);
         }

         echo json_encode($a);




     }
 }
