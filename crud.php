<?php
    class Database{
        private $db_host = "localhost";
        private $db_user = "root";
        private $db_pass = "";
        private $db_name = "ecomerce";

        private $conn;
        public function __construct(){
            $this->conn = new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
            // if($this->conn){
            //     echo "connected";
            // }else{
            //     echo "failed";
            // }
        }
        public function insert($table,$data){
            $table_columns = join(', ', array_keys($data));
            $table_val = join("', '", array_values($data));
            $sql = "INSERT INTO $table($table_columns) VALUES ('$table_val')";
            if($this->conn->query($sql)){
               return 1;
            }else{
                return 0;
            }
            // return $sql;
        }
        public function display($table){
            $sql = "SELECT * FROM $table";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return 0;
            }
        }
        public function display_by_pattern($table,$pat){
            $sql = "SELECT * FROM $table WHERE name LIKE '%$pat%'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return 0;
            }
        }
        
        public function product_live_search($table,$pat){
            $sql = "SELECT * FROM $table WHERE product_name LIKE '%$pat%'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                return $result->fetch_all(MYSQLI_ASSOC);
            }else{
                return 0;
            }
        }
        public function display_some($table,$data){
            $sql = "SELECT * FROM $table WHERE email = '$data'";
            $res = $this->conn->query($sql);
            if($res->num_rows == 1){
                $data = $res->fetch_assoc();
                return $data;
            }else{
                return 0;
            }
        }
        public function fetch_data_by_id($table,$id){
            $sql = "SELECT * FROM $table WHERE id = '$id'";
            $res = $this->conn->query($sql);
            if($res->num_rows == 1){
                $data = $res->fetch_assoc();
                return $data;
            }
        }
        public function fetch_data_from_bag($uid){
            $sql = "SELECT pid,Qty FROM cart WHERE uid = '$uid'";
            $res = $this->conn->query($sql);
            if($res->num_rows > 0){
                $data = $res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }else{
                return 0;
            }
        }
        public function fetch_data_from_user_order($uid){
            $sql = "SELECT * FROM user_order WHERE uid = '$uid' ORDER BY issue_date DESC";
            $res = $this->conn->query($sql);
            if($res->num_rows > 0){
                $data = $res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }else{
                return 0;
            }
        }
        public function check_user_order($uid){
            $sql = "SELECT * FROM user_order WHERE uid = '$uid'";
            $res = $this->conn->query($sql);
            if($res->num_rows > 0){
                return 1;
            }else{
                return 0;
            }
        }
        public function fetch_data_by_category($table,$cid){
            $sql = "SELECT * FROM $table WHERE category = '$cid'";
            $res = $this->conn->query($sql);
            if($res->num_rows >0){
                $data = $res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }
        }
        public function top_ratings(){
            $sql = "SELECT * FROM product WHERE ratings between 3.5 and 5.0";
            $res = $this->conn->query($sql);
            if($res->num_rows > 0){
                $data = $res->fetch_all(MYSQLI_ASSOC);
                return $data;
            }else{
                return 0;
            }
        }
        public function update($table,$data){
            $id = $data['id'];
            $name = $data['name'];
            $gender = $data['gender'];
            $email = $data['email'];
            $phone = $data['phone'];
            $img = $data['img'];
            $address = $data['address'];
            $city = $data['city'];
            $state = $data['state'];
            $zip = $data['zip'];
            $pass = $data['pass'];

            $sql = "UPDATE $table SET name ='$name', gender ='$gender', email='$email', phone='$phone', img='$img', address='$address', city='$city', 
            state='$state', zip='$zip', pass='$pass' WHERE  id = $id";
          
            if($this->conn->query($sql)){
                return 1;
            }else{
                return 0;
            }
        }
        public function order_status_update($uid){
            $sql = "UPDATE user_order SET status = 'Delivered' WHERE now() > delivary_date AND uid = $uid";
            $this->conn->query($sql);
        }
        public function update_slider($table,$data){
            $id = $data['id'];
            $slide1 = $data['slide1'];
            $slide2 = $data['slide2'];
            $slide3 = $data['slide3'];
            $slide4 = $data['slide4'];
            $slide5 = $data['slide5'];

            $sql = "UPDATE $table SET slide1 ='$slide1', slide2 ='$slide2', slide3='$slide3', slide4='$slide4', slide5='$slide5' WHERE  id = $id";
          
            if($this->conn->query($sql)){
                return 1;
            }else{
                return 0;
            }
        }
        public function update_cart($pid,$uid,$Qty){
            $sql = "UPDATE cart SET Qty = $Qty WHERE  pid = $pid AND uid = $uid";          
            if($this->conn->query($sql)){
                return 1;
            }else{
                return 0;
            }
        }
        public function check_cart($pid,$uid){
            $sql = "SELECT * FROM cart WHERE  pid = $pid AND uid = $uid"; 
            $res = $this->conn->query($sql);         
            if($res->num_rows > 0){
                return 1;
            }else{
                return 0;
            }
            return $sql;
        }
        public function delete_cart($pid,$uid){
            $sql = "DELETE FROM cart WHERE  pid = $pid AND uid = $uid";          
            if($this->conn->query($sql)){
                return 1;
            }else{
                return 0;
            }
            // return $sql;
        }
        public function delete_cart_all($uid){
            $sql = "DELETE FROM cart WHERE uid = $uid";          
            if($this->conn->query($sql)){
                return 1;
            }else{
                return 0;
            }
            // return $sql;
        }
        public function __destruct(){
            $this->conn->close();
        }
        public function delete($table,$id){
            $sql = "DELETE FROM $table WHERE  id = $id";
          
            if($this->conn->query($sql)){
                return 1;
            }else{
                return 0;
            }
        }
    }
    // $obj = new Database();
    // $obj->display_some("admin","admin@gmail.com");
?>