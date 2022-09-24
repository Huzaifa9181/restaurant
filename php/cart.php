<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add To Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="../assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <style>
    .table-cont {
        margin-top: 143px !important;
    }

    .pay {
    background: #cdc5c5;
    }
    </style>
</head>

<body>

    <?php
        session_start();
        include "database.php";
        include "header.php";
    ?>

    <div class="container-fluid table-cont">
        <h1 class="mt-5 mb-5 text-center" style="background: #cdc5c5;">MY CART</h1>
        <div class="row">
            <div class="col-md-8">
                <table class="table table-sm mt-5 mx-5">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                
                    $number = 1;

                    if(isset($_SESSION['add_to_cart']) && !empty($_SESSION['add_to_cart'])){
                        foreach($_SESSION['add_to_cart'] as $key => $value ){
                            $sql = "SELECT * FROM `products` WHERE id =$value[id];";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result);

                            // $total;
                            // $price= $value['price'];
                            // $total = $total + $price;

                            echo'<tr>
                            <td>'.$number.'</td>
                            <td>'.$value['name'].'</td>
                            <td>'.$value['price'].'</td>
                            
                            
                            <form method="post" action="add_to_cart.php">
                                <div class="input-group mb-3">
                                    <td>
                                    <span style="display: flex;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="number" style="width: 36px;" value="'.$value['quantity'].'" class="quantity inp-quantity text-center" onchange="this.form.submit();" name="quantity">
                                    <button class="input-group-text increment-btn">+</button>
                                    </span>
                                    </td>

                                    <input type="hidden" name="quantity_id" value="'.$value['id'].'">
                                </div>
                            </form>
                            
                            <td>
                                <form method="post" action="add_to_cart.php">
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                    <input type="hidden" name="del_id" value="'.$value['id'].'">
                                
                                </form>
                            </td>
                            </tr>';
                            $number = $number + 1;

                            
                        }
                    }    
                ?>
                    </tbody>
                </table>
                
            </div>
            <div class="col-md-3 mt-5 mx-5">
            
                <div class="pay">
                    <h3 class="text-center p-3">Total Amount    </h3>
                    <h5 class="text-center">$<?php echo $total = 0; ?></h5>
                    <a href="insert_cart.php" class="btn btn-primary m-2" id="pay-btn">Check Out</a>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function(){
            $("#pay-btn").on("click",function(){
                var data = $(".quantity").val();
                console.log(data);
            });

            $(".increment-btn").click(function(e){
                e.preventDefault();
                var qty = $(this).closest(".table-cont").find(".inp-quantity").val();

                var value = parseInt(qty, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10){
                    value ++;
                    $(".inp-quantity").val(value);
                    $(this).closest(".table-cont").find(".inp-quantity").val();
                }
            })

            $(".decrement-btn").click(function(e){
                e.preventDefault();
                var qty = $(this).closest(".table-cont").find(".inp-quantity").val();

                var value = parseInt(qty, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 1){
                    value --;
                    $(".inp-quantity").val(value);
                    $(this).closest(".table-cont").find(".inp-quantity").val();
                }
            })
        })


    </script>
</body>

</html>