<header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a href="../index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Yummy<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <?php
                    if(isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == "true"){
                        echo'                                                  
                        <li><a href="table_reservation.php">Table Reservation</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <!-- .navbar -->
            <div>
                <?php
                    if(!isset($_SESSION['Loggedin'])){
                        echo'
                        <a class="btn-book-a-table" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</a>
                        <a class="btn-book-a-table" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>    
                        ';

                    }else{

                        echo '<a href="php/logout.php?logout=true" class="btn-book-a-table">Logout</a>';
                    }    
                ?>
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>