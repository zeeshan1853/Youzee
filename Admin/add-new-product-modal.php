<?php include_once'../getProductsType.php';?>
<div id="myModal" class="modal fade" role="dialog" style="width: 100% !important;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" style="color: black">Product</h4>
            </div>

            <form class="form" role="form" action="" method="POST" id="edit_form" enctype="multipart/form-data">
                <!-- Modal Body-->
                <div class="modal-body">

                    <div class="">
                        <label class="">Product Name</label>
                        <input type="hidden" name="itemID" >
                        <input type="text" class="form-control" name="name" placeholder="Product Name" required>
                        <label class="">Product Type</label>
                        <select class="form-control" name="productType">
                            <?php
//                            var_dump($type);
                            foreach($type as $temp){
                                $id=$temp['typeID'];
                                $name=$temp['typeName'];
                                echo "<option value='$id'>$name</option>";
                            }
                            ?>
                        </select>
                        <label class="">Product Price</label>
                        <input type="text" class="form-control" name="productPrice" placeholder="Product Price" required>
                        <label class="">City</label>
                        <input type="text" class="form-control" name="city" placeholder="City" required>
                        <label class="">Description</label>
                        <input type="text" class="form-control" name="description" placeholder=" Brief Description" required>
                        <fieldset>
                            <legend>Upload Images Of Product</legend>
                                <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img1"><img src="../uploads/NoImage.png" id="img1" height="40px">
                                <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img2"><img src="../uploads/NoImage.png" id="img2" height="40px">
                                <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img3"><img src="../uploads/NoImage.png" id="img3" height="40px">
                                <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img4"><img src="../uploads/NoImage.png" id="img4" height="40px">
                        </fieldset>
<!--                        <input type="hidden" name="userName" value="--><?php //echo $_SESSION['user'];?><!--">-->
<!--                        <input type="hidden" name="userID" value="--><?php //echo $_SESSION['userID'];?><!--">-->
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="add" value="Submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>