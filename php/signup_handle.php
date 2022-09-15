<?php
    include "database.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['number'];
        $password = $_POST['password'];
        $cpass = $_POST['cpass'];
        
        $sql = "SELECT * FROM `users` WHERE email='$email';";
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($result);
        if($rows == 0){
            if($password == $cpass){
                $sql = "INSERT INTO `users` (`name`, `email`, `phone_no`, `password`,`role_id`) VALUES ('$name', '$email', '$phone', '$password' , '2');";
                $result = mysqli_query($conn,$sql);
                header("Location: ../index.php");
            }else{
                header("Location: ../index.php?pass_match=false");
            }
        }else{
            
            header("Location: ../index.php?user_exsist=true");
        }


    }
?>  