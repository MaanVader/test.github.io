<?php


include("../include/dbConn.php");

if(isset($_POST['editOraISPDBtonT'])){

    $idQISPDTId=$_POST['idQISPDTId'];
    $QuesQISPDTName=$_POST['QuesQISPDTName'];
    $updateDataOraUSPDT=mysqli_query($con,"UPDATE question SET question = '$QuesQISPDTName' where question_id='$idQISPDTId'");
    echo "<script type='text/javascript'> alert('You have updated the question.'); </script>";
}
if(isset($_POST['deleteQOraISPDInBtonT'])){
    $idQOraISPDDeleT=$_POST['idQOraISPDDeleT'];
    $deleteInOraISPDT=mysqli_query($con,"DELETE FROM question WHERE  question_id='$idQOraISPDDeleT'");
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
                        <h1 class="mt-4">View Technology Factor</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Technology Tables
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

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
                                                    $OraQAllAISRT=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id JOIN factor ON subfactor.factor_id = factor.factor_id where subfactor_name= 'Information security infrastructure' and title_name = 'Allocation of information security responsibilities' and factor_name='TECHNOLOGY' ");
                                                while( $OraQDetailsAISRT=mysqli_fetch_array($OraQAllAISRT) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsAISRT['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsAISRT['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtnT" data-toggle="modal" data-target="#editOraISPDT"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtnT" data-toggle="modal" data-target="#deleteOraTISPDT"><i class="far fa-trash-alt"></i> Delete</button>
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
                                                    $OraQAllCBOT=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id JOIN factor ON subfactor.factor_id = factor.factor_id where subfactor_name= 'Information security infrastructure' and title_name = 'Co-operation between organizations' and factor_name='TECHNOLOGY' ");
                                                while( $OraQDetailsCBOT=mysqli_fetch_array($OraQAllCBOT) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsCBOT['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsCBOT['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtnT" data-toggle="modal" data-target="#editOraISPDT"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtnT" data-toggle="modal" data-target="#deleteOraTISPDT"><i class="far fa-trash-alt"></i> Delete</button>
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
                                                    $OraQAllIRIST=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id JOIN factor ON subfactor.factor_id = factor.factor_id where subfactor_name= 'Information security infrastructure' and title_name = 'Independent review of information security' and factor_name ='TECHNOLOGY' ");
                                                while( $OraQDetailsIRIST=mysqli_fetch_array($OraQAllIRIST) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsIRIST['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsIRIST['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtnT" data-toggle="modal" data-target="#editOraISPDT"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtnT" data-toggle="modal" data-target="#deleteOraTISPDT"><i class="far fa-trash-alt"></i> Delete</button>
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
                                            <h4 >   Reliability :</h4>
                                             <h6 >  I am ready use organization software if …</h6>
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
                                                    $OraQAllAISRTR=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id JOIN factor ON subfactor.factor_id = factor.factor_id where subfactor_name= 'Reliability' and title_name = 'I am ready use organization software if …' and factor_name='TECHNOLOGY' ");
                                                while( $OraQDetailsAISRTR=mysqli_fetch_array($OraQAllAISRTR) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $OraQDetailsAISRTR['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $OraQDetailsAISRTR['question']; ?></td>
                                                <td>
                                                      <button type="button" class="btn btn-success editOraISPDbtnT" data-toggle="modal" data-target="#editOraISPDT"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteOraISPDbtnT" data-toggle="modal" data-target="#deleteOraTISPDT"><i class="far fa-trash-alt"></i> Delete</button>
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
        <div class="modal fade" id="editOraISPDT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                  <input type="hidden" id="idQISPDT" name="idQISPDTId">
                   <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                       <textarea  class="form-control" name="QuesQISPDTName" id="QuesQISPDT" aria-describedby="emailHelp" placeholder="Enter question" value="" required> </textarea>

                     </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="editOraISPDBtonT">Edit</button>
              </div>
                </form>
            </div>
          </div>
        </div>

      <!--  delete   -->
        <div class="modal fade" id="deleteOraTISPDT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <input type="hidden" id="idQOraISPDDeleT" name="idQOraISPDDeleT">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="deleteQOraISPDInBtonT">Delete</button>
              </div>
                </form>
            </div>
          </div>
        </div>

        <script>
            $(document).ready(function (){

                $('.editOraISPDbtnT').on('click',function(){

                    $('#editOraISPDT').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQISPDT').val(data[0]);
					$('#QuesQISPDT').val(data[3]);

                });
            });
         </script>
        <script>
            $(document).ready(function (){

                $('.deleteOraISPDbtnT').on('click',function(){

                    $('#deleteOraTISPDT').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQOraISPDDeleT').val(data[0]);

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
