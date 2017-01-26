<?php
function checkRole($role_array,$roleID,$userID){
    for($i=0;$i<sizeof($role_array);$i++){
        if($role_array[$i]['roleID']==$roleID && $role_array[$i]['userID']==$userID){
            return true;
        }
    }
    return false;
}
?>
<div class="container">
    <form class="form-horizontal" action="" method="post" id="user_update">
        <input type="hidden" name='userID' value="<?php echo $user_data['userID']?>">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">User Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="userName" name="userName" placeholder="User Name" value="<?php echo $user_data['userName']?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="userEmail" placeholder="Enter email" value="<?php echo $user_data['userEmail']?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Roles:</label>
            <div class="col-sm-10">
                <!--                <input type="email" class="form-control" id="email" placeholder="User Role" value="--><?php //echo $user_data['roleName']?><!--">-->
<!--                <select id="role" name="role">-->
                    <?php
                    for($i=0;$i<sizeof($roles);$i++){
                        $roleName=$roles[$i]['roleName'];
                        $roleID=$roles[$i]['roleID'];
                        $available=checkRole($user_roles,$roleID,$user_data['userID'])? 'checked' : '';
//                        echo"<option value='$roleID'>$roleName</option>";
                        echo "<label>$roleName</label><input type='checkbox' name='user_role[]' value='$roleID' $available>";
                    }
                    ?>
<!--                </select>-->

            </div>
        </div>
        <input type="submit" value="Update" class="btn btn-success pull-right">
    </form>
</div>
