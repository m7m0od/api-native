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
    $uri=$_SERVER['REQUEST_URI'];
    $uriArr=explode("/",$uri);
    $id=end($uriArr);

    $query="SELECT * FROM `postData` WHERE id = $id ";
    $runQuery=mysqli_query($conn,$query);

    if(mysqli_num_rows($runQuery)>0)
    {
        $result=mysqli_fetch_assoc($runQuery);
        $jsonResult=json_encode($result);
    }else{
        echo json_encode(["msg"=>"not found"]);
    }

}else{
    http_response_code(404);
}





?>