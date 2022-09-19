<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        include "database.php";

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $people = $_POST['people'];
        $msg = $_POST['message'];
        
        $sql="SELECT * FROM `table_reservation` WHERE email='$email' AND date='$date';";
        $result = mysqli_query($conn,$sql);

        $rows = mysqli_num_rows($result);

        if($rows == 0){
            $sql = "INSERT INTO `table_reservation` (`email`, `phone`, `people`,`table_book`, `date`, `time`) VALUES ( '$email', '$phone', '$people','Waiting..', '$date', '$time');";
            $result = mysqli_query($conn,$sql);

            // mail
            $time = $_POST['time'];

            $to_email = $_POST['email'];
            $subject = "Yummy Resturant Book Table";
            $body =  'Hello '.$email. ' Thank you for booking table in Yummy Resturant. Your reserved seat date is : '. $date . '. Your booking table time is : '. $time .' and Your beautiful message is : '. $msg;
            $headers = "From: huzaifaahmed1110@gmail.com";

            if(mail($to_email, $subject, $body, $headers)) {
                echo "Email successfully sent to $to_email...";
            } else{
                echo "Email sending failed...";
            }
            header("Location: ../index.php");

        }
        else{
            header("Location: ../index.php?table=false");
        }

        


    }
?>