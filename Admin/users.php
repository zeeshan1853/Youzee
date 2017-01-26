<?php include'include/header.php';require_once'../connection.php';?>
<?php
if(isset($_GET['reference'])){
    $query='SELECT users.userID,users.userName,users.userEmail,roles.id as roleID,roles.name as roleName from users LEFT JOIN user_role on users.userID=user_role.userID LEFT JOIN roles ON user_role.roleID=roles.id WHERE users.userID='.$_GET['reference'];
    $result=mysqli_query($connection,$query);
    $user_data=mysqli_fetch_assoc($result);
    $query='SELECT * FROM roles';
    $result=mysqli_query($connection,$query);
    $query='select * from user_role WHERE userID='.$_GET['reference'];
    $result_userRole=mysqli_query($connection,$query);
    $roles=array();
    $user_roles=array();
    while($row=mysqli_fetch_assoc($result)){
        $roles[]=array('roleID'=>$row['id'],'roleName'=>$row['name']);
    }
    while($row=mysqli_fetch_assoc($result_userRole)){
        $user_roles[]=array('roleID'=>$row['roleID'],'userID'=>$row['userID']);
    }
    include'userUpdateForm.php';
}else{
include'userTable.php';
}
?>

<script src="js/users.js" type="text/javascript"></script>
</body>
</html>
