$(document).ready(function(){
    //live search product
    $(".search-icon").on("click",function(){
        $("#live-product").modal('show');
    })
    $("#search_live_product").on("keyup",function(){
        let value = $(this).val();
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                table: "product",
                val: value,
                search_live_product: "search_live_product"
            },
            success: function(res){
                // console.log(res);
                if(res == 0){
                    $("#live-product-show").html("No Result"); 
                }else{
                    $("#live-product-show").html(res);
                }
            }
        });
    });
    // Registration
    $("#reg-form").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "crudhandler.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                $("#reg-form").trigger("reset");
                console.log(res);
                if(res == 1){
                    alert("Data InsertionSuccessfull");
                }else if(res == 2){
                    alert("Password not match");
                }else{
                    alert("Insertion unsuccessfull!!! try again");
                }
            }
        });
    });

    //login user 
    $("#user-login-form").on('submit',function(e){
        e.preventDefault();
        let email = $("#user_id").val();
        let pass = $("#user_pass").val();
        console.log(email);
        $.ajax({
            url: "crudhandler.php",
            type: "POST",
            data: {
                userid: email,
                password: pass,
                login: "user"
            },
            success: function(res){
                console.log(res);
                if(res == 1){
                    // alert("Login Successfull!!!");
                    window.location='http://localhost/web-project/ecomerce/user/user.php';
                }else if(res == 2){
                    alert("Incorrect Email!!!");
                }else{
                    alert("Incorrect Password!!!");
                }
            }
        });
    });

    //login admin
    $("#admin-login-form").on('submit',function(e){
        e.preventDefault();
        let email = $("#admin_id").val();
        let pass = $("#admin_pass").val();
        console.log(email);
        $.ajax({
            url: "crudhandler.php",
            type: "POST",
            data: {
                userid: email,
                password: pass,
                login: "admin"
            },
            success: function(res){
                console.log(res);
                if(res == 1){
                    // alert("Login Successfull!!!");
                    window.location='http://localhost/web-project/ecomerce/admin_panel/admin.php';
                }else if(res == 2){
                    alert("Incorrect Email!!!");
                }else{
                    alert("Incorrect Password!!!");
                }
            }
        });
    });

    //update user
    $("#update-user-form").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                $("#update-user-form").trigger("reset");
                alert("To see changes please logout then login");
                console.log(res);
                if(res == 1){
                    alert("Data Update Successfull");
                }else if(res == 2){
                    alert("Password not match");
                }else{
                    alert("Update unsuccessfull!!! try again");
                }
            }
        });
    });

    //update admin
    $("#update-admin-form").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                $("#update-admin-form").trigger("reset");
                alert("To see changes please logout then login");
                console.log(res);
                if(res == 1){
                    alert("Data Update Successfull");
                }else if(res == 2){
                    alert("Password not match");
                }else{
                    alert("Update unsuccessfull!!! try again");
                }
            }
        });
    });

    //update hero slider images
    $("#addslideform").on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                $("#addslideform").trigger("reset");
                    alert("To see changes please logout then login");
                console.log(res);
                if(res == 1){
                    alert("Slider Update Successfull");
                }else{
                    alert("Update unsuccessfull!!! try again");
                }
                console.log(res);
            }
        });
    });

    //all user display
    $(".all-users-btn").on("click",function(){
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                table: "user",
                show: "user-data"
            },
            success: function(res){
                // console.log(res);
                $("#user-data").html(res);
            }
        });
    });

    //search user
    $("#search_user").on("keyup",function(){
        let value = $(this).val();
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                table: "user",
                val: value,
                search_user: "user-data"
            },
            success: function(res){
                // console.log(res);
                $("#user-data").html(res);
            }
        });
    });
    //search product
    $("#srch_product").on("keyup",function(){
        let value = $(this).val();
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                table: "product",
                val: value,
                srch_product: "srch_product"
            },
            success: function(res){
                // console.log(res);
                $("#product-data").html(res);
            }
        });
    });

    //delete user data
    $(document).on("click",".user-del-btn",function(){
         let id = $(this).data('id');
         let element = this;
         $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                table: "user",
                id: id,
                del_user: "Delete"
            },
            success: function(res){
                if(res == 1){
                    $(element).closest("tr").fadeOut();
                }else{
                    alert("Data Deletion Unsuccessfull!!!");
                }
            }
        });
    })

    //add category
    $("#add-cat").on("click",function(){
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                add_cat: "add-category"
            },
            success: function(res){
                if(res == 1){
                    $("#cat-modal").modal("show");
                }else{
                    alert("Unsuccessfull!!!");
                }
            }
        });
    });
    $("#cat-form").on('submit',function(e){
        e.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res){
                if(res == 1){
                    $("#cat-modal").modal("hide");
                    alert("Category successfuly added")
                    $("#cat-form").trigger("reset");
                    window.location='http://localhost/web-project/ecomerce/admin_panel/admin.php';
                }else{
                    alert("Unsuccessfull!!!");
                }
                console.log(res);
            }
        });
    });

    //add product
    $("#add-product").on("click",function(){
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                add_product: "add-product"
            },
            success: function(res){
                if(res == 1){
                    $("#product-modal").modal("show");
                }else{
                    alert("Unsuccessfull!!!");
                }
            }
        });
    });
    $("#product-form").on("submit",function(e){
        e.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function(res){
                if(res == 1){
                    $("#product-modal").modal("hide");
                    alert("Product successfuly added")
                    $("#product-form").trigger("reset");
                    window.location='http://localhost/web-project/ecomerce/admin_panel/admin.php';
                }else{
                    alert("Unsuccessfull!!!");
                }
                console.log(res);
            }
        });
    });

    //display product
    function display_product(){
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                show_product: "show-product"
            },
            success: function(res){
                $("#product-data").html(res);
                
                // console.log(res);
            }
        });
    }
    display_product();
    // delete product
    $(document).on("click",".product-del-btn",function(){
        var id = $(this).data('id');
        var element = this;
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                id: id,
                del_product: "del-product"
            },
            success: function(res){
               if(res == 1){
                $(element).closest("tr").fadeOut();
               }else{
                alert("delete unsuccessfull!!!");
               }                
                console.log(res);
            }
        });
    })
    //update product
    // $(document).on("click",".product-edit-btn",function(){
    //     var id = $(this).data('id');
    //     $.ajax({
    //         url: "http://localhost/web-project/ecomerce/crudhandler.php",
    //         type: "POST",
    //         data: {
    //             id: id,
    //             edit_product: "edit-product"
    //         },
    //         success: function(res){
    //         //    if(res == 1){
    //         //     $(element).closest("tr").fadeOut();
    //         //    }else{
    //         //     alert("delete unsuccessfull!!!");
    //         //    }                
    //             console.log(res);
    //         }
    //     });  
    // })
    //add to bag
    $("#add-bag").on("click",function(e){
        e.preventDefault();
        var id = $(this).data("id");
        // alert(id);
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                pid: id,
                bag: "add_to_bag"
            },            
            success: function(res){
                console.log(res);
                if(res != 0){
                    window.location=`http://localhost/web-project/ecomerce/product.php?pid=${res}`;
                }
            }
        });
    });
    //bag update
    $(".neg,.pos").on('click',function(){
        var id = $(this).data("id");
        var val = $("input[data-id="+id+"]").val()
        // alert(val);
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                pid: id,
                Qty: val,
                update_bag: "update_bag"
            },            
            success: function(res){
                console.log(res);
                window.location='http://localhost/web-project/ecomerce/bag.php';
            }
        });
    });
    //bag delete
    $(".del-bag").on('click',function(){
        var id = $(this).data("id");
        // alert(id);
        var element = this;
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                pid: id,
                del_bag: "del_bag"
            },            
            success: function(res){
                if(res == 1){
                    $(element).closest("tr").fadeOut();
                    window.location='http://localhost/web-project/ecomerce/bag.php';
                }
            }
        });
    });

    //check user login or not at purchase time
    $(".place-order-btn").on("click",function(){
        var total = $(this).data("total");
        $.ajax({
            url: "http://localhost/web-project/ecomerce/crudhandler.php",
            type: "POST",
            data: {
                check_login: "check_login",
                total: total
            },            
            success: function(res){
                if(res == 0){
                    alert("To Buy Order You Have to login");
                }else if(res == 2){
                    alert("Your cart is Empty");
                }else{
                    window.location =`http://localhost/web-project/ecomerce/payment.php?total=${res}`;
                }
            }
        });
    });

    //payment
    function payment(){
        $("#payment-modal").modal("show");
    }
    payment();
    $("#payment-form").on("submit",function(e){
         e.preventDefault();
        var formdata = new FormData(this);
         $.ajax({
            url: "http://localhost/web-project/ecomerce/paymentop.php",
            type: "POST",
            data: formdata,
            contentType: false,
            processData: false,
            success: function(res){
                $("#payment-modal").modal("hide");
                $(".payment").css("display","block");
                // alert(res);
            }
        });
    });
});