<?php
session_start();
include("../include/dbConn.php");


if(isset($_POST['submit']) && !empty($_POST['answer'])){

$Email=$_SESSION['employee'];

$adminPro=mysqli_query($con,"select * from user where user_email='$Email' and user_role = 'employee'");
$run= mysqli_fetch_assoc($adminPro);
$ID = $run['user_id'];
$question_id = $_POST['question_id'];
$answer = $_POST['answer'];

foreach( $answer as $key => $d ) {



    if($answer[$key] == 'Yes'){


$result = mysqli_query($con,"insert into result (value,answer,question_id,user_id) values ('$answer[$key]','1','$question_id[$key].','$ID') ");


        echo "<script type='text/javascript'> alert('Thank you for your answering.');  window.location.href='result.php'; </script>";
    }elseif($answer[$key] == 'No'){
        $result = mysqli_query($con,"insert into result (value,answer,question_id,user_id) values ('$answer[$key]','0','$question_id[$key].','$ID') ");

        echo "<script type='text/javascript'> alert('Thank you for your answering.');  window.location.href='result.php'; </script>";
    }elseif($answer[$key] == 'Partly'){
        $result = mysqli_query($con,"insert into result (value,answer,question_id,user_id) values ('$answer[$key]','0.5','$question_id[$key].','$ID') ");

        echo "<script type='text/javascript'> alert('Thank you for your answering.');  window.location.href='result.php'; </script>";
    }


}

include("manage.php");


    $securityResult = mysqli_query($con,"insert into SecurityReadinessIndex (resultIndex,user_id) values ('$Readiness','$ID')");




}elseif(isset($_POST['submit']) && empty($_POST['answer'])){
    echo "<script type='text/javascript'> alert('You have to answer all question.');  window.location.href='index.php'; </script>";
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

                                    <h5>Software Security Readiness Index</h5>
                                </div>

                                <div id="accordion">
                                    <form method="post" action="" class="needs-validation" enctype="multipart/form-data" novalidate>
                                        <?php
                                          $factors = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id where factor_name ='INDIVIDUAL' order by title.title_id ");

                                        $subfactor = mysqli_fetch_array($factors);
                                        $factorName = $subfactor['factor_name'];
                                        $subfactor_name = $subfactor['subfactor_name'];
                                       /* if ($factorName == 'INDIVIDUAL'){*/

                                        ?>

                                        <div class="card mx-4 my-4">


                                            <div class="card-header sub-factor" id="headingTwo">

                                                <h5 class="mb-0">

                                                    <?php echo $factorName;?>

                                                </h5>
                                            </div>

                                            <div id="collapseTwo" class="show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <p class="h6">IT KNOWLEDGE</p>
                                                    <p>I am ready use organization software if …</p>
                                                    <hr>
                                                    <?php


                                        $individual = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id ");


                                        $countb =0;
                                        while($row = mysqli_fetch_assoc($individual)){
                                        $factor_name = $row['factor_name'];
                                        $subfactor_name = $row['subfactor_name'];

                                        if ($factor_name == 'INDIVIDUAL' && $subfactor_name == 'IT KNOWLEDGE'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>
                                                    <p class="h6">Trust</p>
                                                    <p>I am ready use organization software if …</p>
                                                    <hr>

                                                    <?php


                                        $trust = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_assoc($trust)){
                                        $factor_name = $row['factor_name'];
                                        $subfactor_name = $row['subfactor_name'];

                                        if ($factor_name == 'INDIVIDUAL' && $subfactor_name == 'Trust'){



                                        ?>
                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>










                                                </div>

                                            </div>

                                        </div>
                                        <?php
                                          $factors2 = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id where factor_name = 'ORGANIZATION' order by title.title_id ");

                                        $subfactor = mysqli_fetch_array($factors2);
                                        $factorName = $subfactor['factor_name'];
                                        $subfactor_name = $subfactor['subfactor_name'];


                                        ?>

                                        <div class="card mx-4 my-4">


                                            <div class="card-header sub-factor" id="headingTwo">

                                                <h5 class="mb-0">

                                                    <?php echo $factorName; ?>

                                                </h5>
                                            </div>

                                            <div id="" class="show" aria-labelledby="" data-parent="">
                                                <div class="card-body">
                                                    <p class="h6">Information Security Policy</p>
                                                    <p>1. Information security policy document</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Information security policy document'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>
                                                    <p>2. Review and Evaluation</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Review and Evaluation'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>

                                                    <p class="h6">Information security infrastructure</p>
                                                    <p>1. Allocation of information security responsibilities</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Allocation of information security responsibilities'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>
                                                    <p>2. Co-operation between organizations</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Co-operation between organizations'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>
                                                    <p>3. Independent review of information security</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Independent review of information security'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <br>

                                                    <hr>

                                                    <p class="h6">Security of third party access</p>
                                                    <p>1. Identification of risks from third party</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Identification of risks from third party'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>
                                                    <p>2. Security requirements in third party contracts</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Security requirements in third party contracts'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <br>

                                                    <hr>

                                                    <p class="h6">Outsourcing</p>
                                                    <p>1. Security requirements in outsourcing contracts</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Security requirements in outsourcing contracts'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <br>

                                                    <hr>

                                                    <p class="h6">Accountability of assets</p>
                                                    <p>1. Inventory of assets</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Inventory of assets'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>

                                                    <p class="h6">Information classification</p>
                                                    <p>1. Classification guidelines</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Classification guidelines'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>

                                                    <p>2. Information labeling and handling</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Information labeling and handling'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>

                                                    <p class="h6">Security in job definition and Resourcing</p>
                                                    <p>1. Including security in job responsibilities</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Including security in job responsibilities'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>

                                                    <p>2. Confidentiality agreements</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Confidentiality agreements'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>

                                                    <p>3. Terms and conditions of employment</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Terms and conditions of employment'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>

                                                    <p class="h6">User training</p>
                                                    <p>1. Information security education and training</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Information security education and training'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>

                                                    <p class="h6">Responding to security/threat incidents</p>
                                                    <p>1. Reporting security/threat incidents</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Reporting security/threat incidents'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>

                                                    <p>2. Reporting security weaknesses</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Reporting security weaknesses'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>

                                                    <p class="h6">Equipment Security</p>
                                                    <p>1. Equipment location protection</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Equipment location protection'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <br>
                                                    <hr>

                                                    <p>2. Power Supplies</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Power Supplies'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>

                                                    <p>3. Equipment Maintenance</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Equipment Maintenance'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>

                                                    <p>4. Securing of equipment offsite</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Securing of equipment offsite'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>

                                                    <p>5. Secure disposal or re-use of equipment</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Secure disposal or re-use of equipment'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>

                                                    <p class="h6">General Controls</p>
                                                    <p>1. Removal of property</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Removal of property'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <br>
                                                    <hr>



                                                    <p class="h6">Operational Procedure and responsibilities</p>
                                                    <p>1. Documented Operating procedures</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Documented Operating procedures'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <p>2. Incident management procedures</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Incident management procedures'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <p>3. External facilities management</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'External facilities management'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <br>
                                                    <hr>
                                                    <p class="h6">Media handling and Security</p>
                                                    <p>1. Management of removable computer media</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Management of removable computer media'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <br>
                                                    <hr>
                                                    <p class="h6">Exchange of Information and software</p>
                                                    <p>1. Information and software exchange agreement</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Information and software exchange agreement'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <p>2. Other forms of information exchange</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Other forms of information exchange'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>
                                                    <p class="h6">Business Requirements for Access Control</p>
                                                    <p>1. Access Control Policy</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Access Control Policy'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <hr>
                                                    <p class="h6">Mobile computing and telecommuting</p>
                                                    <p>1. Mobile computing</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Mobile computing'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                    <p>2. Telecommuting</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'ORGANIZATION' && $title_name == 'Telecommuting'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>

                                                </div>

                                            </div>

                                        </div>

                                        <?php
                                          $factors = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id where factor_name ='TECHNOLOGY' order by title.title_id ");

                                        $subfactor = mysqli_fetch_array($factors);
                                        $factorName = $subfactor['factor_name'];
                                        $subfactor_name = $subfactor['subfactor_name'];
                                       /* if ($factorName == 'INDIVIDUAL'){*/

                                        ?>

                                        <div class="card mx-4 my-4">


                                            <div class="card-header sub-factor" id="headingTwo">

                                                <h5 class="mb-0">

                                                    <?php echo $factorName;?>

                                                </h5>
                                            </div>

                                            <div id="collapseTwo" class="show" aria-labelledby="headingTwo" data-parent="#accordion">
                                                <div class="card-body">
                                                    <hr>

                                                    <p class="h6">Information security infrastructure</p>
                                                    <p>1. Allocation of information security responsibilities</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'TECHNOLOGY' && $title_name == 'Allocation of information security responsibilities'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>
                                                    <p>2. Co-operation between organizations</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'TECHNOLOGY' && $title_name == 'Co-operation between organizations'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <hr>
                                                    <p>3. Independent review of information security</p>
                                                    <hr>
                                                    <?php


                                        $Info = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id = question.title_id ");


                                        $countb = '';
                                        while($row = mysqli_fetch_array($Info)){
                                        $factor_name = $row['factor_name'];
                                        $title_name = $row['title_name'];

                                        if ($factor_name == 'TECHNOLOGY' && $title_name == 'Independent review of information security'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>
                                                    <br>
                                                    <p class="h6">Reliability</p>
                                                    <p>I am ready use organization software if …</p>
                                                    <hr>
                                                    <?php


                                        $individual = mysqli_query($con,"select * from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id ");


                                        $countb =0;
                                        while($row = mysqli_fetch_assoc($individual)){
                                        $factor_name = $row['factor_name'];
                                        $subfactor_name = $row['subfactor_name'];

                                        if ($factor_name == 'TECHNOLOGY' && $subfactor_name == 'Reliability'){



                                        ?>

                                                    <div class="form-group">
                                                        <ol>

                                                            <?php echo $row['question'];?>
                                                            <span class="float-right">
                                                                <input type="hidden" name="question_id[]" onChange="this.form.submit()" value="<?php echo  $row['question_id'];?>">
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Yes" onChange="this.form.submit()"> Yes

                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="No" onChange="this.form.submit()"> No
                                                                <input type="radio" name="answer[<?php echo $countb; ?>]" value="Partly" onChange="this.form.submit()"> Partly

                                                            </span>
                                                        </ol>
                                                    </div>
                                                    <?php

                                        }
                                            $countb++;

                                        }
                                            ?>



                                                </div>

                                            </div>

                                        </div>
                                        <div class="card-body text-center">


                                            <button type="submit" id="button" name="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
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
