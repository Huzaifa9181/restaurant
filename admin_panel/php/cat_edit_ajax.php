<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id =  $_POST['id'];
        include "database.php";
        $sql = "SELECT * FROM `category` WHERE id=$id;";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        echo $data['cat_name'];
        
    }  
?>