<?php
require_once("../connection.php");
$img1;
$img2;
$img3;
$img4;
if(isset($_POST['id_delete'])){
    $itemID=$_POST['id_delete'];
    $query="SELECT itemID,typeID,itemName,price,city,photo1,photo2,photo3,photo4,description FROM items WHERE itemID=".$itemID;
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
//var_dump($row);
    $img1=$row['photo1'];
    $img2=$row['photo2'];
    $img3=$row['photo3'];
    $img4=$row['photo4'];

    $query="DELETE FROM items WHERE items.itemID = ".$itemID;
//    echo $img1;
//echo $img2;
//echo $img3;
//echo $img4;
    $result=mysqli_query($connection,$query);
//echo $result;

    unlink("../uploads/".$img1);
    unlink("../uploads/".$img2);
    unlink("../uploads/".$img3);
    unlink("../uploads/".$img4);
}

?>