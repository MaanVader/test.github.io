<?php


include("../include/dbConn.php");

if(isset($_POST['editInKn'])){

    $qIDInKn=$_POST['qIDInKn'];
    $QuesInKn=$_POST['QuesInKn'];
    $updateDate=mysqli_query($con,"UPDATE question SET question = '$QuesInKn' where question_id='$qIDInKn'");
    echo "<script type='text/javascript'> alert('You have updated the question.'); </script>";
}

if(isset($_POST['deleteQkIn'])){
    $idQKDele=$_POST['idQKDele'];
    $deleteInK=mysqli_query($con,"DELETE FROM question WHERE  question_id='$idQKDele'");
}


if(isset($_POST['editInTru'])){

    $idQtruId=$_POST['idQtruId'];
    $QuesQtruName=$_POST['QuesQtruName'];
    $updateDate=mysqli_query($con,"UPDATE question SET question = '$QuesQtruName' where question_id='$idQtruId'");
    echo "<script type='text/javascript'> alert('You have updated the question.'); </script>";
}

if(isset($_POST['deleteQTruIn'])){
    $idQTruDele=$_POST['idQTruDele'];
    $deleteInTr=mysqli_query($con,"DELETE FROM question WHERE  question_id='$idQTruDele'");
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
                        <h1 class="mt-4">View Individual Factor</h1>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Individual Tables
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <table class="table table-bordered" id="" width="100%" cellspacing="0" >



                                        <thead>
                                            <h4 >  IT Knowledge :</h4>
                                            <h6 >  I am ready use organization software if …</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $inQAll=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'IT KNOWLEDGE'");
                                                while( $inQDetails=mysqli_fetch_array($inQAll) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $inQDetails['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $inQDetails['question']; ?></td>


                                                <td>
                                                      <button type="button" class="btn btn-success editInKnbtn" data-toggle="modal" data-target="#editInKn"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteInKnbtn" data-toggle="modal" data-target="#deleteInKn"><i class="far fa-trash-alt"></i> Delete</button>
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
                                            <h4 >  Trust :</h4>
                                            <h6 >  I am ready use organization software if …</h6>
                                            <tr>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th style="display:none;">Title</th>
                                                <th>Questions</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $inQAllT=mysqli_query($con,"select * from question JOIN title ON question.title_id=  title.title_id JOIN subfactor ON title.subfactor_id = subfactor.subfactor_id  where subfactor_name= 'Trust'");
                                                while( $inQDetailsT=mysqli_fetch_array($inQAllT) ){ ?>
                                            <tr>
                                                <td style="display:none;"><?php echo $inQDetailsT['question_id']; ?></td>
                                                <td style="display:none;">Title</td>
                                                <td style="display:none;">Title</td>
                                                <td><?php echo $inQDetailsT['question']; ?></td>


                                                <td>
                                                      <button type="button" class="btn btn-success editIntrbtn" data-toggle="modal" data-target="#editIntr"><i class="fas fa-edit"></i> Edit</button>
                                                      <button type="button" class="btn btn-danger deleteInTrubtn" data-toggle="modal" data-target="#deleteInTru"><i class="far fa-trash-alt"></i> Delete</button>
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
        <div class="modal fade" id="editInKn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                  <input type="hidden" id="idQK" name="qIDInKn">
                   <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                       <textarea  class="form-control" name="QuesInKn" id="QuesQk" aria-describedby="emailHelp" placeholder="Enter question" value="" required> </textarea>

                     </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="editInKn">Edit</button>
              </div>
                </form>
            </div>
          </div>
        </div>

      <!--  delete   -->
        <div class="modal fade" id="deleteInKn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <input type="hidden" id="idQKDele" name="idQKDele">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="deleteQkIn">Delete</button>
              </div>
                </form>
            </div>
          </div>
        </div>

        <script>
            $(document).ready(function (){

                $('.editInKnbtn').on('click',function(){

                    $('#editInKn').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQK').val(data[0]);
					$('#QuesQk').val(data[3]);

                });
            });
         </script>
        <script>
            $(document).ready(function (){

                $('.deleteInKnbtn').on('click',function(){

                    $('#deleteInKn').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQKDele').val(data[0]);

                });
            });
         </script>

        <!-- ******************************** Edit factor modal *********************-->
        <div class="modal fade" id="editIntr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                  <input type="hidden" id="idQtru" name="idQtruId">
                   <div class="form-group">
                            <label for="exampleInputEmail1">Question</label>
                       <textarea  class="form-control" name="QuesQtruName" id="QuesQtru" aria-describedby="emailHelp" placeholder="Enter question" value="" required> </textarea>

                     </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="editInTru">Edit</button>
              </div>
                </form>
            </div>
          </div>
        </div>

      <!--  delete   -->
        <div class="modal fade" id="deleteInTru" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <input type="hidden" id="idQTruDele" name="idQTruDele">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" name="deleteQTruIn">Delete</button>
              </div>
                </form>
            </div>
          </div>
        </div>

        <script>
            $(document).ready(function (){

                $('.editIntrbtn').on('click',function(){

                    $('#editIntr').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQtru').val(data[0]);
					$('#QuesQtru').val(data[3]);

                });
            });
         </script>
        <script>
            $(document).ready(function (){

                $('.deleteInTrubtn').on('click',function(){

                    $('#deleteInTru').modal('show');
                    $tr =$(this).closest('tr');

                    var data =$tr.children("td").map(function (){
                        return $(this).text();
                      }).get();

                    console.log(data);
                    $('#idQTruDele').val(data[0]);

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
