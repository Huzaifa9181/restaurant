<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include "database.php";
        session_start();

        $name = $_POST['name'];
        $email = $_POST['email'];
        $subj = $_POST['subject'];
        $msg = $_POST['message'];
        
        
        if($email == $_SESSION['email']){

            $to_email = $_POST['email'];
            $subject = "Yummy Resturant";
            $body =  'Hello '.$email. '! Thank you for contacting in Yummy Resturant. Your feedback will be resolved in few minutes : '. $msg;
            $headers = "From: huzaifaahmed1110@gmail.com";

            if(mail($to_email, $subject, $body, $headers)) {
                echo "Email successfully sent to $to_email...";
            } else{
                echo "Email sending failed...";
            }
            header("Location: ../index.php");

        }
        else{
            header("Location: ../index.php?login_contact=false");
        }

        


    }
?>