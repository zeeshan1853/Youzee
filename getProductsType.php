<?php
require_once'connection.php';
$query='select * from types';
$result=mysqli_query($connection,$query);
$type=array();
while($row=mysqli_fetch_assoc($result)){
    $type[]=array("typeID"=>$row['typeID'],"typeName"=>$row['typeName']);
}
//var_dump($type);
?>