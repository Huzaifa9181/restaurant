<?php
    if(isset($_GET['logout']) && $_GET['logout'] == "true"){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../login.html?logout=true");
        
    }else{
        header("Location: ../login.html");
    }
?>