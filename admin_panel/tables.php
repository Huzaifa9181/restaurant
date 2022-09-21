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
        <title>Table Reservation - Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Yummy Restaurant</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="php/logout.php?logout=true">Logout</a></li>
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
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Yummy Details
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="php/users.php">User Details</a>
                                            <a class="nav-link" href="tables.php">Booking Details</a>
                                            <a class="nav-link" href="php/products.php">Product Details</a>
                                            <a class="nav-link" href="php/category.php">Category Details</a>
                                        </nav>
                                    </div>    
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            
                            <a class="nav-link" href="tables.php">
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
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table Reservation Request
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>People</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S.no</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>People</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        include "php/database.php";
                                        $sql = "SELECT * FROM `table_reservation`;";
                                        $result = mysqli_query($conn,$sql);
                                        $count = 1;
                                        while($data = mysqli_fetch_assoc($result)){
                                            
                                            echo '<tr>
                                            <td>'.$count.'</td>
                                            <td>' . $data['email'] .'</td>
                                            <td>' . $data['phone'] .'</td>
                                            <td>' . $data['people'] .'</td>
                                            <td>' . $data['date'] .'</td>
                                            <td>' . $data['time'] .'</td>'; 
                                            if($data['table_book'] == "Cancel"){
                                                echo '<td class="text-danger"><b>Cancel</b></td>';
                                            }elseif($data['table_book'] == "Booked"){
                                                echo '<td class="text-success"><b>Booked</b></td>';
                                            }else{
                                                echo " <td><span><a href='?approve_id=".$data['id']."' class='btn btn-success my-2 mx-2 '>Approve</a>||<a href='?cancel=".$data['id']."' class='mx-2 btn btn-danger ' >Decline</a></span></td>
                                              </tr>";
                                            }
                                          $count = $count +1;
                                        }
                                        
                                    ?>


                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php
    if(isset($_GET['cancel']) && !empty($_GET['cancel']) ){
        $id = $_GET['cancel']; 
    
        $sql = "SELECT * FROM `table_reservation` WHERE id = $id";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);

        $to_email = $data['email'];
        $subject = "Yummy Restaurant";
        $body =  'Hello Yummy Customer Thank you for booking table in Yummy Resturant. But we are apoligies for not booking your table because this date and time seats are already booked for further details go to the website and register the new table : http://localhost/resturant/php/table_reservation.php';
        $headers = "From: huzaifaahmed1110@gmail.com";

        if(mail($to_email, $subject, $body, $headers)) {
            $sql = "UPDATE `table_reservation` SET `table_book` = 'Cancel' WHERE `id` = $id";
            $result = mysqli_query($conn,$sql);
            echo "<script>alert('Successfully email sent the customer')</script>";
        } else{
            echo "<script>alert('Unsuccessfully email does not sent the customer')</script>";
        }
    }
    
    if(isset($_GET['approve_id']) && !empty($_GET['approve_id']) ){
        $a_id = $_GET['approve_id']; 
        $sql = "SELECT * FROM `table_reservation` WHERE id = $a_id";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);

        $to_email = $data['email'];
        $subject = "Yummy Restaurant";
        $body =  'Hello Yummy Customer Thank you for booking table in Yummy Resturant. Your seat will be booked for further details go to the website : http://localhost/resturant/php/table_reservation.php';
        $headers = "From: huzaifaahmed1110@gmail.com";

        if(mail($to_email, $subject, $body, $headers)) {
            $a_id = $_GET['approve_id']; 
            $sql = "UPDATE `table_reservation` SET `table_book` = 'Booked' WHERE `id` = $a_id";
            $result = mysqli_query($conn,$sql);
            echo "<script>alert('Successfully email sent the customer')</script>";

        } else{
            echo "<script>alert('Unsuccessfully email does not sent the customer')</script>";
        }
    }
?>
