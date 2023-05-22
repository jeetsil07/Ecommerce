<?php
    session_start();
    include "crud.php";
    $obj = new Database();
    // user registration
    if(isset($_POST['table-type']) && $_POST['table-type'] == 'user'){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $img = "user_images/".uniqid("user").$_FILES['img']['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if($pass == $cpass){
            $encpass = password_hash($pass,PASSWORD_BCRYPT);
        }else{
            echo 2;
            exit();
        }
        $data = [
            "name"=>$name,
            "gender"=>$gender,
            "email"=>$email,
            "phone"=>$phone,
            "img"=>$img,
            "address"=>$address,
            "city"=>$city,
            "state"=>$state,
            "zip"=>$zip,
            "pass"=>$encpass
        ];
        move_uploaded_file($_FILES['img']['tmp_name'],$img);
        $res = $obj->insert($_POST['table-type'],$data);
        echo $res;
    }
     // admin registration
     if(isset($_POST['table-type']) && $_POST['table-type'] == 'admin'){
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $img = "admin_images/".uniqid("admin").$_FILES['img']['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if($pass == $cpass){
            $encpass = password_hash($pass,PASSWORD_BCRYPT);
        }else{
            echo 2;
            exit();
        }
        $data = [
            "name"=>$name,
            "gender"=>$gender,
            "email"=>$email,
            "phone"=>$phone,
            "img"=>$img,
            "address"=>$address,
            "city"=>$city,
            "state"=>$state,
            "zip"=>$zip,
            "pass"=>$encpass
        ];
        move_uploaded_file($_FILES['img']['tmp_name'],$img);
        $res = $obj->insert($_POST['table-type'],$data);
        echo $res;
    }
    //user login
    if(isset($_POST['login']) && $_POST['login'] == 'user'){
        $table = $_POST['login'];
        $email = $_POST['userid'];
        $pass = $_POST['password'];

        $data = $obj->display_some($table,$email);
        if($data['email'] == $email){
            if(password_verify($pass,$data['pass'])){
                $_SESSION['user']=[
                    "id"=>$data['id'],
                    "name"=>$data['name'],
                    "gender"=>$data['gender'],
                    "email"=>$data['email'],
                    "phone"=>$data['phone'],
                    "img"=>$data['img'],
                    "address"=>$data['address'],
                    "city"=>$data['city'],
                    "state"=>$data['state'],
                    "zip"=>$data['zip']
                ];
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 2;
        }        
    }
    //admin login
    if(isset($_POST['login']) && $_POST['login'] == 'admin'){
        $table = $_POST['login'];
        $email = $_POST['userid'];
        $pass = $_POST['password'];

        $data = $obj->display_some($table,$email);

        if($data['email'] == $email){
            if(password_verify($pass,$data['pass'])){
                $_SESSION['admin']=[
                    "id"=>$data['id'],
                    "name"=>$data['name'],
                    "gender"=>$data['gender'],
                    "email"=>$data['email'],
                    "phone"=>$data['phone'],
                    "img"=>$data['img'],
                    "address"=>$data['address'],
                    "city"=>$data['city'],
                    "state"=>$data['state'],
                    "zip"=>$data['zip']
                ];
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 2;
        }        
    }
    // user update
    if(isset($_POST['user-update']) && $_POST['user-update'] == 'user-update'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $img = "user_images/".uniqid("user").$_FILES['img']['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if($pass == $cpass){
            $encpass = password_hash($pass,PASSWORD_BCRYPT);
        }else{
            echo 2;
            exit();
        }
        $delimg = $obj->fetch_data_by_id('user',$id);
        unlink($delimg['img']);
        $data = [
            "id"=>$id,
            "name"=>$name,
            "gender"=>$gender,
            "email"=>$email,
            "phone"=>$phone,
            "img"=>$img,
            "address"=>$address,
            "city"=>$city,
            "state"=>$state,
            "zip"=>$zip,
            "pass"=>$encpass
        ];
        move_uploaded_file($_FILES['img']['tmp_name'],$img);
        $res = $obj->update('user',$data);
        echo $res;
    }
    //admin update
    if(isset($_POST['admin-update']) && $_POST['admin-update'] == 'admin-update'){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $img = "admin_images/".uniqid("user").$_FILES['img']['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if($pass == $cpass){
            $encpass = password_hash($pass,PASSWORD_BCRYPT);
        }else{
            echo 2;
            exit();
        }
        $delimg = $obj->fetch_data_by_id('admin',$id);
        unlink($delimg['img']);
        $data = [
            "id"=>$id,
            "name"=>$name,
            "gender"=>$gender,
            "email"=>$email,
            "phone"=>$phone,
            "img"=>$img,
            "address"=>$address,
            "city"=>$city,
            "state"=>$state,
            "zip"=>$zip,
            "pass"=>$encpass
        ];
        move_uploaded_file($_FILES['img']['tmp_name'],$img);
        $res = $obj->update('admin',$data);
        echo $res;
    }
    //hero slider
    if(isset($_POST['update-slide']) && $_POST['update-slide'] == 'update-slide'){
        unlink($_SESSION['slideimg']['slide1']);
        unlink($_SESSION['slideimg']['slide2']);
        unlink($_SESSION['slideimg']['slide3']);
        unlink($_SESSION['slideimg']['slide4']);
        unlink($_SESSION['slideimg']['slide5']);

        $id = $_POST['id'];
        $slide1 = "heroslider_images/".uniqid("slide").$_FILES['slide1']['name'];
        $slide2 = "heroslider_images/".uniqid("slide").$_FILES['slide2']['name'];
        $slide3 = "heroslider_images/".uniqid("slide").$_FILES['slide3']['name'];
        $slide4 = "heroslider_images/".uniqid("slide").$_FILES['slide4']['name'];
        $slide5 = "heroslider_images/".uniqid("slide").$_FILES['slide5']['name'];
        
        $data = [
            "id" => $id,
            "slide1"=>$slide1,
            "slide2"=>$slide2,
            "slide3"=>$slide3,
            "slide4"=>$slide4,
            "slide5"=>$slide5
        ];
        move_uploaded_file($_FILES['slide1']['tmp_name'],$slide1);
        move_uploaded_file($_FILES['slide2']['tmp_name'],$slide2);
        move_uploaded_file($_FILES['slide3']['tmp_name'],$slide3);
        move_uploaded_file($_FILES['slide4']['tmp_name'],$slide4);
        move_uploaded_file($_FILES['slide5']['tmp_name'],$slide5);

        $res = $obj->update_slider("slide",$data);
        echo $res;
    }
    // slider session image preview
    if(isset($_SESSION['admin'])){
        $data = $obj->fetch_data_by_id('slide',1);
        // echo $data['slide1'];
        $_SESSION['slideimg']=[
            "id"=>$data['id'],
            "slide1"=>$data['slide1'],
            "slide2"=>$data['slide2'],
            "slide3"=>$data['slide3'],
            "slide4"=>$data['slide4'],
            "slide5"=>$data['slide5'],
        ];
    }
    //display all user data
    if(isset($_POST['show']) && $_POST['show'] == 'user-data'){
        $table = $_POST['table'];
        $data = $obj->display($table);
        $sl = 1;
        $output = "";
        foreach($data as $val){
            $output.=
                    '<tr>
                        <td class="text-center">'.$sl.'</td>
                        <td class="text-center"><a href=""><img src="../'.$val['img'].'" alt=""></a></td>
                        <td class="text-center">'.$val['name'].'</td>
                        <td class="text-center">'.$val['phone'].'</td>
                        <td class="text-center">'.$val['email'].'</td>
                        <td class="text-center">'.$val['address'].'</td>
                        <td class="text-center">'.$val['city'].'</td>
                        <td class="text-center">'.$val['state'].'</td>
                        <td class="text-center">'.$val['zip'].'</td>
                        <td class="text-center"><button class="user-del-btn" data-id="'.$val['id'].'"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>';
                    $sl++;
        }   
        echo $output;
    }
    //search user data
    if(isset($_POST['search_user']) && $_POST['search_user']=='user-data'){        
        $table = $_POST['table'];
        $pat = $_POST['val'];
        $data = $obj->display_by_pattern($table,$pat);
        $sl = 1;
        $output = "";
        foreach($data as $val){
            $output.=
                    '<tr>
                        <td class="text-center">'.$sl.'</td>
                        <td class="text-center"><a href=""><img src="../'.$val['img'].'" alt=""></a></td>
                        <td class="text-center">'.$val['name'].'</td>
                        <td class="text-center">'.$val['phone'].'</td>
                        <td class="text-center">'.$val['email'].'</td>
                        <td class="text-center">'.$val['address'].'</td>
                        <td class="text-center">'.$val['city'].'</td>
                        <td class="text-center">'.$val['state'].'</td>
                        <td class="text-center">'.$val['zip'].'</td>
                        <td class="text-center"><button class="user-del-btn" data-id="'.$val['id'].'"><i class="fa-solid fa-trash"></i></button></td>
                    </tr>';
                    $sl++;
        }   
        echo $output;
    }
//search product data
if(isset($_POST['srch_product']) && $_POST['srch_product']=='srch_product'){        
    $table = $_POST['table'];
    $pat = $_POST['val'];
    $data = $obj->product_live_search($table,$pat);
    $sl = 1;
    $output = "";
    if($data !=0){
        foreach($data as $val){
            $img = explode("#$#",$val["product_images"]);
            $cat = $obj->fetch_data_by_id('category',$val["category"]);
    
            $output .= '<tr>
                            <td class="text-center"><a href=""><img src="../'.$img[0].'" alt=""></a></td>
                            <td class="text-center"><a class="Poppins color2 text-decoration-none" href="">'.substr($val['product_name'],0,30).'</a></td>
                            <td class="text-center"><a href=""><img src="../'.$val["brand_img"].'"></a></td>
                            <td class="text-center">'.$val["brand"].'</td>
                            <td class="text-center">'.$val["product_price"].'</td>
                            <td class="text-center">'.$val["discount"].'</td>
                            <td class="text-center">'.$cat["category"].'</td>
                            <td class="text-center">'.$val["stock"].'</td>
                            <td class="text-center">'.$val["ratings"].'</td>
                            <td class="text-center">'.$val["sell"].'</td>
                            <td class="text-center"><button class="product-edit-btn" data-id='.$val['id'].'><i class="fa-solid fa-pen-to-square"></i></button></td>
                            <td class="text-center"><button class="product-del-btn" data-id='.$val['id'].'><i class="fa-solid fa-trash"></i></button></td>
                        </tr>';
        }
    }
    echo $output;
}
    //Delete user data
    if(isset($_POST['del_user']) && $_POST['del_user']== 'Delete'){
        $table = $_POST['table'];
        $id = $_POST['id'];
        $delimg = $obj->fetch_data_by_id($table,$id);
        unlink($delimg['img']);
        $res = $obj->delete($table,$id);
        echo $res;
    }

    //add category
    if(isset($_POST['add_cat']) && $_POST['add_cat']=="add-category"){
        echo 1;
    }
    if(isset($_POST['add-category']) && $_POST['add-category'] == "category"){
        $table = "category";
        $category = $_POST['cat-name'];
        $catimg = 'category_images/'.uniqid("cat").$_FILES['cat-img']['name'];
        $data = [
            'category'=> $category,
            'cat_img'=> $catimg
        ];
        $res = $obj->insert($table,$data);
        move_uploaded_file($_FILES['cat-img']['tmp_name'],$catimg);
        echo $res;
    }

    //add product
    if(isset($_POST['add_product']) && $_POST['add_product']=="add-product"){
        echo 1;
    }
    if(isset($_POST['add-product']) && $_POST['add-product'] == "product"){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $brand_img = "brand_images/".$_FILES['brand_img']['name'];
        $discount = $_POST['discount'];
        $ratings = $_POST['ratings'];
        $stock = $_POST['stock'];
        move_uploaded_file($_FILES['brand_img']['tmp_name'],$brand_img);
        $str = "";
        foreach($_FILES['product_images']['tmp_name'] as $key=>$val){
            $filename = "product_images/".uniqid("pro").$_FILES['product_images']['name'][$key];        
            $tmp_name = $_FILES['product_images']['tmp_name'][$key]; 
            move_uploaded_file($tmp_name,$filename);
            $str .= "#$#".$filename;
        }
        $product_images = substr($str,3);
        $data = [
            "product_name"=>$product_name,
            "product_price"=>$product_price,
            "product_desc"=>$product_desc,
            "product_images"=>$product_images,
            "category"=>$category,
            "brand"=>$brand,
            "brand_img"=>$brand_img,
            "discount"=>$discount,
            "ratings"=>$ratings,
            "stock"=>$stock
        ];
        $res = $obj->insert("product",$data);
        echo $res;
    }
    //show product
    if(isset($_POST['show_product']) && $_POST['show_product']=="show-product"){
        $data = $obj->display("product");
        $output = "";
        foreach($data as $val){
            $img = explode("#$#",$val["product_images"]);
            $cat = $obj->fetch_data_by_id('category',$val["category"]);

            echo '<tr>
                    <td class="text-center"><a href=""><img src="../'.$img[0].'" alt=""></a></td>
                    <td class="text-center"><a class="Poppins color2 text-decoration-none" href="">'.substr($val['product_name'],0,30).'</a></td>
                    <td class="text-center"><a href=""><img src="../'.$val["brand_img"].'"></a></td>
                    <td class="text-center">'.$val["brand"].'</td>
                    <td class="text-center">'.$val["product_price"].'</td>
                    <td class="text-center">'.$val["discount"].'</td>
                    <td class="text-center">'.$cat["category"].'</td>
                    <td class="text-center">'.$val["stock"].'</td>
                    <td class="text-center">'.$val["ratings"].'</td>
                    <td class="text-center">'.$val["sell"].'</td>
                    <td class="text-center"><button class="product-edit-btn" data-id='.$val['id'].'><i class="fa-solid fa-pen-to-square"></i></button></td>
                    <td class="text-center"><button class="product-del-btn" data-id='.$val['id'].'><i class="fa-solid fa-trash"></i></button></td>
                </tr>';
        }
        echo $output;
    }
    //delete product
    if(isset($_POST['del_product']) && $_POST['del_product']=="del-product"){
        $id = $_POST['id'];
        $data = $obj->fetch_data_by_id("product",$id);
        $img = explode("#$#",$data['product_images']);
        foreach($img as $val){
            unlink($val);
        }
        unlink($data['brand_img']);
        $res = $obj->delete("product",$id);
        echo $res;
    }
    //update product
    // if(isset($_POST['edit_product']) && $_POST['edit_product']=="edit-product"){
    //     $id = $_POST['id'];
    //     $table = "product";
    // }
    //live product search
    if(isset($_POST['search_live_product']) && $_POST['search_live_product']=="search_live_product"){
        $table = $_POST['table'];
        $pat = $_POST['val'];
        $live_product = $obj->product_live_search($table,$pat);
        $output = "";
        if($live_product){
            foreach($live_product as $val){
                $img = explode("#$#",$val["product_images"]);
                $actual_price = $val['product_price']+($val['product_price']/(100-$val['discount']))*$val['discount'];
                $output .= '<div class="product-item col-md-2 col-4 p-0 border m-3">
                                <div class="product-img">
                                    <img src="'.$img[0].'" alt="">
                                </div>
                                <div class="product-info p-2 border-top">
                                    <a class="product-name color2 mt-1" href="">'.substr($val['product_name'],0,30).'...</a>
                                    <p class="product-ratings color6 bgc1 mt-1 mb-0"><i class="fa-solid fa-star mx-2 fa-sm"></i>'.$val["ratings"].'</p>
                                    <p class="product-price mt-1 mb-0 color1">
                                        MRP :
                                        <i class="fa-solid fa-indian-rupee-sign mx-1 fa-sm"></i><del>'.ceil($actual_price).'</del>
                                        <i class="fa-solid fa-indian-rupee-sign mx-1 fa-sm"></i>'.$val["product_price"].'
                                        <span class="discount text-success mx-2">'.$val["discount"].'% off</span>
                                    </p>
                                    <a class="product-shop-btn d-block text-center mt-1" href="product.php?pid='.$val["id"].'">Continue Shopping</a>
                                </div>
                            </div>';
            }
            echo $output;
        }
        else{
            echo 0;
        }
    }
    //add to bag
    if(isset($_POST['bag']) && $_POST['bag']== "add_to_bag"){
        $pid = $_POST['pid'];
        if(isset($_SESSION['user'])){
            $uid = $_SESSION['user']['id'];
            $Qty = 1;
            $data = [
                "pid" => $pid,
                "uid" =>$uid,
                "Qty" => $Qty
            ];
            // echo $uid;
            $check = $obj->check_cart($pid,$uid);
            if($check){
                echo 0;
                exit();
            }
            $res = $obj->insert("cart",$data);
            echo $pid;
        }else{
            if(!isset($_SESSION['bag'])){
                $_SESSION['bag']=[];                
            }
            elseif(in_array($pid, array_column($_SESSION['bag'], 'pid'))){
                echo 0;
                exit();
            }
            $Qty = 1;
            $_SESSION['bag'][$pid] = ["pid"=>$pid,"Qty"=>$Qty];
            echo $pid;
        }
    }
    //update bag 
    if(isset($_POST['update_bag']) && $_POST['update_bag']== "update_bag"){
        $pid = $_POST['pid'];
        $Qty = $_POST['Qty'];
        if(isset($_SESSION['user'])){
            $uid = $_SESSION['user']['id'];
            $res = $obj->update_cart($pid,$uid,$Qty);
            echo $res;
        }else{
            $_SESSION['bag'][$pid]['Qty'] = $Qty;
            echo $_SESSION['bag'][$pid]['Qty'];
        }        
    }
    // delete from bag 
    if(isset($_POST['del_bag']) && $_POST['del_bag']== "del_bag"){
        $pid = $_POST['pid'];
        if(isset($_SESSION['user'])){
            $uid = $_SESSION['user']['id'];
            $res = $obj->delete_cart($pid,$uid);
        }else{
            unset($_SESSION['bag'][$pid]);
        }
        echo 1;
    }
    //transfer session product to bag
    if(isset($_SESSION['user']) && isset($_SESSION['bag'])){
        $uid = $_SESSION['user']['id'];
        foreach($_SESSION['bag'] as $val){
            $pid = $val['pid'];
            $Qty = $val['Qty'];
            $check = $obj->check_cart($pid,$uid);
            if($check){
                continue;
            }
            $data =[
                'pid'=> $pid,
                'uid'=> $uid,
                'Qty'=> $Qty
            ];
            $res = $obj->insert("cart",$data);
        }
        unset($_SESSION['bag']);
    }
    //login check at the time of login
    if(isset($_POST['check_login']) && $_POST['check_login']== "check_login"){
        if(!isset($_SESSION['user'])){
            echo 0;
        }else if($_POST['total']==0){
            echo 2;
        }else{
            echo $_POST['total'];
        }
    }
?>