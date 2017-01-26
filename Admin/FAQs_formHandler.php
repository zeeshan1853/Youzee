<?php
require'../connection.php';

 $question=$_POST['question'];
 $answer=$_POST['answer'];
 $query="insert into faqs(question,answer) VALUES ('$question','$answer')";
 $result=mysqli_query($connection,$query);
if($result==1){
 echo json_encode(array(
     'success'=>array(
         'name'=>"Success",
         'detail'=>"This FAQ has been added to database",
     ),
 ));
}else{
 echo json_encode(array(
     'error'=>array(
         'name'=>"Error",
         'detail'=>"Unable to add this FAQ to database. Contact web developer. zeeshan1853@gmail.com",
     ),
 ));
}


?>