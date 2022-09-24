<!-- SignUp Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="signupModalLabel">SignUp Users</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="signup_handle.php" method="post">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" required class="form-control" maxlength="20" name="name"
                                            id="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" required class="form-control" maxlength="50" name="email"
                                            id="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Phone Number</label>
                                        <input type="number" required class="form-control" maxlength="11" name="number"
                                            id="number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="pass" class="form-label">Password</label>
                                        <input type="password" required class="form-control" name="password" id="pass">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cpass" class="form-label">Confirm Password</label>
                                        <input type="password" required class="form-control" name="cpass" id="cpass">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Login Modal -->
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel">Log In User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="login_handle.php" method="post">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" required class="form-control" maxlength="50" name="email"
                                            id="email" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">We'll never share your email with anyone
                                            else.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pass" class="form-label">Password</label>
                                        <input type="password" required class="form-control" name="pass" id="pass">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Log In</button><br><br>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


<div class="container mb-5">
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

                            echo '<a href="logout.php?logout=true" class="btn-book-a-table">Logout</a>';
                        }    
                    ?>

                
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
</div>