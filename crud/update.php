<?php
$conn=mysqli_connect("localhost","root","","posts");
header("Access-Control-Allow-Orgin: *");
header("Content-Type:Application/json;charset=UTF-8");

if(!$conn)
{
    die("connection failed ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=="PUT")
{
    $uri=$_SERVER['REQUEST_URI'];
    $uriArr=explode("/",$uri);
    $id=end($uriArr);

    $data=json_decode(file_get_contents("php://input"));
    $name=$data->name;
    $id=$data->id;
    $desc=$data->desc;

    $query="UPDATE `postData` SET  id = $id,'name'= '$name','desc'='$desc' WHERE id = $id ";
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