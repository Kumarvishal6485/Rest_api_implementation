<?php
    include_once 'conn.php';
    header('content-type:application/json');
    header('Access-control-allow-methods:POST');
    header('Access-control-allow-origin:*');
    header('Access-control-allow-headers:Access-control-allow-headers,Access-control-allow-methods,content-type,Authorization,X-requested-with');

    $input = json_decode(file_get_contents('php://input'),true);

    $uname = $input['username'];
    $pass = $input['password'];
    $mail = $input['email'];

    $query = "Insert into users (username,password,email) values ('$uname','$pass','$mail')";
    $sql = mysqli_query($conn,$query);
    if($sql){
        echo json_encode(array('Status' => 'Success' , 'Data' => 'Details Inserted Successfully'));
    }
    else{
        echo json_encode(array('Status' => 'Failed' , 'Data' => 'Data Can\'t be Inserted'));
    }
?>