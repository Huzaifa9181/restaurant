<?php
    include "database.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['pass'];
        
        
        $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password';";
        $result = mysqli_query($conn,$sql);
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            $data = mysqli_fetch_assoc($result);             
            session_start();
            $_SESSION['Loggedin'] = "true";
            $_SESSION['email'] = $data['email'];
            $_SESSION['role_id'] = $data['role_id'];
            $_SESSION['phone'] = $data['phone_no'];
            $_SESSION['name'] = $data['name'];

            header("Location: ../index.php?login=true");
        }else{
            header("Location: ../index.php?user_exsist=false");
        }


    }
?>  