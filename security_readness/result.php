<?php

include("../include/dbConn.php");


    session_start();
$Email=$_SESSION['employee'];

$adminPro=mysqli_query($con,"select * from user where user_email='$Email' and user_role = 'employee'");
$run= mysqli_fetch_assoc($adminPro);
$ID = $run['user_id'];


$allquestion = mysqli_query($con,"select COUNT(question.question_id) AS questionnum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id where factor_name ='INDIVIDUAL'");

$runallIn =mysqli_fetch_assoc($allquestion);
$qustionNum = $runallIn['questionnum'];

$allquestionOrg = mysqli_query($con,"select COUNT(question.question_id) AS questionnum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id where factor_name ='ORGANIZATION'");

$runallOrg =mysqli_fetch_assoc($allquestionOrg);
$qustionNumOrg = $runallOrg['questionnum'];

$allquestionTech = mysqli_query($con,"select COUNT(question.question_id) AS questionnum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id where factor_name ='TECHNOLOGY'");

$runallTech =mysqli_fetch_assoc($allquestionTech);
$qustionNumTech = $runallTech['questionnum'];

/*---------------------------------------------------------------------------------------------------------------------------------*/

$allyes = mysqli_query($con,"select COUNT(result.id) As yesNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' and value = 'Yes' and user_id = '$ID'");

$allno = mysqli_query($con,"select COUNT(result.id) As noNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' and value = 'No' and user_id = '$ID'");

$allpartly = mysqli_query($con,"select COUNT(result.id) As partlyNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' and value = 'Partly' and user_id = '$ID'");

/*---------------------------------------------------------------------------------------------------------------------------------*/

$allyesorg = mysqli_query($con,"select COUNT(result.id) As yesNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' and value = 'Yes' and user_id = '$ID'");

$allnoorg = mysqli_query($con,"select COUNT(result.id) As noNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' and value = 'No' and user_id = '$ID'");

$allpartlyorg = mysqli_query($con,"select COUNT(result.id) As partlyNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' and value = 'Partly' and user_id = '$ID'");

/*---------------------------------------------------------------------------------------------------------------------------------*/

$allyestech = mysqli_query($con,"select COUNT(result.id) As yesNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' and value = 'Yes' and user_id = '$ID'");

$allnotech = mysqli_query($con,"select COUNT(result.id) As noNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' and value = 'No' and user_id = '$ID'");

$allpartlytech = mysqli_query($con,"select COUNT(result.id) As partlyNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' and value = 'Partly' and user_id = '$ID'");

/*---------------------------------------------------------------------------------------------------------------------------------*/

$runyes =mysqli_fetch_assoc($allyes);
$yesNum = $runyes['yesNum'];

$runno =mysqli_fetch_assoc($allno);
$noNum = $runno['noNum'];

$runaprtly =mysqli_fetch_assoc($allpartly);
$partlyNum = $runaprtly['partlyNum'];

$totalyes = $yesNum/$qustionNum ;

$totalno = $noNum/$qustionNum ;

$totalpartly = $partlyNum/$qustionNum;

/*---------------------------------------------------------------------------------------------------------------------------------*/

$runyesorg =mysqli_fetch_assoc($allyesorg);
$yesNumorg = $runyesorg['yesNum'];

$runnoorg =mysqli_fetch_assoc($allnoorg);
$noNumorg = $runnoorg['noNum'];

$runaprtlyorg =mysqli_fetch_assoc($allpartlyorg);
$partlyNumorg = $runaprtlyorg['partlyNum'];

$totalyesorg = $yesNumorg/$qustionNumOrg ;

$totalnoorg = $noNumorg/$qustionNumOrg ;

$totalpartlyorg = $partlyNumorg/$qustionNumOrg ;

/*---------------------------------------------------------------------------------------------------------------------------------*/

$runyestech =mysqli_fetch_assoc($allyestech);
$yesNumtech = $runyestech['yesNum'];

$runnotech =mysqli_fetch_assoc($allnotech);
$noNumtech = $runnotech['noNum'];

$runaprtlytech =mysqli_fetch_assoc($allpartlytech);
$partlyNumtech = $runaprtlytech['partlyNum'];

$totalyestech = $yesNumtech/$qustionNumTech ;

$totalnotech = $noNumtech/$qustionNumTech;

$totalpartlytech =$partlyNumtech/$qustionNumTech ;

/*---------------------------------------------------------------------------------------------------------------------------------*/

$Readiness = (($totalyes * (0.286) + $totalyesorg * (0.43) + $totalyestech * (0.286))/3) * 100  + (($totalno * (0.286) + $totalnoorg * (0.43) + $totalnotech * (0.286))/3) * 100  + (($totalpartly * (0.286) + $totalpartlyorg * (0.43) + $totalpartlytech * (0.286))/3) * 100 ;

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
     <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          
         ['Value','Percentage '],
		  <?php
            $pieIndividual = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' and user_id='$ID' group by value order by id ");
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
          
         ['Value','Percentage '],
		  <?php
            $pieOrganization = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' and user_id='$ID' group by value order by id");
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
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          
         ['Value','Percentage '],
		  <?php
            $pieTechnology = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' and user_id='$ID' group by value order by id");
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


                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main class="py-5">

                <div class="container-fluid">
                <h1 class="mt-4">Readiness Index Result</h1>
                  
                    <div class="row">
                   
                <div id="individual" style="width: 550px; height: 400px;"></div>
                     <div id="organization" style="width: 550px; height: 400px;"></div>
                     <div id="TECHNOLOGY" style="width: 550px; height: 400px;"></div>
                 
                       
                        </div>
                     
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
                    ?>
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
    <script>
$(document).ready(function(){
    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
});
</script>
</body>

</html>
