<?php
session_start();
include("../include/dbConn.php");

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
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>




</head>

<body class="sb-nav-fixed">

    <?php
        include("header.php");
        ?>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                            About This Project
                        </a>

                        <a class="nav-link" href="Readiness%20Factor.php">
                            <div class="sb-nav-link-icon mb-4"><i class="fa fa-list" aria-hidden="true"></i></div>
                            Software Security Readniess Factors
                        </a>

                        <a class="nav-link" href="Readiness%20Index.php">
                            <div class="sb-nav-link-icon mb-4"><i class="fa fa-list" aria-hidden="true"></i></div>
                            Software Security Readniess Index
                        </a>

                        <a class="nav-link" href="result.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Result
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                <?php echo $Email; ?>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" data-toggle="modal" data-target="#profile">Profile</a>
                                <a class="nav-link" href="logout.php">Logout</a>

                                </nav>

                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main class="py-5">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-xl-12">
                            <div class="card mb-5">
                                <div class="card-header">

                                    <h5>Software Security Readiness Factors</h5>
                                </div>

                                <div id="accordion">

                                    <?php
                                          $factors = mysqli_query($con,"select * from factor order by factor_id");

                                        $count = 1;
                                        while($factor = mysqli_fetch_array($factors)){
                                        $factorName = $factor['factor_name'];
                                       /* $subfactor_name = $subfactor['subfactor_name'];*/
                                       /* if ($factorName == 'INDIVIDUAL'){*/

                                        ?>

                                    <div class="card mx-4 my-4">


                                        <div class="card-header sub-factor" id="headingTwo" data-toggle="collapse" data-target="#collapse<?php echo $count;?>" aria-expanded="true" aria-controls="collapseOne">

                                            <h5 class="mb-0">

                                                <i class="fa fa-angle-down" aria-hidden="true"></i> <?php echo $factorName;?>

                                            </h5>
                                        </div>

                                        <div id="collapse<?php echo $count;?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                            <?php
                                            if($factorName == 'INDIVIDUAL'){
                                            $subfactors = mysqli_query($con,"select * from factor join subfactor on factor.factor_id=subfactor.factor_id where factor_name ='INDIVIDUAL'");
                                            $number = 1;
                                            while($subfactor = mysqli_fetch_assoc($subfactors)){


                                            ?>
                                            <div class="card-body">
                                                <ol class="h6"><?php echo $number .'. '. $subfactor['subfactor_name'];?></ol>
                                                <!--  <hr>-->
                                                <!-- <ol class="h6">Trust</ol>-->
                                            </div>
                                            <?php
                                             $number++;
                                            }
                                            }
                                            ?>

                                            <?php
                                            if($factorName == 'ORGANIZATION'){
                                            $subfactors = mysqli_query($con,"select * from factor join subfactor on factor.factor_id=subfactor.factor_id where factor_name ='ORGANIZATION'");
                                            $number = 1;
                                            while($subfactor = mysqli_fetch_assoc($subfactors)){


                                            ?>
                                            <div class="card-body">
                                                <ol class="h6"><?php echo $number .'. '. $subfactor['subfactor_name'];?></ol>
                                                <!--  <hr>-->
                                                <!-- <ol class="h6">Trust</ol>-->
                                            </div>
                                            <?php
                                             $number++;
                                            }
                                            }
                                            ?>

                                            <?php
                                            if($factorName == 'TECHNOLOGY'){
                                            $subfactors = mysqli_query($con,"select * from factor join subfactor on factor.factor_id=subfactor.factor_id where factor_name ='TECHNOLOGY'");

                                            $number = 1;
                                            while($subfactor = mysqli_fetch_assoc($subfactors)){


                                            ?>
                                            <div class="card-body">
                                                <ol class="h6">
                                                    <?php echo $number .'. '. $subfactor['subfactor_name'];?>
                                                </ol>
                                                <!--  <hr>-->
                                                <!-- <ol class="h6">Trust</ol>-->
                                            </div>
                                            <?php
                                              $number++;
                                            }
                                            }
                                            ?>
                                        </div>

                                    </div>
                                    <?php
                                            $count++;
                                        }
                                            ?>

                                </div>




                            </div>
                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../admin/js/scripts.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>




</body>

</html>
