<?php
session_start();
include("../include/dbConn.php");
if ((empty($_SESSION['user_id'])) && (empty($_SESSION['admin']))) {
     header('Location: ../index.php');
     exit;
}

$idA=$_SESSION['user_id'];
$adminEmail=$_SESSION['admin'];

$adminPro=mysqli_query($con,"select * from user where user_id='$idA'");
$run= mysqli_fetch_assoc($adminPro);

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $adminUpPro=mysqli_query($con,"select * from user where user_id='$idA' and '$adminEmail'='$email'");
    $checkECNum=mysqli_num_rows($adminUpPro);
    if($checkECNum==1){
        $adminUp = mysqli_query($con, "UPDATE user SET user_name= '$name',user_email= '$email',user_phone_num='$phone', user_password='$password' where user_id='$idA'");
        echo "<script type= 'text/javascript'>alert('You have updated your profile successfully'); </script>";
        header("Refresh:0");
    }else{
        $userEmChk=mysqli_query($con,"select * from user where user_email='$email'");
        $userEmNum=mysqli_num_rows($userEmChk);
        if($userEmNum == 0){
            $adminUp = mysqli_query($con, "UPDATE user SET user_name= '$name',user_email= '$email',user_phone_num='$phone', user_password='$password' where user_id='$idA'");
            echo "<script type= 'text/javascript'>alert('You have updated your profile successfully'); </script>";
            header("Refresh:0");
        }else{
            echo "<script type= 'text/javascript'>alert('Your new email exists, please change it'); </script>";
            header("Refresh:0");
        }
    }
}
?>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Software Security Readiness Index</a>

            <button class="btn btn-link btn-sm order-1 order-lg-0 ml-5" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $run['user_email']; ?></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" data-toggle="modal" data-target="#profile">Profile</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../include/logout.php">Logout</a>
                    </div>
                </li> -->
            </ul>
        </nav>

<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="" enctype="multipart/form-data">

                       <input type="hidden" name="User_Id" value="<?php echo $run['user_id'];?>">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" value="<?php echo $run['user_name'];?>" required>

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $run['user_email'];?>" required>
                        </div>

                        <div class="form-group">

                                <label for="inputEmail4">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $run['user_password'];?>" required>

                        </div>
                         <div class="form-group">
                            <label for="Phone">Contact Number</label>
                            <input type="tel" class="form-control" name="phone" placeholder="Contact Number" pattern="[0]{1}[0-9]{10}" value="<?php echo $run['user_phone_num'];?>" required>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
