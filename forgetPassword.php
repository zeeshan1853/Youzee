<?php
$email=$_POST['mail'];
require_once'connection.php';
$query="select * from users where userEmail='$email'";
$result=mysqli_query($connection,$query);
$user=mysqli_fetch_assoc($result);
try{
    if(sizeof($user)>0){
        srand(make_seed());
        $randval = rand();
        $hashed=password_hash($randval, PASSWORD_DEFAULT);
        require("PHPMailer-master/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder
        ini_set("SMTP","ssl://smtp.gmail.com");
        ini_set("smtp_port","465"); //No further need to edit your configuration files.
        $mail = new PHPMailer();
        $mail->setFrom('zeeshan1853@gmail.com', 'Youzee');
        $mail->addAddress($user['userEmail'], $user['userName']);
        $mail->Subject  = 'Password recover ';
        $mail->Body     = 'Hi! This is your new password '.$randval;

        if(!$mail->Send()) {
//            echo 'Mailer error: ' . $mail->ErrorInfo;
            throw new Exception('Mailer error: ',123);
        } else {

            $userID=$user['userID'];
            $query="update users set userPassword='$hashed' WHERE userID=$userID";
            $result=mysqli_query($connection,$query);
            if($result==1){
                echo json_encode(array(
                    'verified'=>array(
                        'msg'=>"Your password has been updated, check your email for detail.",
                    ),
                ));
            }

        }

    }else{
        throw new Exception('This email address is not registered ',123);
    }
}catch (Exception $e){
    echo json_encode(array(
        'error'=>array(
            'msg'=>$e->getMessage(),
            'code'=>$e->getCode(),
        ),
    ));
}

function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return $sec + $usec * 1000000;
}
?>