<?php
$conn=mysqli_connect("localhost","root","","posts");
header("Access-Control-Allow-Orgin: *");
header("Content-Type:Application/json");

if(!$conn)
{
    die("connection failed ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $data=json_decode(file_get_contents("http://localhost:4200/home"));
    $name=$data->name;
    $id=$data->id;
    $desc=$data->desc;

    $query="INSERT INTO `postData` (id,'name','desc') VALUES ($id,'$name','$desc')";
    $runQuery=mysqli_query($conn,$query);
    if($runQuery)
    {
        echo json_encode(["msg"=>"Added"]);
    }
    else{
        echo json_encode(["msg"=>"Failed"]);
    }
}
else{
    http_response_code(404);
}

?>