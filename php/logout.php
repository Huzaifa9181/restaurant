<?php
    if(isset($_GET['logout']) && $_GET['logout'] == "true"){
        session_start();
        
        session_destroy();
        header("Location: ../index.php");
        
    }else{
        header("Location: ../index.php");
    }
?>