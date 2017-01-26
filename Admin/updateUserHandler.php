<?php
require_once'../connection.php';
$userID= $_POST['userID'];
$userName=$_POST['userName'];
$userEmail=$_POST['userEmail'];
$addRoles=array();
$deleteRoles=array();
//$userRole=$_POST['role'];
if(!empty($_POST['user_role'])) {
    foreach($_POST['user_role'] as $check) {
        array_push($addRoles,trim($check,' '));
    }
}
$query='select id from roles';
$result=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($result)){
    if(!(in_array($row['id'],$addRoles))){
        array_push($deleteRoles,$row['id']);
    }
}

$query='';
for($i=0;$i<sizeof($deleteRoles);$i++){
//    $query='delete from user_role WHERE userID='.$userID.' AND roleID='.$deleteRoles[$i].';';
    $query='delete from user_role WHERE userID='.$userID.' AND roleID='.$deleteRoles[$i];
    echo $result=mysqli_query($connection,$query);

}
//if(sizeof($deleteRoles)>0){
//   echo $result=mysqli_multi_query($connection,$query);
//}
for($i=0;$i<sizeof($addRoles);$i++){
//    $query='insert into user_role (userID,roleID) VALUES ('.$userID.','.$addRoles[$i].');';
    $query='insert into user_role (userID,roleID) VALUES ('.$userID.','.$addRoles[$i].')';
    echo $result=mysqli_query($connection,$query);
}
//if(sizeof($addRoles)>0){
//   echo $result=mysqli_multi_query($connection,$query);
//}
$query="update users set userName='$userName', userEmail='$userEmail' WHERE userID=$userID";
//$query2="INSERT INTO user_role (userID, roleID) VALUES($userID, $userRole) ON DUPLICATE KEY UPDATE userID=$userID, roleID=$userRole";
$result=mysqli_query($connection,$query);

?>