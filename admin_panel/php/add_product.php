<?php
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST['add_name'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    $img = $_FILES['upload'];
  
        
    // echo "<pre>";
    // echo print_r($img);
    // echo "</pre>";
    
    $file_name = $_FILES['upload']['name'];
    $file_path = $_FILES['upload']['full_path'];
    $file_type =  $_FILES['upload']['type'];
    $file_tmp = $_FILES['upload']['tmp_name'];
    $file_error = $_FILES['upload']['error'];
    $file_size = $_FILES['upload']['size'];
  
    if(move_uploaded_file($file_tmp,"../uploads/".$file_name)){
        include "database.php";
        $sql = "INSERT INTO `products` (`name`, `path`, `price`, `cat_id`) VALUES ('$name', '$file_name', '$price', '$cat');
        ";
        $result = mysqli_query($conn,$sql);
      header("location: products.php?add_product=true");

    }else{
      header("location: products.php?add_product=false");
    }
  

  }  
?>