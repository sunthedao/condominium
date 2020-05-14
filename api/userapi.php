<?php
require_once './../connect.php';

header("Content-Type:application/json");

$connection = DB();

if(isset($_POST['Action'])){
    if($_POST['Action'] == 'CallOd'){

        $Rid = $_POST['roomid'];
        $year = $_POST['year'];
        $Cusid = $_POST['CustomerId'];
        $month = $_POST['month'];

        // echo $Rid . " " .$year. " " .$Cusid;


        
        $rows['data'] = ([
           
        ]);

            $a = $rows;        
            echo json_encode($a);
    }
}


// echo json_decode();



?>