<?php
    session_start();
    include "crud.php";
    $obj = new Database();
    $cat = $obj->display("category");
    $totalprice = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bag</title>
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
                                 }
                                 else if(isset($_SESSION['user'])){
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
    <!-- bag details start -->
    <section class="bag-details my-5">
        <div class="bag-details-container container overflow-scroll p-2 border">
            <h1 class="Poppins color2">Products In Bags</h1>
            <table class="table bag-product-table">
                <thead>
                    <tr>
                    <th class="text-center">Product Image</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Remove Product</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!isset($_SESSION['user']) && isset($_SESSION['bag'])){
                            global $totalprice;
                            foreach($_SESSION['bag'] as $val){
                                // print_r($val);
                                $pid = $val["pid"];
                                $data = $obj->fetch_data_by_id('product',$pid);
                                $img = explode("#$#",$data['product_images']);
                                // print_r($data);
                                echo '<tr>
                                        <td class="text-center"><a href=""><img src="'.$img[0].'" alt=""></a></td>
                                        <td class="text-center"><a class="Poppins color2 text-decoration-none" href="product.php?pid='.$pid.'">'.substr($data['product_name'],0,70).'...</a></td>
                                        <td class="text-center">
                                            <div class="quantity d-flex align-items-center justify-content-center">
                                                <button class="neg" data-id="'.$data['id'].'">-</button>
                                                <input class="quantity-val mx-2" type="text" data-id="'.$data['id'].'" value="'.$val['Qty'].'" readonly>
                                                <button class="pos"data-id="'.$data['id'].'">+</button>
                                            </div>
                                        </td>
                                        <td class="text-center">'.$val['Qty']*$data['product_price'].'</td>
                                        <td class="text-center"><button class="del-bag" data-id="'.$data['id'].'"><i class="fa-solid fa-trash"></i></button></td>
                                    </tr>';
                                $totalprice +=   $val['Qty'] * $data['product_price'];
                            }
                        }
                        if(isset($_SESSION['user'])){
                            global $totalprice;
                            $products = $obj->fetch_data_from_bag($_SESSION['user']['id']);
                            if($products != 0){
                                foreach($products as $val){
                                    $pid = $val['pid'];
                                    $data = $obj->fetch_data_by_id('product',$pid);
                                    // print_r($data);
                                    $img = explode("#$#",$data['product_images']);
                                    echo '<tr>
                                            <td class="text-center"><a href=""><img src="'.$img[0].'" alt=""></a></td>
                                            <td class="text-center"><a class="Poppins color2 text-decoration-none" href="product.php?pid='.$pid.'">'.substr($data['product_name'],0,30).'...</a></td>
                                            <td class="text-center">
                                                <div class="quantity d-flex align-items-center justify-content-center">
                                                    <button class="neg" data-id="'.$data['id'].'">-</button>
                                                    <input class="quantity-val mx-2" type="text" data-id="'.$data['id'].'" value="'.$val['Qty'].'" readonly>
                                                    <button class="pos"data-id="'.$data['id'].'">+</button>
                                                </div>
                                            </td>
                                            <td class="text-center">'.$val['Qty']*$data['product_price'].'</td>
                                            <td class="text-center"><button class="del-bag" data-id="'.$data['id'].'"><i class="fa-solid fa-trash"></i></button></td>
                                        </tr> ';
                                    $totalprice +=   $val['Qty'] * $data['product_price'];
                                }
                            }                            
                        }                        
                    ?>                                    
                </tbody>
            </table>
        </div>
        <button class="place-order-btn px-5 py-2 d-block mx-auto border-0 bg-warning color4 rounded-2 my-2"<?php echo "data-total=".$totalprice; ?>>Place Order <p class="m-0 p-0"><i class="fa-solid fa-indian-rupee-sign mx-1 fa-sm"></i><?php echo $totalprice; ?></p> </button>
    </section>
    <!-- bag details end -->
      <!-- footer start -->
      <footer class="footer">
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
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- custom-js -->
    <script src="js/custom.js"></script>
    <script src="js/login-popup.js"></script>
    <script src="js/price.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>