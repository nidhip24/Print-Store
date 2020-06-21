$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.custab').tabs();
    $('select').formSelect({dropdownOptions:{hover:true}});
    $('.tabs').tabs();
    $('.collapsible').collapsible();

    $('.datepicker').datepicker({
        format : 'yyyy-m-d',
        showClearBtn : true
    });
    
    $('#cat2').change(function () {
        console.log($('#cat2').val());
    });

    //update content - control
    $('.con-cla').submit(function (e) {
        e.preventDefault();
        console.log("aaa");

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                console.log(data);
                if(data==="done"){
                    M.toast({html: data, classes: 'rounded toast-mod'});
                }else{
                    M.toast({html: "failed", classes: 'rounded toast-mod'});
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });

    });

    //payment status form
    $('#check-payment-stat').submit(function (e) {
        e.preventDefault();
        
        // console.log(sel);
        
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                console.log(data);
                if(data==="login" || data==="parameter missing" ){                    
                    M.toast({html: data, classes: 'rounded toast-mod'});

                }else{
                    M.toast({html: "got status", classes: 'rounded toast-mod'});
                    $('#stat-content').empty();
                    $('#stat-content').prepend(data);
                    // location.reload();
                    // console.log(data);
                }
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
        });
        
    });

    //update status form
    $('.update-form').submit(function (e) {
        e.preventDefault();
        var sel = $(this).serialize();
        // console.log(sel);
        if (sel.indexOf("stat") >= 0) {
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (data) {
                    //console.log('Submission was successful.');
                    console.log(data);
                    if(data==="done"){                    
                        M.toast({html: "updated", classes: 'rounded toast-mod'});
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
        }else{
            M.toast({html: "Please select status", classes: 'rounded toast-mod'});
        }
    });

    //promocode form
    $('#promo-form').submit(function (e) {
        e.preventDefault();
        
        $.ajax({
            type: $('#promo-form').attr('method'),
            url: $('#promo-form').attr('action'),
            data: $('#promo-form').serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                // console.log(data);
                if(data==="done"){                                        
                    $('#promo-form').trigger("reset");
                    M.toast({html: "Added", classes: 'rounded toast-mod'});
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
        
    });

    //delete promocode
    $('.delete-promocode').click(function(){
        if(confirm("Are you sure you want to remove promocode?")) {

            var id = $(this).attr("value");
            
            $.post("php/del-promocode.php",
            {
                id: id
            },
            function(data, status){
                if(status=="success"){
                    if(data=="done"){
//                        alert("");
                        M.toast({html: 'Category Deleted', classes: 'rounded toast-mod'});
                        location.reload();
                    }else{
                        alert(data);
                    }
                }else{
                    M.toast({html: 'Something went wrong!!!', classes: 'rounded toast-mod'});
                }

            }); //end post
        }else{
            console.log("alright");
        } //end else
    });


    //discount address
    $('#discount-form').submit(function (e) {
        e.preventDefault();
        
        $.ajax({
            type: $('#discount-form').attr('method'),
            url: $('#discount-form').attr('action'),
            data: $('#discount-form').serialize(),
            success: function (data) {
                //console.log('Submission was successful.');
                // console.log(data);
                if(data==="done"){                                        
                    $('#discount-form').trigger("reset");
                    M.toast({html: "Added", classes: 'rounded toast-mod'});
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
        
    });

    //delete discount
    $('.delete-discount').click(function(){
        if(confirm("Are you sure you want to remove discout?")) {

            var id = $(this).attr("value");
            
            $.post("php/del-discount.php",
            {
                id: id
            },
            function(data, status){
                if(status=="success"){
                    if(data=="done"){
//                        alert("");
                        M.toast({html: 'Category Deleted', classes: 'rounded toast-mod'});
                        location.reload();
                    }else{
                        alert(data);
                    }
                }else{
                    M.toast({html: 'Something went wrong!!!', classes: 'rounded toast-mod'});
                }

            }); //end post
        }else{
            console.log("alright");
        } //end else
    });


    //delete category
    $('.delete-cat').click(function(){
        if(confirm("Are you sure you want to delete this category?")) {

            var id = $(this).attr("value");
            
            $.post("php/delcat.php",
            {
                id: id
            },
            function(data, status){
                if(status=="success"){
                    if(data=="done"){
//                        alert("");
                        M.toast({html: 'Category Deleted', classes: 'rounded toast-mod'});
                        location.reload();
                    }else{
                        alert(data);
                    }
                }else{
                    M.toast({html: 'Something went wrong!!!', classes: 'rounded toast-mod'});
                }

            }); //end post
        }else{
            console.log("alright");
        } //end else
    });
    
    //delete product
    $('.delete-produ').click(function(){
        if(confirm("Are you sure you want to delete this product?")) {
//            console.log($(this).attr("value") );    
            var id = $(this).attr("value");
            
            $.post("php/delproduct.php",
            {
                id: id
            },
            function(data, status){
                if(status=="success"){
                    if(data=="done"){
//                        alert("");
                        M.toast({html: 'Product Deleted', classes: 'rounded toast-mod'});
                        location.reload();
                    }else{
                        alert(data);
                    }
                }else{
//                    alert("Something went wrong!!!");
                    M.toast({html: 'Something went wrong!!!', classes: 'rounded toast-mod'});
                }

            }); //end post
        }else{
            console.log("alright");
        } //end else
        
    });
    
     //add sub category
	$('#addsubcate').submit(function (e) {
        e.preventDefault();
        var form_data = new FormData();
        var file_data = $('#file').prop('files')[0];
        
        form_data.append('name',$('#cname').val());
        form_data.append('cat',$('#cat').val());
        form_data.append('des',$('#des').val());
//        console.log($('#cat').val());
        form_data.append('file', file_data);
        
        
        $.ajax({
            type: $('#addsubcate').attr('method'),
            url: $('#addsubcate').attr('action'),
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function (data) {
                //console.log('Submission was successful.');
                //console.log(data);
                if(data==="done"){
                    // $("#loginModal-id").hide();
                    // $("#user-id").show();
                    M.toast({html: 'Sub category added', classes: 'rounded toast-mod'});
                    //$("#userl").prepend($.cookie("username"));                    
                    $('#addsubcate').trigger("reset");                    
                    $(location).attr('href', 'index.php#manage-cat');                    
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
    });
    

    //product add form
    $('#product-add-form').submit(function (e) {
        e.preventDefault();
        var form_data = new FormData();
        var file_data = $('#file1').prop('files')[0];
        var file_data2 = $('#file2').prop('files')[0];
        var file_data3 = $('#file3').prop('files')[0];
        var file_data4 = $('#file4').prop('files')[0];
        var file_data5 = $('#file5').prop('files')[0];
        var file_data6 = $('#file6').prop('files')[0];
        
        form_data.append('name',$('#pname').val());
        form_data.append('price',$('#price').val());
        form_data.append('des',$('#ades').val());
        form_data.append('cat2',$('#cat2').val());
        form_data.append('photo',$('#phot').val());
//        console.log($('#cat').val());
        form_data.append('file1', file_data);
        form_data.append('file2', file_data2);
        form_data.append('file3', file_data3);
        form_data.append('file4', file_data4);
        form_data.append('file5', file_data5);
        form_data.append('file6', file_data6);
        
        
        $.ajax({
            type: $('#product-add-form').attr('method'),
            url: $('#product-add-form').attr('action'),
            dataType: 'text', // what to expect back from the server
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function (data) {
                //console.log('Submission was successful.');
                //console.log(data);
                if(data==="done"){
                    // $("#loginModal-id").hide();
                    // $("#user-id").show();
                    M.toast({html: 'Product added', classes: 'rounded toast-mod'});
                    //$("#userl").prepend($.cookie("username"));                    
                    $('#product-add-form').trigger("reset");                    
                    $(location).attr('href', 'index.php#add-prod');                    
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
    });
    
});