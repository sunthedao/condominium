
<?php require_once __DIR__ . '/../connect.php';

header("Content-Type:application/json");

$connection = DB();


$sql = "SELECT * from users WHERE id = 1 ";
$rows = array();
$result = mysqli_query($connection, $sql);


$row = $result->fetch_assoc();
// printf ("%s %s %s %s %s %s\n", $row["id"], $row["Firstname"],$row["Lastname"],
//         $row["Email"],$row["MobileNo"],$row["Address"]);


$rows[] = $row;


// // check row
// if (mysqli_num_rows($result) > 0) {

//     $row = 
//     // loop for data
//     // while ($row = mysqli_fetch_assoc($result)) {
//     //     $rows[] = $row;
//     // }
// } else {
//     echo "result = 0 , go check ur COde";
// }

echo json_encode($row);




mysqli_close($connection);
