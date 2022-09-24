<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
         $quan = $_POST['quantity'];
         $price = $_POST['p_price'];
        $name = $_POST['p_name'];
        $id = $_POST['p_id'];
        // echo print_r($name);
        // echo print_r($price);
        // echo print_r($quan) . "<br>";
        // echo print_r($id);
        // echo $count = count($id) . "<br>";

        session_start();
        if(isset($_POST['quantity']) && !empty($_POST['p_id'])){
            foreach($_SESSION['add_to_cart'] as $key => $value){
                $count = count($id);
                for($i=0; $i < $count; $i++){
                    if($value['id'] == $_POST['p_id'][$i]){
                        $_SESSION['add_to_cart'][$key]['quantity'] = $_POST['quantity'][$i];

                        echo"<script>window.location.href='cart.php';</script>";
                    }
                }
                
            }
        }

        echo print_r($_SESSION['add_to_cart']);

        
    }
?>