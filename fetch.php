<?php 
    include_once 'conn.php';
    header('Content-type:Application/json');
    header('Access-control-allow-methods:POST');
    header('Access-control-allow-origin:*');
    $req = json_decode(file_get_contents('php://input'),true);
    $id = $req['sid'];
    $query = "select * from users where id = {$id}";
    $sql = mysqli_query($conn,$query);
    if(mysqli_num_rows($sql) > 0){
        $data = mysqli_fetch_all($sql,MYSQLI_ASSOC);
        echo json_encode($data);
    }
    else{
        echo json_encode(array('data'=> 'No Data Found' , 'Status' => 'Failed'));
    }
?>