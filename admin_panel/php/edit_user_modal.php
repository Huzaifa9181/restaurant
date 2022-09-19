<?php
    include "database.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone_no = $_POST['phone_no'];
        $role = $_POST['role'];
        $id = $_POST['hidden_id'];

        $sql = "UPDATE `users` SET  `email` = '$email', `phone_no` = '$phone_no', `password` = '$password', `role_id` = '$role' WHERE `users`.`id` = $id;";
        $result = mysqli_query($conn,$sql);
        header("Location: users.php?edit=true");
    }else{
        header("Location: users.php?edit=false");
    }
?>
