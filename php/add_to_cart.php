<?php

    session_start();
    // session_destroy();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['id']) && !empty($_POST['id'])){
            if(isset($_SESSION['add_to_cart'])){
                $item_array_id = array_column($_SESSION['add_to_cart'], "id");
                if(!in_array($_POST['id'] , $item_array_id)){
                    if(count($_SESSION['add_to_cart']) > 0){
                        $id = $_POST['id'];
                        $name = $_POST['p_name'];
                        $price = $_POST['p_price'];
                        $quantity = $_POST['p_quantity'];
                        $count = count($_SESSION['add_to_cart']);
                        $_SESSION['add_to_cart'][$count] = array("id" => $id, "name" => $name,"price" => $price, "quantity" => $quantity);
                        // echo print_r($_SESSION['add_to_cart']);
                        echo"<script>alert('Item Added'); window.location.href='../index.php#menu';</script>";
                    }else{
                        echo "<script>alert('item already added');window.location.href='../index.php#menu';</script>";
                    }
                        
                }
            }else{
                $id = $_POST['id'];
                $name = $_POST['p_name'];
                $price = $_POST['p_price'];
                $quantity = $_POST['p_quantity'];
                $_SESSION['add_to_cart'][0] = array("id" => $id, "name" => $name,"price" => $price, "quantity" => $quantity);
                echo"<script>alert('Item Added'); window.location.href='../index.php#menu';</script>";
                echo print_r($_SESSION['add_to_cart']);
            }
        }

        if(isset($_POST['del_id']) && !empty($_POST['del_id'])){
            foreach($_SESSION['add_to_cart'] as $key => $value){
                if($value['id'] == $_POST['del_id']){
                    unset($_SESSION['add_to_cart'][$key]);
                    $_SESSION['add_to_cart'] = array_values($_SESSION['add_to_cart']);
                    echo"<script>alert('Item Removed'); window.location.href='cart.php';</script>";
                }
            }
        }

        if(isset($_POST['quantity']) && !empty($_POST['quantity_id'])){
            foreach($_SESSION['add_to_cart'] as $key => $value){
                if($value['id'] == $_POST['quantity_id']){
                    $_SESSION['add_to_cart'][$key]['quantity'] = $_POST['quantity'];
                    echo"<script>window.location.href='cart.php';</script>";
                }
            }
        }
    }
    

?>

