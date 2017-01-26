//********* Start Data Table for Date Range Search *************//
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {

        var from = $('#dateFrom').val().split("-");;
        var to = $('#dateTo').val().split("-");;
        var min1 = new Date(from[0], from[1] - 1, from[2]);
        var max1 = new Date(to[0], to[1] - 1, to[2]);
        var dateColumn=data[7].split("-");;
        var tempDate=new Date(dateColumn[0],dateColumn[1]-1,dateColumn[2]);

        var age = parseFloat( data[4] ) || 0; // use data for the Date column

        if ( ( isNaN( min1 ) && isNaN( max1 ) ) ||
            ( isNaN( min1 ) && tempDate <= max1 ) ||
            ( min1 <= tempDate   && isNaN( max1 ) ) ||
            ( min1 <= tempDate   && tempDate <= max1 ) )
        {
            return true;
        }
        return false;
    }
);
//********* End Data Table for Date Range Search *************//
$(document).ready(function (e) {

//************* Start Display Products ******************//
    var table=$('#example').DataTable( {
        "responsive": true,
        "processing": true,
        "iDisplayLength": 6,
        "aLengthMenu": [[6, 10,25, 50, 100, -1], [6,10, 25, 50, 100, "All"]],
        "ajax": "getProducts.php",
        "columns": [
            { "data": "itemID" },
            { "data": "itemName" },
            { "data": "typeID" },
            { "data": "typeProduct" },
            { "data": "price" },
            { "data": "city" },
            { "data": "description" },
            { "data": "date"},
            { "data": "photo1"},
            { "data": "Action"}

        ],

        "columnDefs": [
            {
                "targets": 8,
                "data": "photo1",
                "render": function ( data, type, full, meta ) {return '<img src="../uploads/'+data+'" class="img-responsive" width="70px">';},
            },
            {
                "targets": 9,
                "data": "Action",
                "render": function ( data, type, full, meta ) {
//                        return '<button  class="btn btn-success" value="'+data+'">Edit</button>';
                    return '<div class="btn-group">'+
                        '<button type="button" class="btn btn-primary edit" value="'+data+'" >Edit</button>'+
                        '<button type="button" class="btn btn-success detail" value="'+data+'">Detail</button>'+
                        '<button type="button" class="btn btn-danger delete" value="'+data+'">Delete</button>'+
                        '</div>';
                },
            },
            { targets: [0,2], visible: false},
            { "bSortable": false, "aTargets": [ 8 ] },
        ],
        "order": [[ 0, "desc" ]]
    } );

    //************* End Display Products ******************//

    //************* Start Date Pickers ******************//
    $('#dateFrom').datepicker({ dateFormat: 'yy-mm-dd' });
    $('#dateTo').datepicker({ dateFormat: 'yy-mm-dd' }).datepicker("setDate", new Date());;
    //************* End Date Pickers ******************//

    //************* Start Date Range Search ******************//

    $('#dateFrom, #dateTo').keyup( function() {
        table.draw();
    } ).on("change", function() {
        var startDate=$('#dateFrom').val();
        var endDate=$('#dateTo').val();
        if(startDate>endDate){
            //alert("Start greater than s");
        }else{
            table.draw();
        }
    });
    //************* End Date Range Search ******************//


    /************ Detail option Handling **************/

    $('#example tbody').on( 'click', '.detail', function () {
        window.location.href ="details.php/?number="+$(this).attr("value");
    } );

    /************ End Detail option Handling **************/

    /************ Edit option Handling **************/

    $('#example tbody').on( 'click', '.edit', function () {
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
    } );

    /************ End Edit option Handling **************/


    /************ delete option Handling **************/

    $('#example tbody').on( 'click', '.delete', function () {
        //alert($(this).attr("value"));

        $('#formConfirm').modal('toggle');
        $('#product_name_label').html("Are you sure, you want to delete this ");
        $('input[name="id_delete"]').val($(this).attr("value"));
        //$.ajax(
        //    {
        //        url: "deleteItem.php/?itemID=" + $(this).attr("value"),
        //        success: function (response) {
        //                alert(response);
        //        }
        //    });
    } );

    $('#delete_confirm_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax(
            {
                url:"deleteItem.php",
                type:"post",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    $('#formConfirm').modal('toggle');
                    location.reload();
                },
                error: function(){
                    alert("Ajax call error in custom.js")
                }
            });
    })

    /************ End delete option Handling **************/


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



})
