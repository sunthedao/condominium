<?php
require_once './connect.php';
$connection = DB();

header("Content-Type:application/json");


$scsql = "SELECT od.id , od.month , od.year , r.name as room_name , cus.firstname , ord.amount , ord.unit ,ord.price ,sv.name as sv_name
        from orders as od left join order_details as ord
        ON od.id = ord.order_id left join services as sv
        ON ord.service_id = sv.id left join rooms as r
        ON od.room_id = r.id left join customers as cus
        ON od.customer_id = cus.id
        WHERE od.id = '1' and ord.price != 0";

        $qrSc = mysqli_query($connection,$scsql);
        
        while($row = mysqli_fetch_assoc($qrSc)){
            // $rows[] = $row;
            // $a['data'] = $rows;

            // $sv_name = $row['sv_name'];
            // $amount = $row['amount'];
            // $price = $row['price'];

            $row2[] = ([
                "name" => $row['sv_name'],
                "amout"=> $row['amount'],
                "price" => $row['price']
            ]);

            $b['data'] = $row2;
           
        
           

        }
        // print_r($a);
        print_r($b);
        // echo json_encode($a);
        // $a['data'] = $rows;
      
?>