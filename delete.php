<?php 
    include_once 'conn.php';
    header('content-type:application/json');
    header('Access-control-allow-methods:DELETE');
    header('Access-control-allow-origin:*');
    header('Access-control-allow-headers:Access-control-allow-headers,Access-control-allow-methods,content-type,Authorization,X-requested-with');

    $input = json_decode(file_get_contents('php://input'),true);
    $sid = $input['sid'];
    $query = "Delete from Users where id = '$sid'";
    $sql = mysqli_query($conn,$query);
    if($sql){
        echo json_encode(array('data' => 'Entry Deleted Successfully' , 'status' => 'Success'));
    }
    else{
        echo json_encode(array('data' => 'Can\'t Delete Entry' , 'Status' => 'Failed'));
    }
?>