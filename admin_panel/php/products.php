<?php
    session_start();
    if(isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == "true" && $_SESSION['role_id'] == 1){

    }else{
        header("Location: login.html");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Products - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="../index.php">Yummy Restaurant</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php?logout=true">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                            aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Yummy Details
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="users.php">User Details</a>
                                            <a class="nav-link" href="../tables.php">Booking Details</a>
                                            <a class="nav-link" href="products.php">Product Details</a>
                                            <a class="nav-link" href="category.php">Category Details</a>
                                        </nav>
                                    </div>    
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Addons</div>

                        <a class="nav-link" href="../tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tables
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Yummy Restaurant
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Products</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Products
                        </div>
                        <div class="card-body">
                            <button class="mb-2 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add
                                Products</button>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        include "database.php";
                                        $sql = "SELECT * FROM `products`;";
                                        $result = mysqli_query($conn,$sql);
                                        $count = 1;
                                        while($data = mysqli_fetch_assoc($result)){
                                            $id = $data['cat_id'];
                                            $c_sql = "SELECT * FROM `category` WHERE id= $id;";
                                            $c_result = mysqli_query($conn,$c_sql);
                                            $row = mysqli_fetch_assoc($c_result);

                                            echo '<tr>
                                            <td>'.$count.'</td>
                                            <td>' . $data['name'] .'</td>
                                            <td>$' . $data['price'] .'</td>
                                            <td>' . $row['cat_name'] .'</td>
                                            <td>' . $data['time'] .'</td>
                                            ';
                                            echo " <td><span><button data-id=".$data['id']." class='btn btn-success my-2 mx-2 edit_btn' data-bs-toggle='modal' data-bs-target='#editModal'>Edit</button>||<a href='?delet=".$data['id']."' class='mx-2 btn btn-danger ' >Delet</a></span></td>
                                            </tr>";
                                          $count = $count +1;
                                        }
                                        
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>


            <!-- ADD MODAL -->
            <!-- Modal -->
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Add Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="add_product.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="add_name" class="form-label">Add Product Name</label>
                                    <input type="text" required class="form-control" name="add_name">
                                </div>
                                <div class="mb-3">
                                    <label for="price" class="form-label">Product Price</label>
                                    <input type="number" required class="form-control" name="price">
                                </div>
                                <select class="form-select mb-3" name="cat" aria-label="Select Product Category">
                                    <option selected>Select Product Category</option>
                                    <?php
                                        $sql = "SELECT * FROM `category`;";
                                        $result = mysqli_query($conn,$sql);
                                        while($data = mysqli_fetch_assoc($result)){
                                        echo'
                                        <option value="'.$data['id'].'">'.$data['cat_name'].'</option>
                                        ';        
                                        }
                                    ?>
                                </select>
                                <div class="input-group mb-3">
                                    <input type="file" name="upload" class="form-control" id="inputGroupFile02">
                                </div>

                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            <!-- ADD MODAL -->

            <!-- Edit Modal -->

            <!-- Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="products.php">
                                <div class="mb-3">
                                    <label for="p_name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" name="p_name" id="p_name">
                                </div>
                                <div class="mb-3">
                                    <label for="p_price" class="form-label">Product Price</label>
                                    <input type="text" class="form-control" name="p_price" id="p_price">
                                    <input type="hidden" class="form-control" name="hidden_id" id="hidden_id">
                                </div>
                                <select class="form-select mb-3" name="category" aria-label="Select Product Category">
                                    <option selected>Select Product Category</option>
                                    <?php
                                        $sql = "SELECT * FROM `category`;";
                                        $result = mysqli_query($conn,$sql);
                                        while($data = mysqli_fetch_assoc($result)){
                                        echo'
                                        <option value="'.$data['id'].'">'.$data['cat_name'].'</option>
                                        ';        
                                        }
                                    ?>
                                </select>
                            
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Edit Modal  -->


            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Yummy Restaurant | 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../js/datatables-simple-demo.js"></script>
    <script>
    $(document).ready(function() {

        // function edit(id) {
        //     $.ajax({
        //         url: "cat_edit_ajax.php",
        //         type: "POST",
        //         data: {
        //             id: id
        //         },
        //         success: function(data) {
        //             $("#cat_name").val(data);
        //         }
        //     })
        // }

        $(".edit_btn").click(function() {
            var id = $(this).data('id');
            $("#hidden_id").val(id);
            // console.log(id);
            // edit(id);

        })

    })
    </script>
</body>

</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['cat_name']) && !empty($_POST['hidden_id'])){
            $cat_name = $_POST['cat_name'];
            $hidden_id = $_POST['hidden_id'];

            $sql = "UPDATE `category` SET `cat_name` = '$cat_name' WHERE `category`.`id` = $hidden_id;";
            $result = mysqli_query($conn,$sql);
        }

        
        if(!empty($_POST['add_name'])){
            $name = $_POST['add_name'];
            $sql = "INSERT INTO `category` (`cat_name`) VALUES ('$name'); ";
            $result = mysqli_query($conn,$sql);
        }
    }
    

    if(isset($_GET['delet']) && !empty($_GET['delet'])){
        $id = $_GET['delet'];
        $sql = "DELETE FROM `products` WHERE `products`.`id` = $id";
        $result = mysqli_query($conn,$sql);
    }

    if(isset($_POST['p_name']) && !empty($_POST['p_price'])){
        $id = $_POST['hidden_id'];
        $name = $_POST['p_name'];
        $price = $_POST['p_price'];
        $category = $_POST['category'];
        // echo "<script>alert('$hidden_id')</script>";
    
        $e_sql = "UPDATE `products` SET `name` = '$name', `price` = '$price', `cat_id` = '$category' WHERE `products`.`id` = $id; ";    
        if($e_result = mysqli_query($conn,$e_sql)){
            header("Location: products.php");
        }else{
            header("Location: products.php?update=false");
        }
    }
?>
