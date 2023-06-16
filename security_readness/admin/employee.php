<?php


include("../include/dbConn.php");

if(isset($_POST['addEm'])){
    $emName=$_POST['emName'];
    $emEmail=$_POST['emEmail'];
    $emPhoNum=$_POST['emPhoNum'];
    $gender=$_POST['gender'];
    $department=$_POST['department'];
    $sector=$_POST['sector'];

    $checkEm=mysqli_query($con,"select * from user where user_email='$emEmail'");
    $checkEmNum=mysqli_num_rows($checkEm);
    if($checkEmNum == 0){
        $addNewFac=mysqli_query($con,"insert into user (user_name,user_email,user_phone_num,user_password,gender,em_department,em_sector,user_role) values ('$emName','$emEmail','$emPhoNum','123','$gender','$department','$sector','employee')");
        $result ='<div class="alert alert-success"><strong>Success!</strong> You have added a new employee. <a href="employee.php">x</a></div> ';
    }else{
        $result ='<div class="alert alert-danger"><strong>Failed!</strong> The entered email exists, please change it. <a href="employee.php">x</a></div> ';
    }
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
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("include/header.php");
        ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon mb-4"><i class="fas fa-tachometer-alt"></i></div>
                                Software Security Readiness Index
                            </a>
                            <div class="sb-sidenav-menu-heading">Manage</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Factor
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="individual.php">Individual</a>
                                    <a class="nav-link" href="organizational.php">Organization</a>
                                    <a class="nav-link" href="technology.php">Technology</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="employee.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                 Employee
                            </a>
                            <a class="nav-link collapsed" href="#collap" data-toggle="collapse" data-target="#collap" aria-expanded="false" aria-controls="collap">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                <?php echo $run['user_email']; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collap" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" data-toggle="modal" data-target="#profile">Profile</a>
                                <a class="nav-link" href="logout.php">Logout</a>

                                </nav>
                        </div>
                    </div>

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">View Employee</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"> Add Employee</li>
                        </ol>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8 col-lg-8 col-xl-6">

                                <form method="post" action="" enctype="multipart/form-data">
                                    <?php
                                    if(isset( $_POST['addEm'] )){
                                        echo $result;
                                    }
                                    ?>
                                    <div class="row align-items-center">
                                        <div class="col mt-3">
                                            <label for="Title">Employee Name</label>
                                            <input type="text" class="form-control" name="emName" placeholder="Employee Name" required>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col mt-3">
                                            <label for="Title">Employee Email</label>
                                            <input type="email" class="form-control" name="emEmail" placeholder="Employee Email" required>
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col mt-3">
                                            <label for="Title">Employee Phone Number</label>
                                            <input type="text" class="form-control" name="emPhoNum" placeholder="Employee Phone Number"  pattern="[0]{1}[0-9]{10}" required>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col mt-3">
                                            <label for="Title">Employee Gender</label>
                                            <select name="gender" id="" class="form-control" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col mt-3">
                                            <label for="Title">Employee Department</label>
                                            <select name="department" id="" class="form-control" required>
                                                <option value="" disabled selected>Select Department</option>
                                                <option value="HRM">Human Resource Management</option>
                                                <option value="Production">Production</option>
                                                <option value="ACF">Accounting and Finance</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col mt-3">
                                            <label for="Title">Employee Sector</label>
                                            <select name="sector" id="" class="form-control" required>
                                                <option value="" disabled selected>Select Sector</option>
                                                <option value="Education">Education</option>
                                                <option value="Commerce">Commerce</option>
                                                <option value="HS">Health services</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row justify-content-start ">
                                         <div class="col mt-3">


                                            <button type="submit" name="addEm" class="btn btn-primary mt-4 btn-block">Add</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
