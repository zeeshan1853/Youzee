<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../css/default.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container-fluid">

</div>
<form>

    <div class="container">
        <div class="col-md-6">
            <input type="text" id="datepicker-example14" class="form-control" >
        </div>
        <div class="col-md-6">
            <input type="text" id="datepicker-example14" class="form-control  zb-picker" >
        </div>
    </div>

</form>
<table class="table table-responsive" id="dataTable">
    <thead>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Price</th>
        <th>City</th>
        <th>Description</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody >

    </tbody>
</table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="width: 100% !important;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center" style="color: black">Item</h4>
            </div>

            <form class="form" role="form" action="addProduct.php" method="POST" id="edit_form" enctype="multipart/form-data">
                <!-- Modal Body-->
                <div class="modal-body">

                    <div class="">
                        <input type="hidden" name="itemID" value="">
                        <label class="">Product Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Product Name" required>
                        <label class="">Product Type</label>
                        <select class="form-control" name="productType">
                            <?php include('../getProductsType.php');
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
                            <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img1"><ig src="../uploads/1.jpg" id="img1" height="40px">
                            <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img2"><img src="../uploads/2.jpg" id="img2" height="40px">
                            <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img3"><img src="../uploads/3.jpg" id="img3" height="40px">
                            <input type="file" style="display: inline-block" accept="image/*" name="img[]" id="input_img4"><img src="../uploads/4.jpg" id="img4" height="40px">
                        </fieldset>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="add" value="Submit">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/zebra_datepicker.js" type="text/javascript"></script>

<script>
    $.ajax(
        {
            url:"getItems.php",
            success:function(response){
                var returnedData = JSON.parse(response);
//                        alert(returnedData);
                var len = returnedData.length;
                if(len==0){
                    alert("No Record Found");
                }
                $("#dataTable > tbody:last").children().remove();


                $.each(returnedData, function (key, val) {
                    $('#dataTable').append('<tr class="clickable-row" data-href="details.php?number='+val.ItemID+'">' +
                        '<td>'+val.ItemName+'</td>' +
                        '<td>'+val.TypeName+'</td>' +
                        '<td>'+val.Price+'</td>' +
                        '<td>'+val.City+'</td>' +
                        '<td>'+val.Description+'</td>' +
                        '<td> <img src="../uploads/'+val.Photo1+'" width="100" height="50" class="cell-fluid" /></td>' +
                        '<td>' +
                            '<div class="btn-group">'+
                            '<button type="button" class="btn btn-primary edit" value="'+val.ItemID+'" >Edit</button>'+
                            '<button type="button" class="btn btn-success detail" value="'+val.ItemID+'">Detail</button>'+
                            '<button type="button" class="btn btn-danger delete" value="'+val.ItemID+'">Delete</button>'+
                            '</div>'+
                         '</td>'+
                        '</tr>');

                });
                $('#dataTable').trigger("update")
            }
        }
    );
</script>
<script>
    jQuery(document).ready(function($) {

        $('#datepicker-example14').Zebra_DatePicker();
        $('.zb-picker').Zebra_DatePicker();

        //************* Start Image preview *************//
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL3(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img3').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL4(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img4').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#input_img1").change(function(){
             readURL(this);
        });
        $("#input_img2").change(function(){
            readURL2(this);
        });
        $("#input_img3").change(function(){
            readURL3(this);
        });
        $("#input_img4").change(function(){
            readURL4(this);
        });
        //************* Start Image preview *************//

        //************* Start edit option Handling ************//
        $('.edit').click(function(){
            var selectedItem=$(this).attr("value");
            $('#myModal').modal('show');
            $.ajax(
                {
                    url:"getItems.php/?itemID="+selectedItem,
                    success:function(response){
                        var returnedData = JSON.parse(response);
                        $.each(returnedData, function (key, val) {
                            $('input[name="itemID"]').val(val.ItemID)
                            $('input[name="name"]').val(val.ItemName)
                            $('input[name="productPrice"]').val(val.Price)
                            $('input[name="city"]').val(val.City)
                            $('input[name="description"]').val(val.Description)
                            var img1=(val.Photo1 !== "")? val.Photo1 : "NoImage.png";
                            var img2=(val.Photo2 !== "")? val.Photo2 : "NoImage.png";
                            var img3=(val.Photo3 !== "")? val.Photo3 : "NoImage.png";
                            var img4=(val.Photo4 !== "")? val.Photo4 : "NoImage.png";

                            $('#img1').attr('src','../uploads/'+img1);
                            $('#img2').attr('src','../uploads/'+img2);
                            $('#img3').attr('src','../uploads/'+img3);
                            $('#img4').attr('src','../uploads/'+img4);

                        });
                    }

                }
            );

        })

        /************ Detail option Handling **************/
        $('.detail').click(function(){
            window.location.href ="details.php/?number="+$(this).attr("value");

        })
        /************ End Detail option Handling **************/

        //*********** Start Delete option Handling *************//
        $('.delete').click(function(){
            var selectedItem=$(this).attr("value");
            $.ajax(
                {
                    url:"deleteItem.php/?itemID="+selectedItem,
                    success:function(response){
//                        alert(response);
                        $.ajax(
                            {
                                url:"getItems.php",
                                success:function(response){
                                    var returnedData = JSON.parse(response);
//                        alert(returnedData);
                                    var len = returnedData.length;
                                    if(len==0){
                                        alert("No Record Found");
                                    }
                                    $("#dataTable > tbody:last").children().remove();


                                    $.each(returnedData, function (key, val) {
                                        $('#dataTable').append('<tr class="clickable-row" data-href="details.php?number='+val.ItemID+'">' +
                                            '<td>'+val.ItemName+'</td>' +
                                            '<td>'+val.TypeName+'</td>' +
                                            '<td>'+val.Price+'</td>' +
                                            '<td>'+val.City+'</td>' +
                                            '<td>'+val.Description+'</td>' +
                                            '<td> <img src="../uploads/'+val.Photo1+'" width="100" height="50" class="cell-fluid" /></td>' +
                                            '<td>' +
                                            '<div class="btn-group">'+
                                            '<button type="button" class="btn btn-primary edit" value="'+val.ItemID+'" >Edit</button>'+
                                            '<button type="button" class="btn btn-success detail" value="'+val.ItemID+'">Detail</button>'+
                                            '<button type="button" class="btn btn-danger delete" value="'+val.ItemID+'">Delete</button>'+
                                            '</div>'+
                                            '</td>'+
                                            '</tr>');

                                    });
                                    $('#dataTable').trigger("update")
                                }
                            }
                        );
                    }

                }
            );

        })
        //*********** End Delete option Handling *************//


        //*********** Start Edit Form Handling *************//
        $('#edit_form').on('submit', function (e) {
            $.ajax({
                url:"updateProduct.php",
                type:"post",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    alert(data);
//                    $('#myModal').modal('toggle');
//                    table.ajax().reload();
//                    table.ajax.reload();
                },
                error: function(){
                    alert("Ajax call error in custom.js")
                }
            });
            e.preventDefault();
        })
        //*********** Start Edit Form Handling *************//
    });
</script>
</body>
</html>