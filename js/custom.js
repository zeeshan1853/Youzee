$(document).ready(function(){

    //************* Start Accordian for FAQs ***********//
    $(function() {

        function toggleChevron(e) {
            $(e.target)
                .prev('.panel-heading')
                .find("i")
                .toggleClass('rotate-icon');
            $('.panel-body.animated').toggleClass('zoomIn zoomOut');
        }

        $('#accordion').on('hide.bs.collapse', toggleChevron);
        $('#accordion').on('show.bs.collapse', toggleChevron);
    });

    //************* End Accordian for FAQs ***********//


    //************* Start Logout ajax handler ***********//
    $('#logout').click(function(evt) {
        evt.preventDefault();
        $.ajax({
            url:'Admin/logout_handler.php',
            success: function (response) {
                console.log(response);
                window.location.href="index.php";
                //location.reload();
            },
            error: function () {
                alert("Error in ajax");
            }
        });

    });
    //************* End Logout ajax handler ***********//

    //************* Start Image preview *************//
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img1').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    function readURL2(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img2').attr('src', e.target.result);
            };

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

    //************* Start Add new Product *************//
    $("#add-product-form").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url:"add-product-post.php",
            type:"post",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                //alert(data);
                location.reload();
                $('#myModal').modal('toggle');
            },
            error: function(){
                alert("Ajax call error in custom.js");
            }
        });
    })
    //************* End Add new Product *************//
//    $("#uploadForm").on('submit',(function(e) {
//        e.preventDefault();
//        $.ajax({
//            url: "temp.php",
//            type: "POST",
//            data:  new FormData(this),
//            contentType: false,
//            cache: false,
//            processData:false,
//            success: function(data){
////			$("#gallery").html(data);
//                alert(data);
//            },
//            error: function(){}
//        });
//    }));


    // add search input to every field
    $('#example tfoot  th').each( function () {
        var title = $(this).text();
        if(title==='photo1'){
//                $(this).html( '<input type="text" placeholder="Search '+title+'" disabled/>' );
            $(this).empty();
        }else{
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        }

    } );

    var table=$('#example').DataTable( {
        "responsive": true,
        "processing": true,
//            "serverSide": true,
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
            { "data": "photo1"}

        ],

        "columnDefs": [ {
            "targets": 8,
            "data": "photo1",
            "render": function ( data, type, full, meta ) {return '<img src="uploads/'+data+'" class="img-responsive" width="70px">';},
        },
            { targets: [0,2], visible: false},
            { "bSortable": false, "aTargets": [ 7 ] },
        ],
        "order": [[ 0, "desc" ]]
    } );


    // Apply the search
    table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    // Check which row is selected
    $('#example tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        console.debug(data);
//            alert(data['itemID']);
        window.location.href = "details.php?id="+data['itemID'];
//            alert( 'You clicked on '+data[1]+'\'s row' );
    } );


    function abc(table_name){
        alert(table_name);
    table_name.DataTable( {
            "responsive": true,
            "processing": true,
//            "serverSide": true,
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
                { "data": "photo1"}
            ],

            "columnDefs": [ {
                "targets": 7,
                "data": "photo1",
                "render": function ( data, type, full, meta ) {return '<img src="uploads/'+data+'" class="img-responsive" width="70px">';},
            },
                { targets: [0,2], visible: false},
                { "bSortable": false, "aTargets": [ 7 ] },
            ]
        } );
    }

});