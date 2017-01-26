$(document).ready(function () {
    $('#logout').click(function(evt) {
        evt.preventDefault();
        $.ajax({
            url:'logout_handler.php',
            success: function (response) {
                window.location.href ="index.php";
            },
            error: function () {
                alert("Error in ajax");
            }
        });

    });

    $('#edit_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url:"updateProduct.php",
            type:"post",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                $('#myModal').modal('toggle');
                location.reload();
            },
            error: function(){
                alert("Ajax call error in custom.js")
            }
        });
        e.preventDefault();
    });

})
