<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    
    <link href="../assets/css/main.css" rel="stylesheet">

  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <?php 
    session_start();
    
    include "header.php";?>
    <div class="container" style="margin-top: 150px;">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">People</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  <?php
    include "database.php";
    $email = $_SESSION['email'];
    
    $sql = "SELECT * FROM `table_reservation` WHERE email='$email';";
    $result = mysqli_query($conn,$sql);
    
    $count = 1;
    while($data = mysqli_fetch_assoc($result)){
        echo '<tr>
        <td>'.$count.'</td>
        <td>' . $data['email'] .'</td>
        <td>' . $data['phone'] .'</td>
        <td>' . $data['people'] .'</td>';
        if($data['table_book'] == 'Waiting..'){
          echo '<td class="text-warning">Waiting..</td>';
        }elseif($data['table_book'] == 'Booked'){
          echo '<td class="text-success">Booked</td>';
        }elseif($data['table_book'] == 'Cancel'){
          echo '<td class="text-danger"><b>Cancel<b></td>';
        }
        echo'
        <td>' . $data['date'] .'</td>
        <td>' . $data['time'] .'</td>
        
      </tr>';
      $count = $count +1;
    }

  ?>
    

        </tbody>
      </table>
    </div>
    
    

    <?php
    echo $_SESSION['email'];
      // include "footer.php";
    ?>
  </body>
</html>