<?php
    session_start();
    include 'crud.php';
    $obj = new Database();
    date_default_timezone_set("Asia/Kolkata");
    if(isset($_SESSION['user'])){
        $uid = $_SESSION['user']['id'];
        $paymode = $_POST['pay'];
        $data = $obj->fetch_data_from_bag($uid);
        foreach($data as $val){
             $oid = uniqid("ord");
             $pid = $val['pid'];
             $Qty = $val['Qty'];
             $issue_date = date("Y-m-d H:i:s",strtotime("now"));
             $rand = rand(1,5);
             $delivary_date = date("Y-m-d H:i:s",strtotime("now+".$rand."minutes"));
             $order = [
                "oid"=>$oid,
                "uid"=>$uid,
                "pid"=>$pid,
                "Qty"=>$Qty,
                "issue_date"=>$issue_date,
                "delivary_date"=>$delivary_date,
                "pay_mode"=>$paymode,
                "status"=>"On Going"
             ];
             $res = $obj->insert('user_order',$order);
        }
        $res = $obj->delete_cart_all($uid);
        echo $res;
    }else{
        echo "0";
    }
    echo $paymode;
?>