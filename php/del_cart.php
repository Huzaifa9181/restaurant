<?php
    // echo $_POST['d_id'];
    session_start();
    if(isset($_POST['d_id']) && !empty($_POST['d_id'])){
        foreach($_SESSION['add_to_cart'] as $key => $value){
            if($value['id'] == $_POST['d_id']){
                unset($_SESSION['add_to_cart'][$key]);
                $_SESSION['add_to_cart'] = array_values($_SESSION['add_to_cart']);
                echo "<script>swal('Deleted!', 'Item is removed into cart. Now you can update your cart','warning');</script>";
            }
        }
    }

?>