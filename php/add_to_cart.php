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
                        echo"<script>window.location.href='../index.php?item=true#menu';</script>";
                    }else{
                        $id = $_POST['id'];
                        $name = $_POST['p_name'];
                        $price = $_POST['p_price'];
                        $quantity = $_POST['p_quantity'];
                        $_SESSION['add_to_cart'][0] = array("id" => $id, "name" => $name,"price" => $price, "quantity" => $quantity);
                        echo "<script>window.location.href='../index.php?item=true#menu';</script>";
                    }
                        
                }else{
                    echo"<script>window.location.href='../index.php?item=false#menu';</script>";
                }
            }else{
                $id = $_POST['id'];
                $name = $_POST['p_name'];
                $price = $_POST['p_price'];
                $quantity = $_POST['p_quantity'];
                $_SESSION['add_to_cart'][0] = array("id" => $id, "name" => $name,"price" => $price, "quantity" => $quantity);
                echo"<script>window.location.href='../index.php?item=true#menu';</script>"; 
                echo print_r($_SESSION['add_to_cart']);
            }
        }
        
    }
    

?>

