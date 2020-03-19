<?php require_once './connect.php';
$connection = DB();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>  
                <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        test
                    </th>
                    <th>
                        btn
                    </th>
                </tr>
            </thead>
           <tbody>


                        <?php
                      

                      $sqlBill = "SELECT r.id ,r.name , ord.status , ord.month , ord.year ,ord.id as ord_id
                                  FROM rooms as r left join orders as ord
                                  ON r.id = ord.room_id
                                  WHERE ord.month = 'February' and year = '2020'";

                      $qrBill = mysqli_query($connection, $sqlBill);
                      while ($row = mysqli_fetch_assoc($qrBill)) {
                          echo "<tr>";
                          echo "<td>". $row['ord_id'] ."</td>";

                          echo "<td>" . '<iframe src="bprint.php?id='. $row['ord_id'] .'" name="frame'. $row['ord_id'] .'">' . '</iframe>'  ."</td>";

                          echo "<td>" . '<button type="submit" class="btn btn-primary" onclick=' . "frames['frame".$row['ord_id']."'.print()" . '>' . "ปริ้นบิล" . '</button>' . "</td>" ;
                               



                          echo "</tr>";
              
                      }
                        ?>

           </tbody>

               
                </table>
</body>

</html>
