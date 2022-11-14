<?php 

$conn=mysqli_connect("localhost","root","","posts");
header("Access-Control-Allow-Orgin: *");
header("Content-Type:Application/json;charset=UTF-8");

if(!$conn)
{
    die("connection failed ".mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=="GET")
{
    $query="SELECT * FROM `postData`";
    $runQuery=mysqli_query($conn,$query);
    $result=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    $jsonResult=json_encode($result);
    
}else{
    http_response_code(404);
}


?>

