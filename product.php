<?php
    session_start();
    include "crud.php";
    $obj = new Database();
    $cat = $obj->display("category");
    $product = $obj->fetch_data_by_id('product',$_GET['pid']);
    $similar = $obj->fetch_data_by_category('product',$product['category']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel = "icon" href = "http://localhost/web-project/ecomerce/logo/logo.png" type = "image/x-icon">

    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom-css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <!-- navigation-menu start-->
    <header>
        <div class="container-fluid bgc1">
            <nav class="nav-bar container d-flex align-items-center justify-content-between">
                <div class="logo"><a href="index.html">Mega Bazar</a></div>
                <div class="navigation-menu">
                    <ul class="d-flex align-items-center justify-content-between m-0 px-3">
                        <li class="list-item"><a class="d-block px-md-4 px-2 py-2" href="index.php"><i class="fa-solid fa-house px-2"></i>Home</a></li>
                        <li class="list-item">
                            <button class="menu-icon d-block px-md-4 px-2 py-2" id="category">Category<i class="fa-solid fa-plus fa-xs m-2"></i></button>
                        </li>    
                        <li class="list-item">
                            <?php
                                if(isset($_SESSION['user'])){
                                    echo '<a class="d-block px-md-4 px-2 py-2" href="http://localhost/web-project/ecomerce/user/user.php"><i class="fa-solid fa-user fa-xs m-2"></i>'.$_SESSION['user']['name'].'</a>';
                                }else if(isset($_SESSION['admin'])){
                                    echo '<a class="d-block px-md-4 px-2 py-2" href="http://localhost/web-project/ecomerce/admin_panel/admin.php"><i class="fa-solid fa-user fa-xs m-2"></i>'.$_SESSION['admin']['name'].'</a>';
                                }else{
                                    echo '<button class="menu-icon d-block px-md-4 px-2 py-2" id="sign-in-btn">Sign-in<i class="fa-solid fa-plus fa-xs m-2"></i></button>';
                                }
                            ?>
                        </li>                       
                        <!-- <li class="list-item"><a class="d-block px-md-4 px-2 py-2" href="#"><i class="fa-regular fa-user px-2"></i>Sign-in</a></li> -->
                        <li class="list-item"><a class="d-block px-md-2 px-2 py-2" href="bag.php"><i class="fa-solid fa-bag-shopping px-1"></i></a> </li>
                            <?php
                                 if(isset($_SESSION['bag']) && count($_SESSION['bag'])){
                                    echo '<span class="bag-count d-inline-block">'.count($_SESSION['bag']).'</span>';
                                 }else if(isset($_SESSION['user'])){
                                    $uid = $_SESSION['user']['id'];
                                    $data = $obj->fetch_data_from_bag($uid);
                                    if($data != 0){
                                        echo '<span class="bag-count d-inline-block">'.count($data).'</span>';
                                    }
                                 }
                            ?>
                    </ul>
                </div>
                <i class="fa-solid fa-magnifying-glass fa-xl text-white search-icon"></i>
            </nav>
        </div>
        <div class="category-details my-lg-0 my-5">            
            <div class="container-fluid">
                <div class="row p-3">
                    <?php
                        foreach($cat as $val){
                            echo'<div class="col-md-2 col-4  my-2 d-flex justify-content-center">
                                    <div class="category">
                                        <div class="cat-img">
                                            <a href="product_category.php?catid='.$val['id'].'"><img src="'.$val['cat_img'].'" alt=""></a>
                                        </div>
                                        <a href="product_category.php?catid='.$val['id'].'">'.$val['category'].'</a>
                                    </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <!-- navigation-menu end-->
    <!-- live search product start -->
    <div class="modal" tabindex="-1" id="live-product">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <input type="text" id="search_live_product" placeholder="Search product" class="px-3 border d-block">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                    <div class="row p-3" id="live-product-show">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- live search product ens -->
    <!-- login popup start -->
    <div class="login-popup bgc4 shadow">
        <div class="container-fluid">
            <div class="row border-bottom">
                <div class="col">
                    <button class="login-popup-btn user-login-btn">User</button>
                </div>
                <div class="col">
                    <button class="login-popup-btn admin-login-btn">Admin</button>
                </div>
            </div>
            <div class="row">
            <div class="col user-login-form-container">
                    <form id="user-login-form">
                        <input class="input-field" type="email"  id="user_id" name="user_id" placeholder="Enter User Email">
                        <input class="input-field" type="password" id="user_pass" name="user_pass" placeholder="Enter Password">
                        <input class="submit_btn" type="submit" name="user-login-submit" value="Login">
                        <a href="registration.php?type=user">Click here forNew registration</a>
                    </form>
                </div>
                <div class="col admin-login-form-container">
                    <form id="admin-login-form">
                        <input class="input-field" type="email" id="admin_id" name="admin_id" placeholder="Enter admin Email">
                        <input class="input-field" type="password" id="admin_pass" name="admin_pass" placeholder="Enter Password">
                        <input class="submit_btn" type="submit" name="admin-login-submit" value="Login">
                        <a href="registration.php?type=admin">Click here forNew registration</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- login popup end -->   

    <!-- product details start -->
    <section class="product-details my-md-5 my-5">
        <div class="container">
            <div class="row">
                <?php
                    $actual_price = $product['product_price']+($product['product_price']/(100-$product['discount']))*$product['discount'];
                    $img = explode("#$#",$product["product_images"]);                
                    echo '<div class="col-md-6 p-3">
                            <div class="row">
                                <div class="col">
                                    <div class="product-image border">
                                        <img src="'.$img[0].'" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="product-images d-flex justify-content-center">';
                                    foreach($img as $val){
                                        echo '<img class="border p-1" src="'.$val.'" alt="">';
                                    }
                                echo'</div>
                                </div>
                            </div>
                        </div>                
                        <div class="col-md-6 p-3">
                            <div class="product-info">
                                <h2 class="product-title Poppins color1">'.$product["product_name"].'</h2>
                                <p class="product-star color4 bgc3 mt-3 mb-0 p-2"><i class="fa-solid fa-star mx-2 fa-lg"></i>'.$product["ratings"].'</p>
                                <p class="product-cost mt-3 mb-0 color1">
                                    MRP :
                                    <i class="fa-solid fa-indian-rupee-sign mx-1 fa-lg"></i><del>'.ceil($actual_price).'</del>
                                    <i class="fa-solid fa-indian-rupee-sign mx-1 fa-lg"></i>'.$product["product_price"].'
                                    <span class="discount text-success mx-2">'.$product["discount"].'% off</span>
                                </p>
                                <div class="product-desc my-3 border overflow-scroll">
                                    <h3 class="Poppins color2">Product Description</h3>
                                    <p>'.$product["product_desc"].'</p>
                                </div>
                                <a class="product-add-btn d-block text-center mt-1 fw-bold fs-5" id="add-bag" href="#" data-id="'.$product["id"].'">Add To Bag</a>
                            </div>
                        </div>';
                    ?>
            </div>
        </div>
    </section>
    <!-- product details end -->
    <!-- similar product start -->
    <section class="similar-product my-5">
        <div class="container shadow">
            <h2 class="Poppins color2 my-2">Similar Product</h2>
            <div class="similar-product-container d-flex overflow-scroll">
                <?php 
                    foreach($similar as $val){
                        $actual_price = $val['product_price']+($val['product_price']/(100-$val['discount']))*$val['discount'];
                        echo '<div class="product-item col-md-2 col-4 p-0 border m-3">
                                <div class="product-img">
                                    <img src="'.$val['product_images'].'" alt="">
                                </div>
                                <div class="product-info p-2 border-top">
                                    <a class="product-name color2 mt-1" href="">'.substr($val['product_name'],0,40).'...</a>
                                    <p class="product-ratings color6 bgc1 mt-1 mb-0"><i class="fa-solid fa-star mx-2 fa-sm"></i>'.$val['ratings'].'</p>
                                    <p class="product-price mt-1 mb-0 color1">
                                        MRP :
                                        <i class="fa-solid fa-indian-rupee-sign mx-1 fa-sm"></i><del>'.ceil($actual_price).'</del>
                                        <i class="fa-solid fa-indian-rupee-sign mx-1 fa-sm"></i>'.$val['product_price'].'
                                        <span class="discount text-success mx-2">'.$val['discount'].'% off</span>
                                    </p>
                                    <a class="product-shop-btn d-block text-center mt-1" href="product.php?pid='.$val['id'].'">Continue Shopping</a>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </section>
    <!-- similar product end -->
    <!-- footer start -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col p-0">
                    <p class="text-center bgc1 color4 py-3 m-0">&#169; <?php echo date("Y") ?>All Right Reserve</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
<!-- bootstrap-js -->
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<!-- custom-js -->
<script src="js/custom.js"></script>
<script src="js/login-popup.js"></script>
<script src="js/product_details.js"></script>
<script src="js/ajax.js"></script>
</body>
</html>