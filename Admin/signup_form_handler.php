<?php require_once'../connection.php'?>
<?php
 $name=$_POST['name'];
 $email=$_POST['mail'];
 $pass=$_POST['password'];
 $hashed=password_hash($pass, PASSWORD_DEFAULT);
 $query="select * from users where userEmail='$email'";
 $result=mysqli_query($connection,$query);
 $row=mysqli_fetch_assoc($result);
try {
    if(sizeof($row)<1){
        $query="insert into users(userName,userPassword,userEmail) VALUES ('$name','$hashed','$email')";
        $result=mysqli_query($connection,$query);
        echo json_encode(array(
            'verified'=>array(
                'msg'=>"You have been registered, Now you can login",
            ),
        ));
    }
    else{
        throw new Exception('This email already registered', 123);
    }

} catch (Exception $e) {
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}
?>