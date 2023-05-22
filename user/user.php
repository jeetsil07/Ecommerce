<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location: http://localhost/web-project/ecomerce/');
    }
    include "../crud.php";
    $obj = new Database();
    $cat = $obj->display("category");
    $myorder = $obj->check_user_order($_SESSION['user']['id']);
    if($myorder){
        $obj->order_status_update($_SESSION['user']['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel = "icon" href = "http://localhost/web-project/ecomerce/logo/logo.png" type = "image/x-icon">

    <!-- bootstrap-css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- custom-css -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
    <!-- navigation-menu start-->
    <header>
        <div class="container-fluid bgc1">
            <nav class="nav-bar container d-flex align-items-center justify-content-between">
                <div class="logo"><a href="index.html">Mega Bazar</a></div>
                <div class="navigation-menu">
                    <ul class="d-flex align-items-center justify-content-between m-0 px-3">
                        <li class="list-item"><a class="d-block px-md-4 px-2 py-2" href="../index.php"><i class="fa-solid fa-house px-2"></i>Home</a></li>
                        <li class="list-item">
                            <button class="menu-icon d-block px-md-4 px-2 py-2" id="category">Category<i class="fa-solid fa-plus fa-xs m-2"></i></button>
                        </li>    
                        <li class="list-item">
                            <?php
                                if(isset($_SESSION['user'])){
                                    echo '<a class="d-block px-md-4 px-2 py-2" href=""><i class="fa-solid fa-user fa-xs m-2"></i>'.$_SESSION['user']['name'].'</a>';
                                }else{
                                    echo '<button class="menu-icon d-block px-md-4 px-2 py-2" id="sign-in-btn">Sign-in<i class="fa-solid fa-plus fa-xs m-2"></i></button>';
                                }
                            ?>                            
                        </li>                       
                        <!-- <li class="list-item"><a class="d-block px-md-4 px-2 py-2" href="#"><i class="fa-regular fa-user px-2"></i>Sign-in</a></li> -->
                        <li class="list-item"><a class="d-block px-md-2 px-2 py-2" href="../bag.php"><i class="fa-solid fa-bag-shopping px-1"></i></a> </li>
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
                                            <a href="../product_category.php?catid='.$val['id'].'"><img src="../'.$val['cat_img'].'" alt=""></a>
                                        </div>
                                        <a href="../product_category.php?catid='.$val['id'].'">'.$val['category'].'</a>
                                    </div>
                                </div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <!-- navigation-menu end-->
    
    <!-- login popup start -->
    <!-- <div class="login-popup bgc4 shadow">
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
                    <form action="">
                        <input class="input-field" type="email" name="user_id" placeholder="Enter User Email">
                        <input class="input-field" type="password" name="user_pass" placeholder="Enter Password">
                        <input class="submit_btn" type="submit" name="user-login-submit" value="Login">
                        <a href="../registration.html">Click here forNew registration</a>
                    </form>
                </div>
                <div class="col admin-login-form-container">
                    <form action="">
                        <input class="input-field" type="email" name="admin_id" placeholder="Enter admin Email">
                        <input class="input-field" type="password" name="admin_pass" placeholder="Enter Password">
                        <input class="submit_btn" type="submit" name="admin-login-submit" value="Login">
                        <a href="">Click here forNew registration</a>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- login popup end -->
    <section class="user-details my-md-3 my-5">
        <div class="container-fluid px-3 mb-5">
            <div class="row">
                <div class="col-md-3 user-details-op border p-3">
                    <div class="user-image">
                        <img src="<?php echo '../'.$_SESSION['user']['img'];?>" alt="">
                    </div>
                    <div class="op-btns">
                        <button class="user-details-btn my-order-btn active">My Orders</button>
                        <button class="user-details-btn user-update-btn">Update</button>
                        <a class="text-decoration-none" href=""><button class="user-details-btn">Delete Account</button></a>
                        <a class="text-decoration-none" href="../logout.php?userid=<?php echo $_SESSION['user']['id']; ?>"><button class="user-details-btn">Logout</button></a>
                    </div>
                </div>
                <div class="col-md-9 user-details-data border overflow-scroll p-3">
                    <div class="my-order-table">
                        <table class="table">
                            <h1 class = "text-center Poppins color1 my-2">My Order</h1>
                            <thead>
                                <tr>
                                <th class="text-center">Product Image</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Order Id</th>
                                <th class="text-center">Issue Date</th>
                                <th class="text-center">Expected Delivary Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Payment Mode</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $data = $obj->fetch_data_from_user_order($_SESSION['user']['id']);
                                    if($data !=0){
                                        foreach($data as $val){
                                            $pid = $val['pid'];
                                            $product = $obj->fetch_data_by_id('product',$pid);
                                            $img = explode("#$#",$product["product_images"]);
                                            $product_name = $product['product_name'];
                                            $product_images = $img[0];
                                            $product_price = $product['product_price'];
        
                                            echo '<tr>
                                                    <td class="text-center"><a href=""><img src="../'.$product_images.'" alt=""></a></td>
                                                    <td class="text-center"><a class="Poppins color2 text-decoration-none" href="../product.php?pid='.$pid.'">'.$product_name.'</a></td>
                                                    <td class="text-center">'.$val['Qty'].'</td>
                                                    <td class="text-center">'.$product_price*$val['Qty'].'</td>
                                                    <td class="text-center">'.$val['oid'].'</td>
                                                    <td class="text-center">'.$val['issue_date'].'</td>
                                                    <td class="text-center">'.$val['delivary_date'].'</td>
                                                    <td class="text-center">'.$val['pay_mode'].'</td>
                                                    <td class="text-center">'.$val['status'].'</td>
                                                </tr>';
                                        }
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    
                    <section class="registration d-none">
                        <div class="container">
                            <h1 class="text-center Poppins color1 my-5">Update Data</h1>
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <form class="row g-3" id="update-user-form">
                                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter Name" value="<?php echo $_SESSION['user']['id']; ?>" hidden>
                                        <div class="col-md-4">
                                            <label for="fname" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $_SESSION['user']['name']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="gender" class="form-label">Gender</label>
                                            <select class="form-select" name="gender" id="gender" requireded>
                                            <option selected disabled value="">Enter Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend2" placeholder="Enter email@gmail.com" value="<?php echo $_SESSION['user']['email']; ?>" required>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Mobile Number" value="<?php echo $_SESSION['user']['phone']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="img" class="form-label">Choose Profile Image</label>
                                            <input class="form-control" type="file" name="img" id="img" value="<?php echo $_SESSION['user']['img']; ?>" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="<?php echo $_SESSION['user']['address']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" value="<?php echo $_SESSION['user']['city']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" value="<?php echo $_SESSION['user']['state']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="zip" class="form-label">Zip</label>
                                            <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter zip" value="<?php echo $_SESSION['user']['zip']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pass" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cpass" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password" required>
                                        </div>
                                        <input type="text" class="form-control" name="user-update" id="user-update" value="user-update" hidden>
                                        <div class="col-12">
                                          <button class="btn btn-primary d-block ms-auto px-5" type="submit" name="userupdate">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- footer start -->
    <footer class="mt-5">
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
    <script src="../js/custom.js"></script>
    <script src="../js/user_detail.js"></script>
    <script src="../js/ajax.js"></script>
</body>
</html>    