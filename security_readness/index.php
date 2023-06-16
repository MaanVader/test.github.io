<?php
session_start();

include("include/dbConn.php");

if (isset($_POST['signin'])) {

  $result = "";
  $email = $_POST['email'];
  $password = $_POST['password'];

  $employee = mysqli_query($con, " select * from user where user_email='$email' and user_password='$password' and user_role='employee' ");
  $rowE = mysqli_fetch_assoc($employee);
  $runE = mysqli_num_rows($employee);

  $admin = mysqli_query($con, " select * from user where user_email='$email' and user_password='$password' and user_role='admin' ");
  $rowA = mysqli_fetch_assoc($admin);
  $runA = mysqli_num_rows($admin);

  if ($runE == 1) {

    $_SESSION['employee'] = $email;
    $_SESSION['employeeID'] = $rowE['user_id'];
    header("location: employee/index.php");
  } elseif ($runA == 1) {

    $_SESSION['admin'] = $email;
    $_SESSION['user_id'] = $rowA['user_id'];
    header("location: admin/index.php");
  } else {
    $result = '<div class="alert alert-danger"><strong>Failed!</strong> Enter a correct email and password. <a href="index.php">x</a></div> ';
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SecurityReadiness</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/scrolling-nav.css" rel="stylesheet">
  <link href="css/floating-labels.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <?php
  include("include/header.php");
  ?>


  <div class="sign">
    <!-- Page Content -->
    <div class="form-signin" method="post">
      <div class="text-center mb-4">

        <h1 class="h3 mb-3 font-weight-normal">Sign in</h1>

      </div>
      <div>

        <?php

        if (isset($_POST['signin'])) {

          echo $result;
        }
        ?>

      </div>

      <form method="post" enctype="multipart/form-data">
        <div class="form-label-group mt-2">
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required>
          <label for="inputEmail">Email address</label>
        </div>

        <div class="form-label-group">
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <label for="inputPassword">Password</label>
        </div>

        <button type="submit" name="signin" class="btn btn-lg btn-primary btn-block">Sign in</button>
      </form>


    </div>
  </div>
  <!-- /.container -->
  <div style="   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%; text-align: center;">
    <?php
    include("include/footer.php");
    ?>
  </div>
</body>

</html>