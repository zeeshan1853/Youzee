<?php
session_start();
require_once'../connection.php';
$email=$_POST['mail'];
$pass=$_POST['password'];
$query="select userID,userName,userPassword,userEmail from users where userEmail='$email'";
$result=mysqli_query($connection,$query);
$data_user=mysqli_fetch_assoc($result);
try{
    if(sizeof($data_user)<1){
        throw new Exception('Incorrect Email address', 123);
    }
    else if(password_verify($pass,$data_user['userPassword'])){
        $_SESSION['userID']=$data_user['userID'];
        $_SESSION['userName']=$data_user['userName'];
        $_SESSION['userEmail']=$data_user['userEmail'];
        $query='select roles.name as role from roles JOIN user_role on user_role.roleID=roles.id WHERE userID='.$data_user['userID'];
        $result=mysqli_query($connection,$query);
        $user_role=mysqli_fetch_assoc($result);
        if(sizeof($user_role)>0){
            $_SESSION['userRole'][]=$user_role['role'];
            if($user_role['role']=='suspend'){
                session_destroy();
                throw new Exception('Your Registration Has been suspended', 123);
            }
            while($user_role=mysqli_fetch_assoc($result)){
                $_SESSION['userRole'][]=$user_role['role'];
                if($user_role['role']=='suspend'){
                    session_destroy();
                    throw new Exception('Your Registration Has been suspended', 123);
                }
            }

        }
        echo json_encode(array(
            'verified'=>array(
              'name'=>$data_user['userName'],
              'email'=>$data_user['userEmail'],
            ),
        ));
    }
    else{
        throw new Exception('Incorrect Password ',123);
    }
}catch (Exception $e){
    echo json_encode(array(
        'error' => array(
            'msg' => $e->getMessage(),
            'code' => $e->getCode(),
        ),
    ));
}


?>