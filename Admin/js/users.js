$(document).ready(function () {
$('#response_alert').hide();
    $('#logout').click(function(evt) {
        evt.preventDefault();
        $.ajax({
            url:'logout_handler.php',
            success: function (response) {
                location.reload();
            },
            error: function () {
                alert("Error in ajax");
            }
        });

    });


    //************* Start Display Products ******************//
    var table=$('#users_table').DataTable( {
        "responsive": true,
        "processing": true,
        "iDisplayLength": 6,
        "aLengthMenu": [[6, 10,25, 50, 100, -1], [6,10, 25, 50, 100, "All"]],
        "ajax": "include/getUsers.php",
        "columns": [
            { "data": "userID" },
            { "data": "userName" },
            { "data": "userEmail" },
            { "data": "role" },
            { "data": "Action" }
        ],

        "columnDefs": [
            {
                "targets": 4,
                "data": "Action",
                "render": function ( data, type, full, meta ) {
//                        return '<button  class="btn btn-success" value="'+data+'">Edit</button>';
                    return '<div class="btn-group">'+
                        '<button type="button" class="btn btn-primary update" value="'+data+'" >Update</button>'+
                        '<button type="button" class="btn btn-danger detail" value="'+data+'">Detail</button>'+
                        '</div>';
                },
            },
            { targets: [0], visible: false},
        ],
        "order": [[ 0, "desc" ]]
    } );

    //************* End Display Products ******************//

    /************ Update button Click  **************/

    $('#users_table tbody').on( 'click', '.update', function () {
        window.location.href ="users.php?reference="+$(this).attr("value");
        //alert($(this).attr('value'));
    } );

    /************ Update Button Click **************/

    /************ Detail button Click  **************/

    $('#users_table tbody').on( 'click', '.detail', function () {
        window.location.href ="users_detail.php?reference="+$(this).attr("value");
        //alert($(this).attr('value'));
    } );

    /************ Detail Button Click **************/

    /************ User Update form handler ********/
    $('#user_update').on('submit', function (e) {
        e.preventDefault();
        //alert('ruk gya');
        $.ajax(
            {
                url:"updateUserHandler.php",
                type:"post",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    //$('#formConfirm').modal('toggle');
                    //alert(data);
                    window.location.href='users.php';
                },
                error: function(){
                    alert("Ajax call error in custom.js")
                }
            });
    });

    /************ faq_form Handler add new FAQ ********/
    $('#faq_form').on('submit', function (e) {
        e.preventDefault();
        //alert('ruk gya');
        $.ajax(
            {
                url:"FAQs_formHandler.php",
                type:"post",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    json_response=$.parseJSON(data);
                    if(json_response.success){
                        $('#response_alert').text(json_response.success.detail);
                        $('#response_alert').show();
                        console.log(json_response.success.detail);
                        //window.location.replace("products.php");
                        //alert(json_response.success.detail);
                    }
                    if(json_response.error){
                        console.log(json_response.error.detail);
                        $('#response_alert').text(json_response.error.detail);
                        $('#response_alert').show();
                        //alert(json_response.error.detail);
                    }
                    //alert(data);
                },
                error: function(){
                    $('#response_alert').text("Ajax call error in custom.js");
                    $('#response_alert').show();
                    //alert("Ajax call error in custom.js")
                }
            });
    })
    /************ End faq_form Handler add new FAQ ********/
})

