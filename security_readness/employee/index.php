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
                                <br>
                                <div id="accordion">

                                   <h4>	&nbsp; INTRODUCTION</h4> <ul> <li>
                                    <h6 >  INTRODUCTION	Software security readiness is an automated tool to measure the level of readiness among workers working remotely. </h6></li> </ul>

                                    <br>
                                    <hr>
                                    <br>

                                    <h4>&nbsp; SOFTWARE SECURITY READINESS INDEX</h4>
                                    <ul>
                                    <li><h6 >  Software security continues to be an area of focus all organizations. Today, business of all sizes are under pressure from both hackers and regulators to address the ever-increasing threats from cyber-attacks.  Firms like yours experience attacks every day, from a few to a few hundred. When attacks succeed, they often go unnoticed for three to six months. During that time, data may be stolen, and penalties incurred. </h6></li>
                                    <li><h6 >  Take one of our Software security readiness checklists on the below based on your business regulator body, if you just want to see your posture based on your current software security standard, please take the Software Security Questionnaire below.</h6></li>
                                    </ul>

                                     <br>
                                    <hr>
                                    <br>

                                    <h4>&nbsp; HOW TO USE</h4>
                                    <ul>
                                    <li><h6 >  The tool is available on the web and accessible through this URL:......... </h6></li>
                                    <li><h6 >  The main page of the tool contained list of software security factors in public organization.</h6></li>
                                    <li><h6 >  The second page of the tool have one part on software security readiness checklist. Then there are provide “Calculate software security readiness index” button: </h6></li>
                                    <li><h6 >  Refer to step-by-step process below:
                                        <br> <ol>
                                        <li> Click “Yes” or “No” or “Partly”  Software security readiness checklist.</li>
                                        <li> After complete answering the checklist, Click Calculate software security readiness index button on tool interface. </li>
                                        <li> Software security readiness index will be calculate and display result on the percentage in each aspect of software security readiness , percentage of readiness index and software security readiness level. </li>
                                        </ol></h6></li>
                                    </ul>

                                    <br>
                                    <hr>
                                    <br>

                                    <h4>&nbsp; Contact us</h4>
                                    <ul>
                                    <li><h6 >  If you require any more information or have any questions about our tool or have any question about our tool, please feel free to contact us via halimaton.mpp1516@gmail.com. Here, we consider the privacy of our visitors to be extremely important.</h6></li>
                                    </ul>
                                    <br>
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
