<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header('location: http://localhost/web-project/ecomerce/');
    }
    include "../crud.php";
    $obj = new Database();
    $cat = $obj->display("category");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
                <div class="logo"><a href="index.php">Mega Bazar</a></div>
                <div class="navigation-menu">
                    <ul class="d-flex align-items-center justify-content-between m-0 px-3">
                        <li class="list-item"><a class="d-block px-md-4 px-2 py-2" href="../index.php"><i class="fa-solid fa-house px-2"></i>Home</a></li>
                        <li class="list-item">
                            <button class="menu-icon d-block px-md-4 px-2 py-2" id="category">Category<i class="fa-solid fa-plus fa-xs m-2"></i></button>
                        </li>    
                        <li class="list-item">
                            <?php
                                if(isset($_SESSION['admin'])){
                                    echo '<a class="d-block px-md-4 px-2 py-2" href=""><i class="fa-solid fa-user fa-xs m-2"></i>'.$_SESSION['admin']['name'].'</a>';
                                }else{
                                    echo '<button class="menu-icon d-block px-md-4 px-2 py-2" id="sign-in-btn">Sign-in<i class="fa-solid fa-plus fa-xs m-2"></i></button>';
                                }
                            ?> 
                        </li>                       
                        <!-- <li class="list-item"><a class="d-block px-md-4 px-2 py-2" href="#"><i class="fa-regular fa-user px-2"></i>Sign-in</a></li> -->
                        <li class="list-item"><a class="d-block px-md-4 px-2 py-2" href="../bag.php"><i class="fa-solid fa-bag-shopping px-2"></i></a></li>
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
                        <a href="../registration.php?type=user">Click here forNew registration</a>
                    </form>
                </div>
                <div class="col admin-login-form-container">
                    <form action="">
                        <input class="input-field" type="email" name="admin_id" placeholder="Enter admin Email">
                        <input class="input-field" type="password" name="admin_pass" placeholder="Enter Password">
                        <input class="submit_btn" type="submit" name="admin-login-submit" value="Login">
                        <a href="../registration.php?type=admin">Click here forNew registration</a>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
    <!-- login popup end -->
    <!-- add category modal -->
    <div class="modal" tabindex="-1" id="cat-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cat-form">
                        <div class="mb-3">
                            <input type="text" name="add-category" value="category" hidden>
                            <label for="recipient-name" class="col-form-label">Category Name</label>
                            <input type="text" class="form-control" id="recipient-name" name="cat-name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Category Image</label>
                            <input type="file" class="form-control" id="recipient-name" name="cat-img">
                        </div>
                        <input type="submit" class="btn btn-primary d-block ms-auto" value="Add Category">
                    </form>
                </div>                
            </div>
        </div>
    </div>
    <!-- add product modal -->
    <div class="modal" tabindex="-1" id="product-modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="product-form">
                        <div class="mb-3">
                            <input type="text" name="add-product" value="product" hidden>
                            <label for="recipient-name" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" id="recipient-name" name="product_name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Images</label>
                            <input type="file" class="form-control" id="recipient-name" name="product_images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Price</label>
                            <input type="number" class="form-control" id="recipient-name" name="product_price">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Category</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category">
                                <option selected disabled>Open this select menu</option>
                                <?php $data = $obj->display("category"); 
                                    // print_r($data);
                                    foreach($data as $val){
                                        echo '<option value="'.$val['id'].'">'.$val['category'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Description</label>
                            <textarea class="form-control" placeholder="Leave a comment here" name="product_desc" id="floatingTextarea"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Brand</label>
                            <input type="text" class="form-control" id="recipient-name" name="brand">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Brand Image</label>
                            <input type="file" class="form-control" id="recipient-name" name="brand_img">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Discount</label>
                            <input type="number" class="form-control" id="recipient-name" name="discount">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Ratings</label>
                            <input type="number" step="0.01" class="form-control" id="recipient-name" name="ratings">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Stock</label>
                            <input type="number" class="form-control" id="recipient-name" name="stock">
                        </div>
                        <input type="submit" class="btn btn-primary d-block ms-auto" value="Add Product">
                    </form>
                </div>                
            </div>
        </div>
    </div>
    <!-- update product modal -->
    <div class="modal" tabindex="-1" id="product-update-modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="product-form">
                        <div class="mb-3">
                            <input type="text" name="add-product" value="product" hidden>
                            <label for="recipient-name" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" id="recipient-name" name="product_name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Images</label>
                            <input type="file" class="form-control" id="recipient-name" name="product_images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Price</label>
                            <input type="number" class="form-control" id="recipient-name" name="product_price">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Category</label>
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category">
                                <option selected disabled>Open this select menu</option>
                                <?php $data = $obj->display("category"); 
                                    // print_r($data);
                                    foreach($data as $val){
                                        echo '<option value="'.$val['id'].'">'.$val['category'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Description</label>
                            <textarea class="form-control" placeholder="Leave a comment here" name="product_desc" id="floatingTextarea"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Product Brand</label>
                            <input type="text" class="form-control" id="recipient-name" name="brand">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Brand Image</label>
                            <input type="file" class="form-control" id="recipient-name" name="brand_img">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Discount</label>
                            <input type="number" class="form-control" id="recipient-name" name="discount">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Stock</label>
                            <input type="number" class="form-control" id="recipient-name" name="stock">
                        </div>
                        <input type="submit" class="btn btn-primary d-block ms-auto" value="Add Product">
                    </form>
                </div>                
            </div>
        </div>
    </div>
    <section class="admin-details my-md-3 my-5">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-md-3 admin-details-op border p-3">
                    <div class="admin-image">
                        <img src="<?php echo '../'.$_SESSION['admin']['img'];?>" alt="">
                    </div>
                    <div class="op-btns">
                        <button class="admin-details-btn all-product-btn active">Products</button>
                        <button class="admin-details-btn all-users-btn">All Users Data</button>
                        <button class="admin-details-btn slide-modify-btn">Modify Banner</button>
                        <button class="admin-details-btn admin-update-btn">Update</button>
                        <a class="text-decoration-none" href=""><button class="admin-details-btn">Delete Account</button></a>
                        <a class="text-decoration-none" href="../logout.php?userid=<?php echo $_SESSION['admin']['id']; ?>"><button class="admin-details-btn">Logout</button></a>
                    </div>
                </div>
                <div class="col-md-9 admin-details-data border overflow-scroll p-3">
                    <div class="all-product-table">
                        <div class="row my-4 align-items-center">
                            <div class="col-5"><h3>Products Details</h3></div>
                            <div class="col-7 d-flex align-items-center">
                                <input type="text" placeholder="Search Product" id="srch_product" class="border ps-2">
                                <button class="btn btn-info mx-3" id="add-cat">Add Category</button>
                                <button class="btn btn-warning" id="add-product">Add Product</button>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th class="text-center">Product Image</th>
                                <th class="text-center">Product Name</th>
                                <th class="text-center">Brand Image</th>
                                <th class="text-center">Brand Name</th>
                                <th class="text-center">Price<i class="fa-solid fa-indian-rupee-sign mx-1 fa-sm"></th>
                                <th class="text-center">Discount %</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Ratings</th>
                                <th class="text-center">Orderd Time</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="product-data">
                                <!-- <tr>
                                    <td class="text-center"><a href=""><img src="../product_images/boat_digital_watch.png" alt=""></a></td>
                                    <td class="text-center"><a class="Poppins color2 text-decoration-none" href="">Boat Digital Watch</a></td>
                                    <td class="text-center"><a href=""><img src="../brand_images/boat.png" alt=""></a></td>
                                    <td class="text-center">Boat</td>
                                    <td class="text-center"></i>2000</td>
                                    <td class="text-center">20%</td>
                                    <td class="text-center">Electronic Gadget</td>
                                    <td class="text-center">Watch</td>
                                    <td class="text-center">4.5</td>
                                    <td class="text-center">10</td>
                                    <td class="text-center"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td class="text-center"><i class="fa-solid fa-trash"></i></td>
                                </tr>   -->
                            </tbody>
                        </table>
                    </div>
                    <div class="all-user-table d-none">
                        <input type="text" placeholder="Search User" id="search_user" class="border d-block ms-auto ps-2">
                        <table class="table">
                            <thead>
                                <tr>
                                <th class="text-center">Sl No.</th>
                                <th class="text-center">User Name</th>
                                <th class="text-center">User Image</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">User Email</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">City</th>
                                <th class="text-center">State</th>
                                <th class="text-center">Zip Code</th>
                                <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="user-data">
                                <!-- <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center"><a href=""><img src="../user_images/user1.png" alt=""></a></td>
                                    <td class="text-center">User Name</td>
                                    <td class="text-center">7958462183</td>
                                    <td class="text-center">user@gmail.com</td>
                                    <td class="text-center">pass*****word</td>
                                    <td class="text-center">10/B abc street</td>
                                    <td class="text-center">Kolkata</td>
                                    <td class="text-center">West Bengal</td>
                                    <td class="text-center">712205</td>
                                    <td class="text-center"><i class="fa-solid fa-pen-to-square"></i></td>
                                    <td class="text-center"><i class="fa-solid fa-trash"></i></td>
                                </tr>   -->
                            </tbody>
                        </table>
                    </div>
                    <section class="modify-banner d-none">
                        <div class="container">
                            <h1 class="text-center Poppins color1 my-3">Modify Banner</h1>
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <form class="row g-3" id="addslideform">
                                        <input class="form-control" type="text" name="id" id="id" value="<?php echo $_SESSION['slideimg']['id']; ?>">
                                        <input class="form-control" type="text" name="update-slide" id="id" value="update-slide">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Slide 1</label>
                                            <input class="form-control mb-1" type="file" name="slide1" id="formFile">
                                            <img src="<?php echo "../".$_SESSION['slideimg']['slide1'] ?>" alt="" width="100" height="50">
                                        </div>  
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Slide 2</label>
                                            <input class="form-control mb-1" type="file"name="slide2" id="formFile">
                                            <img src="<?php echo "../".$_SESSION['slideimg']['slide2'] ?>" alt="" width="100" height="50">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Slide 3</label>
                                            <input class="form-control mb-1" type="file"name="slide3" id="formFile">
                                            <img src="<?php echo "../".$_SESSION['slideimg']['slide3'] ?>" alt="" width="100" height="50">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Slide 4</label>
                                            <input class="form-control mb-1" type="file"name="slide4" id="formFile">
                                            <img src="<?php echo "../".$_SESSION['slideimg']['slide4'] ?>" alt="" width="100" height="50">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Slide 5</label>
                                            <input class="form-control mb-1" type="file"name="slide5" id="formFile">
                                            <img src="<?php echo "../".$_SESSION['slideimg']['slide5'] ?>" alt="" width="100" height="50">
                                        </div>  
                                        <div class="col-12">
                                            <button class="btn btn-primary d-block ms-auto px-5" type="submit">Modify</button>
                                        </div>                                      
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="registration d-none">
                        <div class="container">
                            <h1 class="text-center Poppins color1 my-5">Admin Update Form</h1>
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                <form class="row g-3" id="update-admin-form">
                                    <input type="text" class="form-control" id="id" name="id" placeholder="Enter Name" value="<?php echo $_SESSION['admin']['id']; ?>" hidden>
                                        <div class="col-md-4">
                                            <label for="fname" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $_SESSION['admin']['name']; ?>" required>
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
                                            <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend2" placeholder="Enter email@gmail.com" value="<?php echo $_SESSION['admin']['email']; ?>" required>
                                        </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Mobile Number" value="<?php echo $_SESSION['admin']['phone']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="img" class="form-label">Choose Profile Image</label>
                                            <input class="form-control" type="file" name="img" id="img" value="<?php echo $_SESSION['admin']['img']; ?>" required>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <label for="address" class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="<?php echo $_SESSION['admin']['address']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter city" value="<?php echo $_SESSION['admin']['city']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" id="state" placeholder="Enter state" value="<?php echo $_SESSION['admin']['state']; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="zip" class="form-label">Zip</label>
                                            <input type="text" class="form-control" name="zip" id="zip" placeholder="Enter zip" value="<?php echo $_SESSION['admin']['zip']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="pass" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter password" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cpass" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Confirm Password" required>
                                        </div>
                                        <input type="text" class="form-control" name="admin-update" id="admin-update" value="admin-update" hidden>
                                        <div class="col-12">
                                          <button class="btn btn-primary d-block ms-auto px-5" type="submit" name="adminupdate">Update</button>
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
    <script src="../js/custom.js"></script>
    <script src="../js/admin_detail.js"></script>
    <script src="../js/ajax.js"></script>
</body>
</html>    