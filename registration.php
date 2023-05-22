<?php
    session_start();
    include "crud.php";
    $obj = new Database();
    $cat = $obj->display("category");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
    <!-- registration form start -->
    <section class="registration">
        <div class="container">
            <h1 class="text-center Poppins color1 my-5">Registration Form</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form class="row g-3" id="reg-form">
                        <div class="col-md-4">
                          <label for="fname" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" name="gender" id="gender" required>
                              <option selected disabled value="">Enter Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                            </select>
                          </div>
                        <div class="col-md-4">
                          <label for="email" class="form-label">Email</label>
                          <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend2" placeholder="Enter email@gmail.com" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Mobile Number" required>
                        </div>
                        <div class="col-md-4">
                            <label for="img" class="form-label">Choose Profile Image</label>
                            <input class="form-control" type="file" name="img" id="img" required>
                          </div>
                          
                        <div class="col-md-4">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" required>
                          </div>
                          <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" required>
                          </div>
                        <div class="col-md-4">
                          <label for="zip" class="form-label">Zip</label>
                          <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter zip" required>
                        </div>
                        <div class="col-md-6">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="cpass" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="table-type" id="table-type" value="<?php echo $_GET['type']; ?>" hidden>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary d-block ms-auto px-5" type="submit" id="submit-form">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- registration form end -->
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
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- custom-js -->
    <script src="js/custom.js"></script>
    <script src="js/login-popup.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>