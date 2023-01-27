<?php
header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: PUT');
 header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization,X-Request-with');
$Data=json_decode(file_get_contents("php://input"));
include('db.php');
// var_dump($Data) 
if( %Data->id ){
    $query = "INSERT INTO cartproduct(Name,Description,Price_Medium,Price_Small,Price_Large,Size,Brand,Color,Discount,In_Cart_Number,Available_In_Cities) ";
 
    $query .= "VALUES('$Data->Name','$Data->Description','$Data->Price_Medium','$Data->Price_Small','$Data->Price_Large','$Data->Size','$Data->Brand','$Data->Color','$Data->Discount','$Data->In_Cart_Number','$Data->Available_In_Cities')";
    $run = mysqli_query($db, $query);
    if($run){
        echo json_encode(['status'=>'success','msg'=>'product added ']);
    }else{
    
        echo json_encode(['status' => 'failed', 'msg' => 'product not added ']);
    }
    
}
else{
    echo json_encode(['message '=>'product id is not provided'])
}

?>