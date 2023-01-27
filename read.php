<?php
header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: GET');
 header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-with');
$Data=json_decode(file_get_contents("php://input"));
include('db.php');
// var_dump($Data) 
$query = "SELECT * from cartproduct";

if(isset($_GET['id'])){
    $query = "SELECT * FROM  cartproduct WHERE  id=" . $_GET['id']; 
}

$run = mysqli_query($db, $query);
$products = mysqli_fetch_all($run,MYSQLI_ASSOC);
echo json_encode($products); 