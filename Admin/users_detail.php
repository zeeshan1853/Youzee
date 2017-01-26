<?php include'include/header.php';require'../connection.php';?>
<?php
if(isset($_GET['reference'])){
    $userID=$_GET['reference'];
    $query='select * from users WHERE userID='.$userID;
    $query2='select roles.name FROM roles JOIN user_role on roles.id=user_role.roleID WHERE user_role.userID='.$userID;
    $result=mysqli_query($connection,$query);
    $result2=mysqli_query($connection,$query2);
    $user=mysqli_fetch_assoc($result);
    $roles=array();
    while($temp=mysqli_fetch_assoc($result2)){
        $roles[]=array('role'=>$temp['name']);
    }
}else{
    return false;
}
?>
<div class="container">
    <h3 class="text-center">Detail</h3>
    <table class="table">
        <tr>
            <th>User Name</th>
            <td><?php echo $user['userName']; ?></td>
        </tr>
        <tr>
            <th>User Email</th>
            <td><?php echo $user['userEmail']; ?></td>
        </tr>
        <tr>
            <th>User Roles</th>
            <td><?php foreach($roles as $key=>$value){echo $value['role'].", ";} ?></td>
        </tr>
    </table>
<?php  ?>
</div>

<script src="js/users.js" type="text/javascript"></script>
</body>
</html>

