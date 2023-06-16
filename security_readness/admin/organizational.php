<?php


include("../include/dbConn.php");

if(isset($_POST['editOraISPDBton'])){

    $idQISPDId=$_POST['idQISPDId'];
    $QuesQISPDName=$_POST['QuesQISPDName'];
    $updateDataOraUSPD=mysqli_query($con,"UPDATE question SET question = '$QuesQISPDName' where question_id='$idQISPDId'");
    echo "<script type='text/javascript'> alert('You have updated the question.'); </script>";
}
if(isset($_POST['deleteQOraISPDInBton'])){
    $idQOraISPDDele=$_POST['idQOraISPDDele'];
    $deleteInOraISPD=mysqli_query($con,"DELETE FROM question WHERE  question_id='$idQOraISPDDele'");
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
                        <h1 class="mt-4">View Organization Factor</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Organization Tables
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                     <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Information Security Policy:</h4>
                                             <h6 >  Information security policy document</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $OraQAllISPD=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Information Security Policy' and title_name = 'Information security policy document'");
                                                while( $OraQDetailsISPD=mysqli_fetch_array($OraQAllISPD) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsISPD['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsISPD['question']; ?></td>


                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Review and Evaluation</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $OraQAllRAV=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Information Security Policy' and title_name = 'Review and Evaluation'");
                                                while( $OraQDetailsRAV=mysqli_fetch_array($OraQAllRAV) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsRAV['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsRAV['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>



                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Information security infrastructure:</h4>
                                             <h6 >  Allocation of information security responsibilities</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $OraQAllAISR=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id JOIN factor ON subfactor.factor_id = factor.factor_id where subfactor_name= 'Information security infrastructure' and title_name = 'Allocation of information security responsibilities' and factor_name ='ORGANIZATION'");
                                                while( $OraQDetailsAISR=mysqli_fetch_array($OraQAllAISR) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsAISR['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsAISR['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Co-operation between organizations</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllCBO=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id JOIN factor ON subfactor.factor_id = factor.factor_id where subfactor_name= 'Information security infrastructure' and title_name = 'Co-operation between organizations' and factor_name ='ORGANIZATION'");
                                                while( $OraQDetailsCBO=mysqli_fetch_array($OraQAllCBO) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsCBO['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsCBO['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>

                                             <h6 >  Independent review of information security</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllIRIS=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id JOIN factor ON subfactor.factor_id = factor.factor_id  where subfactor_name= 'Information security infrastructure' and title_name = 'Independent review of information security' and factor_name ='ORGANIZATION'");
                                                while( $OraQDetailsIRIS=mysqli_fetch_array($OraQAllIRIS) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsIRIS['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsIRIS['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Security of third party access:</h4>
                                             <h6 >  Identification of risks from third party</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllIRFTP=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Security of third party access' and title_name = 'Identification of risks from third party'");
                                                while( $OraQDetailsIRFTP=mysqli_fetch_array($OraQAllIRFTP) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsIRFTP['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsIRFTP['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Security requirements in third party contracts</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllSRTPC=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Security of third party access' and title_name = 'Security requirements in third party contracts'");
                                                while( $OraQDetailsSRTPC=mysqli_fetch_array($OraQAllSRTPC) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsSRTPC['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsSRTPC['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Outsourcing:</h4>
                                             <h6 >  Security requirements in outsourcing contracts</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th >Questions</th>
                                                <th  style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllSROC=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Outsourcing' and title_name = 'Security requirements in outsourcing contracts'");
                                                while( $OraQDetailsSROC=mysqli_fetch_array($OraQAllSROC) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsSROC['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsSROC['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Accountability of assets:</h4>
                                             <h6 >  Inventory of assets</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllIOA=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Accountability of assets' and title_name = 'Inventory of assets'");
                                                while( $OraQDetailsIOA=mysqli_fetch_array($OraQAllIOA) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsIOA['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsIOA['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Information classification:</h4>
                                             <h6 >  Classification guidelines</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllCG=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Information classification' and title_name = 'Classification guidelines'");
                                                while( $OraQDetailsCG=mysqli_fetch_array($OraQAllCG) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsCG['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsCG['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Information labeling and handling</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllILH=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Information classification' and title_name = 'Information labeling and handling'");
                                                while( $OraQDetailsILH=mysqli_fetch_array($OraQAllILH) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsILH['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsILH['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Security in job definition and Resourcing:</h4>
                                             <h6 >  Including security in job responsibilities</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllISJR=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Security in job definition and Resourcing' and title_name = 'Including security in job responsibilities'");
                                                while( $OraQDetailsISJR=mysqli_fetch_array($OraQAllISJR) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsISJR['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsISJR['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Confidentiality agreements</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllCA=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Security in job definition and Resourcing' and title_name = 'Confidentiality agreements'");
                                                while( $OraQDetailsCA=mysqli_fetch_array($OraQAllCA) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsCA['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsCA['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Terms and conditions of employment</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllTCE=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Security in job definition and Resourcing' and title_name = 'Terms and conditions of employment'");
                                                while( $OraQDetailsTCE=mysqli_fetch_array($OraQAllTCE) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsTCE['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsTCE['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  User training:</h4>
                                             <h6 >  Information security education and training</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllISET=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'User training' and title_name = 'Information security education and training'");
                                                while( $OraQDetailsISET=mysqli_fetch_array($OraQAllISET) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsISET['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsISET['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 > Responding to security/threat incidents:</h4>
                                             <h6 >  Reporting security/threat incidents</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllRSTI=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Responding to security/threat incidents' and title_name = 'Reporting security/threat incidents'");
                                                while( $OraQDetailsRSTI=mysqli_fetch_array($OraQAllRSTI) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsRSTI['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsRSTI['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Reporting security weaknesses</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllRSW=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Responding to security/threat incidents' and title_name = 'Reporting security weaknesses'");
                                                while( $OraQDetailsRSW=mysqli_fetch_array($OraQAllRSW) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsRSW['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsRSW['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Equipment Security:</h4>
                                             <h6 >  Equipment location protection</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllELP=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Equipment Security' and title_name = 'Equipment location protection'");
                                                while( $OraQDetailsELP=mysqli_fetch_array($OraQAllELP) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsELP['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsELP['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Power Supplies</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllPS=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Equipment Security' and title_name = 'Power Supplies'");
                                                while( $OraQDetailsPS=mysqli_fetch_array($OraQAllPS) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsPS['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsPS['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>

                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Equipment Maintenance</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllEM=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Equipment Security' and title_name = 'Equipment Maintenance'");
                                                while( $OraQDetailsEM=mysqli_fetch_array($OraQAllEM) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsEM['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsEM['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>

                                        <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Securing of equipment offsite</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllSEO=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Equipment Security' and title_name = 'Securing of equipment offsite'");
                                                while( $OraQDetailsSEO=mysqli_fetch_array($OraQAllSEO) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsSEO['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsSEO['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                    </table>

                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Secure disposal or re-use of equipment</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllSDORE=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Equipment Security' and title_name = 'Secure disposal or re-use of equipment'");
                                                while( $OraQDetailsSDORE=mysqli_fetch_array($OraQAllSDORE) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsSDORE['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsSDORE['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  General Controls:</h4>
                                             <h6 >  Removal of property</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllROF=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'General Controls' and title_name = 'Removal of property'");
                                                while( $OraQDetailsROF=mysqli_fetch_array($OraQAllROF) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsROF['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsROF['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Operational Procedure and responsibilities:</h4>
                                             <h6 >  Documented Operating procedures</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllDOP=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Operational Procedure and responsibilities' and title_name = 'Documented Operating procedures'");
                                                while( $OraQDetailsDOP=mysqli_fetch_array($OraQAllDOP) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsDOP['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsDOP['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Incident management procedures</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllIMP=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Operational Procedure and responsibilities' and title_name = 'Incident management procedures'");
                                                while( $OraQDetailsIMP=mysqli_fetch_array($OraQAllIMP) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsIMP['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsIMP['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  External facilities management</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllEFM=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Operational Procedure and responsibilities' and title_name = 'External facilities management'");
                                                while( $OraQDetailsEFM=mysqli_fetch_array($OraQAllEFM) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsEFM['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsEFM['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Media handling and Security:</h4>
                                             <h6 >  Management of removable computer media</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllMRCM=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Media handling and Security' and title_name = 'Management of removable computer media'");
                                                while( $OraQDetailsMRCM=mysqli_fetch_array($OraQAllMRCM) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsMRCM['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsMRCM['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Exchange of Information and software:</h4>
                                             <h6 >  Information and software exchange agreement</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllISEA=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Exchange of Information and software' and title_name = 'Information and software exchange agreement'");
                                                while( $OraQDetailsISEA=mysqli_fetch_array($OraQAllISEA) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsISEA['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsISEA['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Other forms of information exchange</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllIOFIE=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Exchange of Information and software' and title_name = 'Other forms of information exchange'");
                                                while( $OraQDetailsIOFIE=mysqli_fetch_array($OraQAllIOFIE) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsIOFIE['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsIOFIE['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Business Requirements for Access Control:</h4>
                                             <h6 >  Access Control Policy</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllACP=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Business Requirements for Access Control' and title_name = 'Access Control Policy'");
                                                while( $OraQDetailsACP=mysqli_fetch_array($OraQAllACP) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsACP['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsACP['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <br>
                                    <hr>
                                    <br>



                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                            <h4 >  Mobile computing and telecommuting:</h4>
                                             <h6 >  Mobile computing</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllMC=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Mobile computing and telecommuting' and title_name = 'Mobile computing'");
                                                while( $OraQDetailsMC=mysqli_fetch_array($OraQAllMC) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsMC['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsMC['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>


                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >
                                        <thead>
                                             <h6 >  Telecommuting</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th style="width:  17%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                    $OraQAllT=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Mobile computing and telecommuting' and title_name = 'Telecommuting'");
                                                while( $OraQDetailsT=mysqli_fetch_array($OraQAllT) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsT['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsT['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtn" data-toggle="modal" data-target="#editOraISPD"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtn" data-toggle="modal" data-target="#deleteOraISPD"><i class="far fa-trash-alt"></i> Delete</button>
                                                </td>
                                            </tr>
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

       <!-- ******************************** Edit factor modal *********************-->
        <div class="modal fade" id="editOraISPD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form method="POST">
              <div class="modal-body">

                  <input type="hidden" id="idQISPD" name="idQISPDId">
                   <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                       <textarea  class="form-control" name="QuesQISPDName" id="QuesQISPD" aria-describedby="emailHelp" placeholder="Enter question" value="" required> </textarea>

                     </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="editOraISPDBton">Edit</button>
              </div>
                </form>
            </div>
          </div>
        </div>

      <!--  delete   -->
        <div class="modal fade" id="deleteOraISPD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Question</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are sure you want to delete this question?
              </div>
                <form method="POST">
              <div class="modal-footer">
                  <input type="hidden" id="idQOraISPDDele" name="idQOraISPDDele">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="deleteQOraISPDInBton">Delete</button>
              </div>
                </form>
            </div>
          </div>
        </div>

        <script>
            $(document).ready(function (){

                $('.editOraISPDbtn').on('click',function(){

                    $('#editOraISPD').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQISPD').val(data[0]);
					$('#QuesQISPD').val(data[3]);

                });
            });
         </script>
        <script>
            $(document).ready(function (){

                $('.deleteOraISPDbtn').on('click',function(){

                    $('#deleteOraISPD').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQOraISPDDele').val(data[0]);

                });
            });
         </script>


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
