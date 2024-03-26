<?php 
    include_once 'conn.php';
    header('content-type:application/json');
    header('Access-control-allow-methods:GET');
    header('Access-control-allow-origin:*');
    header('Access-control-allow-headers:Access-control-allow-headers,Access-control-allow-methods,content-type,authorization,X-requested-with');

    $input = json_decode(file_get_contents('php://input'),true);
    $value = $input['search'];
    $query = "Select * from users where username like '%$value%' or email like '%$value%' or id like '%$value%'";
    $sql = mysqli_query($conn,$query);
    if(mysqli_num_rows($sql) > 0){
        $data = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        echo json_encode(array('data' => $data , 'status' => 'Success'));
    }
    else{
        echo json_encode(array('data' => 'No Data Exist' , 'status' => 'Success'));
    }
?>