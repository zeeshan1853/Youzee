$(document).ready(function () {

    //************* Model for index page ***********//
    $('.popup-top-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });
    //************* End Model for index page ***********//

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
    })

    //************* End Accordian for FAQs ***********//

    //********* Add FAQs ***********//
    $.ajax({
        url:"getFAQs.php",
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            json_response=$.parseJSON(data);
            var i=0;
            $.each( json_response, function( key, value ) {
                $.each(value,function(again_key,again_value){
                    if(again_key=='question'){
                        console.log(again_value);
                        //$("<h1 class='text-primary question'> Question : "+again_value+"</h1>").appendTo('#faq');
                        $("<div class='panel panel-custom' id='"+i+++"'>"+
                            "<div class='panel-heading' role='tab' >"+
                            "<h4 class='panel-title'>"+
                            "<a data-toggle='collapse' data-parent='#accordion' href='#"+i+50+"' aria-expanded='true' aria-controls='collapseOne'>"+
                            "<i class='glyphicon glyphicon-plus'></i>"+again_value+
                            "</a>"+
                            "</h4>"+
                            "</div>"+
                            "</div>").appendTo('#accordion');
                    }
                    if(again_key=='answer'){
                        console.log("Answer :"+again_value);
                        //$("<li class='text-primary '> &nbsp;"+again_value+" <br></li>").appendTo('#faq');
                        var current=i-1;
                        $("<div id='"+i+50+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne'>"+
                            "<div class='panel-body animated zoomOut'>"+
                            again_value+
                            "</div>"+
                            "</div>").appendTo('#'+current);
                    }
                });
            });
            if(json_response.error){
                console.log(json_response.error.msg);
                alert(json_response.error.msg);
            }

        },
        error: function(){
            alert("Ajax call error in custom.js")
        }
    });

    $('#signup_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url:"Admin/signup_form_handler.php",
            type:"post",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
//						alert(data);
                abc=$.parseJSON(data);
                if(abc.error){
                    alert(abc.error.msg);
                }else if(abc.verified){
                    alert(abc.verified.msg);
                }

            },
            error: function(){
                alert("Ajax call error in custom.js")
            }
        });
    });

    //********** Start Login Form handler ***********//
    $('#login_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url:"Admin/login_handler.php",
            type:"post",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                json_response=$.parseJSON(data);
                if(json_response.verified){
                    console.log(json_response.verified.name);
                    window.location.replace("products.php");
                }
                if(json_response.error){
                    console.log(json_response.error.msg);
                    alert(json_response.error.msg);
                }

            },
            error: function(){
                alert("Ajax call error in custom.js")
            }
        });
    })
    //********** End Login Form handler ***********//

    //************* Start Forget Password ajax handler ***********//
    $('#forgetPassword_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url:"forgetPassword.php",
            type:"post",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
                console.log(data);
                json_response=$.parseJSON(data);
                if(json_response.verified){
                    alert(json_response.verified.msg);
                    console.log(json_response.verified.msg);
                }
                if(json_response.error){
                    console.log(json_response.error.msg);
                    alert(json_response.error.msg);
                }

            },
            error: function(){
                alert("Ajax call error in custom.js")
            }
        });
    })
    //************* End Forget Password ajax handler ***********//
})
