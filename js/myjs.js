$(document).ready(function(){
	$('.slider').slider({height: 500});
	$('.sidenav').sidenav();
    $('.dropdown-trigger').dropdown({ hover: true ,alignment : 'left',coverTrigger: false, constrainWidth: false});
    $('.materialboxed').materialbox();
    $('select').formSelect();
    $('.modal').modal();
    $('.collapsible').collapsible();
    $('.modal').modal();
    $('.fixed-action-btn').floatingActionButton({
        direction: 'left',
        hoverEnabled: false
    });
    
    $("input#entee, textarea#textar, input#phonenumber, textarea#review").characterCounter();
    
    

    $('.carousel').carousel({
        dist : -10,
        padding : 30,
        shift : 20
    });
    var ccolor = -1;
    var chm1 = -1;
    var chm2 = -1;
    var chm3 = -1;

    var charmcheck = -1;
    var charmcheck2 = -1;
    //carosel
    // var elems = document.querySelectorAll('.carousel');
    // var instance = M.Carousel.getInstance(elems);
    // instance.next(3);

    // $('#prev').click(() => $(".carousel").carousel("next"));

    autoplay()   
    function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
    }

    $('.carousel-item').click(function(){
        // $('.carousel').carousel('next');
//        console.log($(this).attr("href") );
        $(location).attr('href', $(this).attr("href"));
    });
    
    $('#buy').click(function(){
        $.get("php/inip.php", function(data, status){
            if(data=="done"){
                $(location).attr('href', 'order.php');
            }else{
                M.toast({html: 'Login to continue!', classes: 'rounded toast-mod'});
            }
            console.log(data);
        });        
    });
    
    //color chip init
    if ($(".chip-border")[0]){
        console.log("it does");
        var tmp = $(".chip-border").first();        
        tmp.css('border', "solid 2px black");
        var img_type = tmp.attr("value");
        ccolor = img_type;
        console.log(ccolor);
    }

    //checking if charm is available or not
    if ($(".charmone-chip")[0]){
        charmcheck = 1;
    }

    if ($(".charmtwo-chip")[0]){
        console.log(charmcheck2);
        charmcheck2 = 1;
    }

    //cus color select
    $('.chip-border').click(function(){        
//        var img = .find(".sideimg");
        var img_type = $(this).attr("value");
        ccolor = img_type;
        console.log(ccolor);
        
        // console.log(img_type);
        $('.chip-border').css("border", "none");
        $(this).css('border', "solid 2px black");
        // $("#productimage").attr('src',img_type);
    });

    //charm 1
    $('.charmone-chip').click(function(){

        var img_type = $(this).attr("value");
        chm1 = img_type;
        console.log("charmon1 " + chm2);

        $('.charmone-chip').css("border", "none");
        $(this).css('border', "solid 2px black");

        $('#charmone_id').empty();
        $('#charmone_id').prepend($(this).html());
        $('.modal').modal('close');
    });

    //charm 2
    $('.charmtwo-chip').click(function(){

        var img_type = $(this).attr("value");
        chm2 = img_type;
        console.log("charmon2 " + chm2);

        $('.charmtwo-chip').css("border", "none");
        $(this).css('border', "solid 2px black");

        $('#charmtwo_id').empty();
        $('#charmtwo_id').prepend($(this).html());
        $('.modal').modal('close');
    });

    //charm 2
    $('.charmex-chip').click(function(){

        var img_type = $(this).attr("value");
        chm3 = img_type;
        console.log("charmonex " + chm2);

        $('.charmex-chip').css("border", "none");
        $(this).css('border', "solid 2px black");

        $('#charmex_id').empty();
        $('#charmex_id').prepend($(this).html());
        $('.modal').modal('close');
    });

    
    //side image change on click
    $('.sideimg').click(function(){        
//        var img = .find(".sideimg");
        var img_type = $(this).attr("src"); 
//        console.log(img_type);
        $('.sideimg').css("border", "none");
        $(this).css('border', "solid 2px black");
        $("#productimage").attr('src',img_type);
    });
    

    //adding address
    $('#review-form').submit(function (e) {
        e.preventDefault();
        console.log($('textarea#review').val());
        if( $('textarea#review').val() != ""){
            $.ajax({
                type: $('#review-form').attr('method'),
                url: $('#review-form').attr('action'),
                data: $('#review-form').serialize(),
                success: function (data) {
                    //console.log('Submission was successful.');
                    // console.log(data);
                    if(data==="done"){                                        
                        $('#review-form').trigger("reset");
                        location.reload();
                    }else{
                        M.toast({html: data, classes: 'rounded toast-mod'});
                        // console.log(data);
                    }
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });    
        } else{
            M.toast({html: "Pleases fill all the details", classes: 'rounded toast-mod'});
        }
        
    });

    $('#rpas-field').toggle();
    $('#fail-f').toggle();
    //forgot password
    $('#forgot-pass-form').submit(function (e) {
        e.preventDefault();
        

        // console.log("hee");

        $.ajax({
            type: $('#forgot-pass-form').attr('method'),
            url: $('#forgot-pass-form').attr('action'),
            data: $('#forgot-pass-form').serialize(),
            success: function (data) {
                console.log(data);
                
                if(data.trim()=="found"){                                        
                    $('#forgot-pass-form').trigger("reset");
                    $('#rpas-field').show();
                    $('#fail-f').hide()
                    console.log(data+" k");
                    // location.reload();
                }else{
                    M.toast({html: data, classes: 'rounded toast-mod'});
                    $('#rpas-field').hide();
                    $('#fail-f').show();
                    // console.log(data);
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
        
    });

    //adding address
    $('#addadres').submit(function (e) {
        e.preventDefault();
        pno = $('#phonenumber').val();
        if(pno.length==10){
            $.ajax({
                type: $('#addadres').attr('method'),
                url: $('#addadres').attr('action'),
                data: $('#addadres').serialize(),
                success: function (data) {
                    //console.log('Submission was successful.');
                    console.log(data);
                    if(data==="done"){                                        
                        $('#addadres').trigger("reset");
                        location.reload();
                    }else{
                        M.toast({html: 'Try again after some time', classes: 'rounded toast-mod'});
                        console.log(data);
                    }
                },
                error: function (data) {
                    console.log('An error occurred.');
                    console.log(data);
                },
            });
        }else{
            M.toast({html: 'Phone number must be of 10 digits only', classes: 'rounded toast-mod'});
        }
        
    });
    
    //checking promo code
	$('#promocode-form').submit(function (e) {
        e.preventDefault();
        
        M.toast({html: 'Checking promocode', classes: 'rounded toast-mod'});
        
        $.ajax({
            type: $('#promocode-form').attr('method'),
            url: $('#promocode-form').attr('action'),
            data: $('#promocode-form').serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                // console.log(data);
                if(data==="done"){
                    M.toast({html: 'Promocode Applied', classes: 'rounded toast-mod'});                    
                    $('#promocode-form').trigger("reset");                    
                    location.reload();
                }else{
                    M.toast({html: data, classes: 'rounded toast-mod'});
                    console.log(data);
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
    
    
    //bulk form 
    $('#bulk-form').submit(function (e) {

        pno = $('#phonenumber').val();

        if(pno.length==10){
            M.toast({html: 'Alright', classes: 'rounded toast-mod'});
        }else{
            M.toast({html: 'Phone number must be of 10 digits only', classes: 'rounded toast-mod'});
            event.preventDefault();
        }
         
    });
    
    //checking if address is selected
    $('#pay-form').submit(function (e) {
//        e.preventDefault();
        var rad = $('input[name=group1]:checked').val();
//        console.log(rad);
        if(rad != undefined){
            M.toast({html: 'Alright', classes: 'rounded toast-mod'});
        }else{
            M.toast({html: 'Please add address', classes: 'rounded toast-mod'});
            event.preventDefault();
        }
         
    });
    
    
    //for register
    $('#register-form').submit(function (e) {
        e.preventDefault();
        pno = $('#phonenumber').val();
        
        if(pno.length==10){
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var chk = regex.test($('#email').val());
            console.log(chk);
            if(chk){
                $.ajax({
                    type: $('#register-form').attr('method'),
                    url: $('#register-form').attr('action'),
                    data: $('#register-form').serialize(),
                    success: function (data) {
                        //console.log('Submission was successful.');
                        //console.log(data);
                        if(data==="done"){
                            M.toast({html: 'Registered successfully', classes: 'rounded toast-mod'});
                            M.toast({html: 'Login to continue...', classes: 'rounded toast-mod'});
                            $('#register-form').trigger("reset");
                            $(location).attr('href', 'login.html');
                        }else{
                            M.toast({html: 'Try again after some time', classes: 'rounded toast-mod'});
                            console.log(data);
                        }
                    },
                    error: function (data) {
                        console.log('An error occurred.');
                        console.log(data);
                    },
                });
            }else{
                M.toast({html: 'Enter valid email address', classes: 'rounded toast-mod'});    
            }
        }else{
            M.toast({html: 'Phone number must be of 10 digits only', classes: 'rounded toast-mod'});
        }
                
    });
    
    
    //ajax for login
	$('#login-form').submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: $('#login-form').attr('method'),
            url: $('#login-form').attr('action'),
            data: $('#login-form').serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                //console.log(data);
                if(data==="found"){
                    // $("#loginModal-id").hide();
                    // $("#user-id").show();
                    M.toast({html: 'Login successfully', classes: 'rounded toast-mod'});
                    //$("#userl").prepend($.cookie("username"));                    
                    $('#login-form').trigger("reset");                    
                    $(location).attr('href', 'index.php');
                }else{
                    M.toast({html: 'Invalid username or passwords', classes: 'rounded toast-mod'});
                    console.log(data);
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
    });
    
    var addtoc = -1;
    $('#adtocart').click(function(){
        // alert($('#adtocart').attr("value"));
        //console.log($('#adtocart').attr("value"));
        if(addtoc==-1){
            addtoc = 1;            
            //img 1
            var fcheck = null;
            try {
                var file_data = $('#file').prop('files')[0];                
                fcheck = "not";
            }catch(err) {
                var file_data = undefined;            
            }

            //img 2
            var fcheck2 = null;
            try {
                var file_data2 = $('#file2').prop('files')[0];                
                fcheck2 = "not";
            }catch(err) {
                var file_data2 = undefined;            
            }

            //img 3
            var fcheck3 = null;
            try {
                var file_data3 = $('#file3').prop('files')[0];                
                fcheck3 = "not";
            }catch(err) {
                var file_data3 = undefined;            
            }

            var catid = $('#category').val();
            var colorid = $('#prodcolor').val();
            var ctxt = $('#entee').val();
            
            var crm1 = $('#chrm1').val();
            var crm2 = $('#chrm2').val();
            var crm3 = $('#chrm3').val();
                        

    //        console.log(file_data);
    //        console.log(catid);
    //        console.log(colorid);
    //        console.log(ctxt);

            var form_data = new FormData();

            if (document.cookie.indexOf('username') == -1 ) {
                M.toast({html: 'Login to add to cart', classes: 'rounded toast-mod'});
                addtoc = -1;
            }else if(ctxt === null || ctxt==""){
                M.toast({html: 'Please enter custom text', classes: 'rounded toast-mod'});
                addtoc = -1;
            }else if(fcheck == "not" && file_data === undefined){
                M.toast({html: 'Please upload the image 1', classes: 'rounded toast-mod'});
                addtoc = -1;
            }else if(fcheck2 == "not" && file_data2 === undefined){
                M.toast({html: 'Please upload the image 2', classes: 'rounded toast-mod'});
                addtoc = -1;
            }else if(fcheck3 == "not" && file_data3 === undefined){
                M.toast({html: 'Please upload the image 3', classes: 'rounded toast-mod'});
                addtoc = -1;
            }
            else if( charmcheck == "1" &&  chm3!= "-1" && (chm1 == "-1" || chm2 == "-1") ){ 
                M.toast({html: 'Please Select charm 1 and charm 2 then extra charm', classes: 'rounded toast-mod'});
                addtoc = -1;                
            }else if( chm1 == "-1" && charmcheck == "1"){
                // console.log(chm1 + "  " + chm2 + "  " + chm3);
                M.toast({html: 'Please select charm 1', classes: 'rounded toast-mod'});
                addtoc = -1;
            }else if( chm2 == "-1" && charmcheck2 == "1"){
                M.toast({html: 'Please select charm 2', classes: 'rounded toast-mod'});
                addtoc = -1;
            } else{

    //            console.log(catid);
    //            console.log(ctxt);
                var lim = $('#entee').attr("data-length");
                console.log(lim);
                form_data.append('id', $('#adtocart').attr("value"));
                
                
                if( ccolor != '-1'){
                    form_data.append('colorid', ccolor);    
                }
                if ( ctxt != undefined ){
                    ctxt = ctxt.substring(1, lim);
                    form_data.append('ctxt', ctxt);    
                }

                if(fcheck != null){
                    form_data.append('file', file_data);   
                    M.toast({html: 'Uploading image...', classes: 'rounded toast-mod'});
                }
                if(fcheck2 != null){
                    form_data.append('file2', file_data2);                       
                }
                if(fcheck3 != null){
                    form_data.append('file3', file_data3);                       
                }

                // console.log(chm1 + "  " + chm2 + "  " + chm3);
                if(chm1 != "-1"){
                    form_data.append('crm1', chm1);   
                }
                if(chm2 != "-1"){
                    form_data.append('crm2', chm2);   
                }
                if(chm3 != "-1"){
                    form_data.append('crm3', chm3);   
                }
                
                M.toast({html: 'Adding to cart...', classes: 'rounded toast-mod'});
                M.toast({html: 'Please wait!', classes: 'rounded toast-mod'});
                
                $.ajax({
                    url: 'php/addtocart.php', // point to server-side controller method
                    dataType: 'text', // what to expect back from the server
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function (response) {
                        //$('#msg').html(response); // display success response from the server
                        console.log(response);
                        if (response=="done"){
                            M.toast({html: 'Product added to cart', classes: 'rounded toast-mod'});
                            setTimeout(
                            function() 
                            {
                                addtoc = -1;
                                location.reload();
                            }, 2000);
                            
                            
                        }else{
                            M.toast({html: response, classes: 'rounded toast-mod'});
                            addtoc = -1;
                        }
                    },
                    error: function (response) {
                        //$('#msg').html(response); // display error response from the server
                        M.toast({html: 'Something went wrong!!!', classes: 'rounded toast-mod'});
                        console.log(response);
                        addtoc = -1;
                    }
                });                        

            }
        }else{
            M.toast({html: 'Please wait!', classes: 'rounded toast-mod'});
        }
    });
    
    $('#chrm3').change(function () {
//         $('#listbox-taskStatus option:selected').attr('status')
        var p = parseFloat($('#aprice').text());
        var ex = parseInt($('#chrm3 option:selected').attr('price'));
        p = p+ex;
        
        $('#aprice').empty();
        $('#aprice').append(" "+p);
//        console.log(p);
//        console.log($('#chrm3 option:selected').attr('price'));
    });
    
    
    //cart qty update
    $('[id="qtys"]').change(function(){
        //alert("The text has been changed."+ $(this).val() + " " + $(this).attr('name'));
        var id = $(this).attr('name');
        var q = $(this).val();
        
        
        $.post("php/updatecart.php",
        {
            cid: id,
            qty: q
        },
        function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            if (data=="done") {
                M.toast({html: 'Updated', classes: 'rounded toast-mod'});
                console.log(data + " update");
                
                $.post("php/getprice.php",
                {
                    cid: id,
                    qty:q
                },
                function(data, status){
                    console.log(data);
                    $('#p1').html(data);
                    $('#p2').html(data);
                    location.reload();
                    //console.log("okay");
                });        
                
            }else if(data=="no"){
                M.toast({html: data, classes: 'rounded toast-mod'});
                //console.log(data);
            }else{
                M.toast({html: "Not updated", classes: 'rounded toast-mod'});
                //console.log(data);
            }
        });
        
        
    });
    
    $('[id="remov"]').click(function(){
        //alert("The text has been changed."+ $(this).val() + " " + $(this).attr('name'));
        var id = $(this).attr('value');        
        
        console.log(id);
        
        $.post("php/delcart.php",
        {
            id: id
        },
        function(data, status){
            if(status=="success"){
                if(data=="done"){
//                        alert("");
                    M.toast({html: 'Product removed', classes: 'rounded toast-mod'});
                    location.reload();
                }else{
                    alert(data);
                }
            }else{
                M.toast({html: 'Something went wrong!!!', classes: 'rounded toast-mod'});
            }

        }); //end post
    });
    
});