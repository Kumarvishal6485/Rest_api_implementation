<?php
    include_once 'conn.php';
    header('content-type:application/json');
    header('Access-control-allow-methods:PUT');
    header('Access-control-allow-origin:*');
    header('Access-control-allow-headers:Access-control-allow-headers,Access-control-allow-methods,content-type, Authorization, X-requested-with');

    $input = json_decode(file_get_contents('php://input'),true);

    $sid = $input['sid'];
    $uname = $input['uname'];
    $pass = $input['pass'];
    $mail = $input['mail'];

    $query = "Update users SET username = '$uname' , password = '$pass' , email = '$mail' where id = '$sid'";
    $sql = mysqli_query($conn,$query);
    if($sql){
        echo json_encode(array('Data' => 'Data Updated Successfully' , 'Status' => 'Success'));
    }
    else{
        echo json_encode(array('Data' => 'Can\'t Update Data' , 'Status' => 'Failed'));
    }
?>