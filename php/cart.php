


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
    #pay-btn {
        position: relative;
        left: 122px;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
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
                    <form method="post" action="update_cart.php" id="cart-form">
                        <?php
                
                    $number = 1;
                    $q= 0;
                    $total = 0;
                    if(isset($_SESSION['add_to_cart']) && !empty($_SESSION['add_to_cart'])){
                        $price = 0;
                        $quan = 0;
                        foreach($_SESSION['add_to_cart'] as $key => $value ){
                            $sql = "SELECT * FROM `products` WHERE id =$value[id];";
                            $result = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($result); 
                            
                            if ( !empty($value['quantity']) ) {
                                    $total = $total + $value['price'] * $value['quantity'][0];
                            } else {
                                echo "adas";
                                // $total = 0;
                            }


                            echo'<tr>
                                <td>'.$number.'</td>
                                <td>'.$value['name'].'
                                <input type="hidden" name="p_name[]" value="'.$value['name'].'">
                                </td>
                                <td>'.$value['price'].'
                                <input type="hidden" name="p_price[]" value="'.$value['price'].'">
                                </td>
                                <div class="input-group mb-3">
                                    <td>
                                    <span style="display: flex;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="number" style="width: 50px;" value="'.$value['quantity'][0].'" class=quantity inp-quantity text-center" name="quantity[]">
                                    <button class="input-group-text increment-btn">+</button>
                                    </span>
                                    </td>
                                    <input type="hidden" name="p_id[]" value="'.$value['id'].'">
                                </div>
                            <td>
                                    <button data-id="'.$value['id'].'" class="btn btn-danger del_btn"><i class="bi bi-trash"></i></button>
                            </td>
                            </tr>';
                            $number = $number + 1;
                            
                        }
                    }    
                    // echo print_r();
                    ?>
                    </form>
                    </tbody>
                </table>
                <?php
                    if(isset($_SESSION['add_to_cart'][0]['id'])){
                        echo' <button type="submit" form="cart-form" class="btn btn-success mx-5" id="update-btn">Update</button>';
                    }
                ?>
            </div>
            <div class="col-md-3 mt-5 mx-5">
            <?php
            if(isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == "true"){
                if($total > 0){
                    echo'  
                     <div class="pay mt-5 p-2">
                           <h3 class="text-center pt-3"><b>Total Amount<b></h3>
                           <h5 class="text-center"><b>$'. $total.'</b></h5>
                           <a href="insert_cart.php" class="btn btn-primary m-2" id="pay-btn">Check Out</a>
                       </div>
                   </div>';
                }else{
                    echo'  
                     <div class="pay mt-5 p-2">
                           <h3 class="text-center pt-3"><b>Total Amount<b></h3>
                           <h5 class="text-center"><b>$'. $total=0 .'</b></h5>
                           <a href="insert_cart.php" class="btn btn-primary m-2" id="pay-btn">Check Out</a>
                       </div>
                   </div>';
                }
            }else{
                echo'  
                 <div class="pay mt-5">
                       <h3 class="text-center p-3">First you Logged In then your order is place</h3>
                   </div>
               </div>';
            }
            ?>
        </div>

    </div>

    

    <div class="alert"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function(){
            $("#pay-btn").on("click",function(){
                var data = $(".quantity").val();
                console.log(data);
            });

            $('.increment-btn').click(function(e){
                e.preventDefault();
                var input = $(this).prev('.quantity');
                console.log(input.val());
                if ( input != '' ) {
                    var value = parseInt(input.val()) + 1;
                } else {
                    var value = 1;
                }
                input.val(value);
            });

            $('.decrement-btn').click(function(e){
                e.preventDefault();
                var input = $(this).next('.quantity');
                if ( input.val() > 1 ) {
                    var value = parseInt(input.val()) - 1;
                    input.val(value);
                }
            });

            $(".del_btn").click(function(e){
                e.preventDefault();
                var d_id = $(this).data("id");
                $.ajax({
                    url : "del_cart.php",
                    type : "POST",
                    data : {d_id : d_id},
                    success: function(data){
                        $(".alert").html(data);
                        // console.log(data);
                    }
                })
            })

        })


    </script>
</body>

</html>



