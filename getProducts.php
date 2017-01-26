<?php
    require_once'connection.php';
    $query="select * from items";
    $query="SELECT itemID,itemName,items.typeID as typeID,typeName as typeProduct,price,city,photo1,description,date(date) as date FROM items JOIN types on items.typeID=types.typeID WHERE items.typeID=types.typeID  ORDER BY itemID DESC ";
    $result=mysqli_query($connection,$query);
    $num_rows=mysqli_num_rows($result);
    $response=array();
    for($i=0;$i<$num_rows;$i++){
        $row=mysqli_fetch_assoc($result);
        $response[]=array("itemID"=>$row['itemID'],"itemName"=>$row['itemName'],"typeID"=>$row['typeID'],"typeProduct"=>$row['typeProduct'],"price"=>$row['price'],"city"=>$row['city'],"description"=>$row['description'],"photo1"=>$row['photo1'],"date"=>$row['date']);
    }
//    var_dump($response);

    $fp = fopen('results.json', 'w');
    $writeabe['data']=$response;
    fwrite($fp, json_encode($response));
    fclose($fp);
    echo json_encode($writeabe);

?>