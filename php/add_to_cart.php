<?php

    session_start();
    // session_destroy();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['id']) && !empty($_POST['id'])){
            if(isset($_SESSION['add_to_cart'])){
                $item_array_id = array_column($_SESSION['add_to_cart'], "id");
                if(!in_array($_POST['id'] , $item_array_id)){
                    $id = $_POST['id'];
                    $count = count($_SESSION['add_to_cart']);
                    $_SESSION['add_to_cart'][$count] = array("id" => $id);
                    echo print_r($_SESSION['add_to_cart']);
                }else{
                    echo "<script>alert('item already added');window.location.href='index.php';</script>";
                }
            }else{
                $id = $_POST['id'];
                $_SESSION['add_to_cart'][0] = array("id" => $id);
                // echo print_r($_SESSION['add_to_cart']);
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
    }
    

?>

