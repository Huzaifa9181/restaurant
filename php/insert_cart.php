<?php

    include "database.php";
    session_start();
    if(isset($_SESSION['add_to_cart'])){
        $count = count($_SESSION['add_to_cart']);
        for($i = 0; $i < $count; $i++){   

            $id =  $_SESSION['add_to_cart'][$i]['id'];
            $name =  $_SESSION['add_to_cart'][$i]['name'];
            $price =  $_SESSION['add_to_cart'][$i]['price'];
            $quantity =  $_SESSION['add_to_cart'][$i]['quantity'];
            $email = $_SESSION['email'];
            
            $sql = "INSERT INTO `order`( `order_name`,`order_id`, `order_price`, `order_quantity`, `user_email`) VALUES ('$name','$id','$price','$quantity','$email');";
            $result = mysqli_query($conn,$sql);
        };

        // print_r($_SESSION['add_to_cart']);
        unset($_SESSION["add_to_cart"]);
        
        header("Location: ../index.php?order=true");
    }
?>