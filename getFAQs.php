<?php
require 'connection.php';
$query='select * from faqs';
$result=mysqli_query($connection,$query);
$faqs_temp=array();
while($row=mysqli_fetch_assoc($result)){
    $faqs_temp[]= array("question"=>$row['question'],"answer"=>$row['answer']);
}
$faqs['data']=$faqs_temp;
echo json_encode($faqs_temp);
?>