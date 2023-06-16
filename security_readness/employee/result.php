<?php

include("../include/dbConn.php");


    session_start();
    include("manage.php");
if(isset($_POST['filterDate'])){
    $filterDate = $_POST['filterDate'];
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

    <script type="text/javascript" src="../css/PieChart.js"></script>

     





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
                            <div class="sb-nav-link-icon "><i class="fa fa-list" aria-hidden="true"></i></div>
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
      <?php

      $resultDate = mysqli_query($con,"select DISTINCT date , id from SecurityReadinessIndex where user_id = '$ID'");


      ?>
        <div id="layoutSidenav_content">
            <main class="py-5">
                <div class="container-fluid">
                <h1 class="mt-4">Readiness Index Result
                <span style="float:right;">
                <form action="#" method="post">
                    <label for="date" style="font-size:18px;">Filter Date:</label>
                    <select class="form-control-sm" id="date" name="filterDate" onChange="this.form.submit()">
                        <option value="" selected disabled>Select Date</option>
                        <?php
                while($row=mysqli_fetch_array($resultDate)){


                ?>
                        <option <?php if(isset($_POST["filterDate"]) && $_POST["filterDate"]==$row['date']) echo "selected";?> value="<?php echo $row['date'];?>"><?php echo $row['date'];?></option>
                        <?php
                }
                ?>
                    </select>

            </form>
                </span></h1>




                    <div class="row">

                <div id="individual" style="width: 550px; height: 400px;"></div>
                     <div id="organization" style="width: 550px; height: 400px;"></div>
                     <div id="TECHNOLOGY" style="width: 550px; height: 400px;"></div>


                        </div>

                        <?php

                        if (isset($_POST['filterDate'])){

                        ?>

                            <h4 class="mt-4 text-center" >The Software Security Readiness Index is <strong><?php echo $Readiness; ?></strong></h4>

                                 <div class="text-center">
                                  <?php
                    if($Readiness <= 40){

                    ?>
                   <h4 class="mt-4">The Software Security Readiness Level is <strong style="color:red;">Low <i class="fas fa-arrow-down"></i></strong></h4>
                   <?php
                    }elseif($Readiness >= 41 && $Readiness <= 70){
                    ?>
                    <h4 class="mt-4">The Software Security Readiness Level is <strong style="color:#E8CC3C;">Medium <i class="fas fa-minus"></i></strong></h4>
                    <?php
                    }elseif($Readiness >= 71){

                    ?>
                    <h4 class="mt-4">The Software Security Readiness Level is <strong style="color:green;">High <i class="fas fa-arrow-up"></i></strong></h4>

                    <?php

                    }
                }else{
                    ?>
                     <div class="text-center">
                    <h4>Please select specific date</h4>
                     </div>
                    <?php
                }
                    ?>
                    </div>
                    </div>



            </main>
        </div>
    </div>
    <script type="text/javascript">

      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
         ['Value','Percentage'],
		  <?php
            $pieIndividual = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value , date from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id join SecurityReadinessIndex on result.user_id=SecurityReadinessIndex.user_id where factor_name ='INDIVIDUAL' and SecurityReadinessIndex.user_id='$ID' and date = '$filterDate' group by value order by result.id ");
			if(mysqli_num_rows($pieIndividual)>0){
				while($row=mysqli_fetch_array($pieIndividual)){
					echo"['".$row["value"]."',".$row["questionnum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
            backgroundColor: '#e9e9e9',
          title: 'Percentage  for Individual'
        };

        var chart = new google.visualization.PieChart(document.getElementById('individual'));

        chart.draw(data, options);
      }
    </script>

       <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

         ['Value','Percentage'],
		  <?php
            $pieOrganization = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value , date from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id join SecurityReadinessIndex on result.user_id=SecurityReadinessIndex.user_id where factor_name ='ORGANIZATION' and SecurityReadinessIndex.user_id='$ID' and date = '$filterDate' group by value order by result.id ");
			if(mysqli_num_rows($pieOrganization)>0){
				while($row=mysqli_fetch_array($pieOrganization)){
					echo"['".$row["value"]."',".$row["questionnum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
            backgroundColor: '#e9e9e9',
          title: 'Percentage  for Organizitaion'
        };

        var chart = new google.visualization.PieChart(document.getElementById('organization'));

        chart.draw(data, options);
      }
    </script>


        <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

         ['Value','Percentage'],
		  <?php
            $pieTechnology = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value , date from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id join SecurityReadinessIndex on result.user_id=SecurityReadinessIndex.user_id where factor_name ='TECHNOLOGY' and SecurityReadinessIndex.user_id='$ID' and date = '$filterDate' group by value order by result.id ");
			if(mysqli_num_rows($pieTechnology)>0){
				while($row=mysqli_fetch_array($pieTechnology)){
					echo"['".$row["value"]."',".$row["questionnum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
            backgroundColor: '#e9e9e9',
          title: 'Percentage  for Technology '
        };

        var chart = new google.visualization.PieChart(document.getElementById('TECHNOLOGY'));

        chart.draw(data, options);
      }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../admin/js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <!-- <script src="../assets/demo/datatables-demo.js"></script> -->
    <!-- <script>
$(document).ready(function(){
    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
});
</script> -->
</body>

</html>
