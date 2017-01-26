<?php
require_once("../connection.php");
$query="SELECT itemID,itemName,items.typeID,typeName,price,city,photo1,photo2,photo3,photo4,description FROM items JOIN types on items.typeID=types.typeID WHERE items.typeID=types.typeID";
if(isset($_GET['itemID'])){
    $query="SELECT itemID,typeID,itemName,price,city,photo1,photo2,photo3,photo4,description FROM items WHERE itemID=".$_GET['itemID'];

    $result=mysqli_query($connection,$query);
    $number_of_rows=mysqli_num_rows($result);
    $items_array= array();
    for($i=0;$i<$number_of_rows;$i++){
        $row=mysqli_fetch_assoc($result);
        $items_array[]=array("ItemID"=>$row['itemID'],"ItemName"=>$row['itemName'],"Price"=>$row['price'],"City"=>$row['city'],"Description"=>$row['description'],"Photo1"=>$row['photo1'],"Photo2"=>$row['photo2'],"Photo3"=>$row['photo3'],"Photo4"=>$row['photo4']);
    }
}
else{
    $result=mysqli_query($connection,$query);
    $number_of_rows=mysqli_num_rows($result);
    $items_array= array();
    for($i=0;$i<$number_of_rows;$i++){
        $row=mysqli_fetch_assoc($result);
        $items_array[]=array("ItemID"=>$row['itemID'],"ItemName"=>$row['itemName'],"TypeName"=>$row['typeName'],"Price"=>$row['price'],"City"=>$row['city'],"Description"=>$row['description'],"Photo1"=>$row['photo1'],"Photo2"=>$row['photo2'],"Photo3"=>$row['photo3'],"Photo4"=>$row['photo4']);
    }
}

echo json_encode($items_array);
?>