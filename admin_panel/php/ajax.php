<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
    include 'database.php';

        $id = $_POST['edit_id'];
        $sql = "SELECT * FROM `users` WHERE id = $id";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $password = $row['password'];
        $phone_no = $row['phone_no'];
        $role = $row['role_id'];
        
        
$output='';

        $output = '
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">MOdal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="edit_user_modal.php" method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" value="'.$email.'" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" value="'.$password.'" id="password">
                                </div>
                                <div class="mb-3">
                                    <label for="Number" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="Number" value="'.$phone_no.'" name="phone_no">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" name="role" value="'.$role.'" class="form-control" id="role">
                                </div>
                                <input type="hidden" name="hidden_id" class="form-control hidden_id">
        
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- edit modal -->';

            echo $output;
        // echo $array;
        // echo $id;
        // echo $pass = $row['password'];
        // echo $phone = $row['phone_no'];
        // echo $role = $row['role_id'];
    }
?>


