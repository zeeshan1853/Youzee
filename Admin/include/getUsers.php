<?php
require_once'../../connection.php';
//$query='select * from users';
$query='SELECT users.userID,users.userName,users.userEmail,roles.id as roleID,roles.name as roleName from users LEFT JOIN user_role on users.userID=user_role.userID LEFT JOIN roles ON user_role.roleID=roles.id WHERE 1 GROUP BY users.userEmail';
$result=mysqli_query($connection,$query);
$users=array();
while($row=mysqli_fetch_assoc($result)){
    $users[]=array('userID'=>$row['userID'],'userName'=>$row['userName'],'userEmail'=>$row['userEmail'],'role'=>$row['roleName'],'Action'=>$row['userID']);
}
$data['data']=$users;
echo json_encode($data);
?>