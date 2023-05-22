<?php
    session_start();
    // $_SESSION['cart']=[];
    echo "<pre>";
    // print_r($_SESSION['cart']);
    // //update

    //  $_SESSION['cart']["7a"] = ["pid"=>4,"pname"=>"dhb","price"=>30000,"qty"=>4];
    //  $_SESSION['cart']["8a"] = ["pid"=>5,"pname"=>"Tv","price"=>20000,"qty"=>5];
    //  $_SESSION['cart']["9a"] = ["pid"=>6,"pname"=>"mob","price"=>10000,"qty"=>6];
    //  $_SESSION['cart']["10a"] = ["pid"=>7,"pname"=>"lap","price"=>30000,"qty"=>4];
    // $_SESSION['cart'][8]['qty']= 10;

    //  delete
    // unset($_SESSION['cart'][2]);
    //  print_r($_SESSION['cart']);
    // if(array_search(4, array_column($_SESSION['cart'], 'pid')) != 0){
    //     echo "present";
    // }else{
    //     echo "not present";
    // }
    // echo in_array(5, array_column($_SESSION['cart'], 'pid'));
    // print_r($_SESSION['bag']);
    // print_r($_SESSION['bag'][14]);

    // unset($_SESSION['bag']);
    // unset($_SESSION['cart']);
        // echo count($_SESSION['cart']);
        session_destroy();

        
?>