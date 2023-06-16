<?php


include("../include/dbConn.php");


$allquestion = mysqli_query($con,"select COUNT(question.question_id) AS questionnum  from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL'  order by id");

$runallIn =mysqli_fetch_assoc($allquestion);
$qustionNum = $runallIn['questionnum'];

$allquestionOrg = mysqli_query($con,"select COUNT(question.question_id) AS questionnum  from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION'  order by id");

$runallOrg =mysqli_fetch_assoc($allquestionOrg);
$qustionNumOrg = $runallOrg['questionnum'];

$allquestionTech = mysqli_query($con,"select COUNT(question.question_id) AS questionnum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY'  order by id");

$runallTech =mysqli_fetch_assoc($allquestionTech);
$qustionNumTech = $runallTech['questionnum'];

/*---------------------------------------------------------------------------------------------------------------------------------*/

$allyes = mysqli_query($con,"select COUNT(result.id) As yesNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' and value = 'Yes' ");

$allno = mysqli_query($con,"select COUNT(result.id) As noNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' and value = 'No' ");

$allpartly = mysqli_query($con,"select COUNT(result.id) As partlyNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' and value = 'Partly' ");

/*---------------------------------------------------------------------------------------------------------------------------------*/

$allyesorg = mysqli_query($con,"select COUNT(result.id) As yesNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' and value = 'Yes' ");

$allnoorg = mysqli_query($con,"select COUNT(result.id) As noNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' and value = 'No' ");

$allpartlyorg = mysqli_query($con,"select COUNT(result.id) As partlyNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' and value = 'Partly' ");

/*---------------------------------------------------------------------------------------------------------------------------------*/

$allyestech = mysqli_query($con,"select COUNT(result.id) As yesNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' and value = 'Yes' ");

$allnotech = mysqli_query($con,"select COUNT(result.id) As noNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' and value = 'No'");

$allpartlytech = mysqli_query($con,"select COUNT(result.id) As partlyNum from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' and value = 'Partly' ");

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

$totalyesorg = $yesNumorg/$qustionNumOrg;

$totalnoorg = $noNumorg/$qustionNumOrg ;

$totalpartlyorg = $partlyNumorg/$qustionNumOrg;

/*---------------------------------------------------------------------------------------------------------------------------------*/

$runyestech =mysqli_fetch_assoc($allyestech);
$yesNumtech = $runyestech['yesNum'];

$runnotech =mysqli_fetch_assoc($allnotech);
$noNumtech = $runnotech['noNum'];

$runaprtlytech =mysqli_fetch_assoc($allpartlytech);
$partlyNumtech = $runaprtlytech['partlyNum'];

$totalyestech =$yesNumtech/$qustionNumTech ;

$totalnotech = $noNumtech/$qustionNumTech ;

$totalpartlytech = $partlyNumtech/$qustionNumTech;

/*---------------------------------------------------------------------------------------------------------------------------------*/

$Readiness = ((($totalyes * (0.286) + $totalyesorg * (0.43) + $totalyestech * (0.286))/3) * 100 ) + ((($totalno * (0.286) + $totalnoorg * (0.43) + $totalnotech * (0.286))/3) * 100 ) + ((($totalpartly * (0.286) + $totalpartlyorg * (0.43) + $totalpartlytech * (0.286))/3) * 100 );



/*---------------------------------------------------------------------------------------------*/

$numDay=mysqli_query($con,"Select COUNT(id) As numbers, date(date) as Date FROM SecurityReadinessIndex group by date(date) ORDER BY date(date) ASC, COUNT(id) ASC");

$rows=$numDay->num_rows;
$color = ['#dc7877','#9cbb73','#9ee2d9','#9f9ee2','#e29eba'];
$numbers = array();
$Date = array();

foreach ($numDay as $peopleData) {
    $numbers[] = $peopleData['numbers'];
    $Date[] = $peopleData['Date'];
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

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



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
                    <div class="container-fluid"><br>

                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Software Security Readiness Index

                            </div>
                            <div class="card-body">
                                <h1 class="mt-4">Data Analytics</h1>

                                <div class="row text-center">
                                <div id="gender" style="width: 550px; height: 400px;"></div>
                                <div id="sector" style="width: 550px; height: 400px;"></div>
                                <div id="department" style="width: 550px; height: 400px;"></div>
                                <div id="column-chart" style="width: 550px; height: 400px;"></div>

                                    </div>


                            </div>



                            <div class="card-body">
                                <h1 class="mt-4">Software Security Readiness Index Result</h1>

                    <div class="row text-center">
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

         ['Gender','Percentage '],
		  <?php
            $piegender = mysqli_query($con,"select COUNT(user_id) as genNum, gender from user group by gender order by user_id ");
			if(mysqli_num_rows($piegender)>0){
				while($row=mysqli_fetch_array($piegender)){
					echo"['".$row["gender"]."',".$row["genNum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
          title: 'Gender Percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('gender'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

         ['Sector','Percentage '],
		  <?php
            $pieSector = mysqli_query($con,"select COUNT(user_id) as secNum, em_sector from user group by em_sector order by user_id ");
			if(mysqli_num_rows($pieSector)>0){
				while($row=mysqli_fetch_array($pieSector)){
					echo"['".$row["em_sector"]."',".$row["secNum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
          title: 'Sector Percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('sector'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

         ['Department','Percentage '],
		  <?php
            $pieSector = mysqli_query($con,"select COUNT(user_id) as deparNum, em_department from user group by em_department order by user_id ");
			if(mysqli_num_rows($pieSector)>0){
				while($row=mysqli_fetch_array($pieSector)){
					echo"['".$row["em_department"]."',".$row["deparNum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
          title: 'Department Percentage'
        };

        var chart = new google.visualization.PieChart(document.getElementById('department'));

        chart.draw(data, options);
      }
    </script>


    <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawColumnChart);
        function drawColumnChart() {
        var data = google.visualization.arrayToDataTable([
        ['Day', 'Number of answers', { role: 'style' }, { role: 'annotation' }],
            <?php
            for($i=0;$i<$rows;$i++){
            ?>[<?php echo "'".$Date[$i]."', ".$numbers[$i]." , '".$color[$i]."' , "."'".$numbers[$i]."'" ?>],
            <?php }
            ?>
            ]);


        var options = {
            title: "Number of Answers per Day",
            chartArea: {width: '100%'},
            legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("column-chart"));
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
            $pieIndividual = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='INDIVIDUAL' group by value order by id ");
			if(mysqli_num_rows($pieIndividual)>0){
				while($row=mysqli_fetch_array($pieIndividual)){
					echo"['".$row["value"]."',".$row["questionnum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
          title: 'Percentage  for Individual Factor'
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
            $pieOrganization = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='ORGANIZATION' group by value order by id");
			if(mysqli_num_rows($pieOrganization)>0){
				while($row=mysqli_fetch_array($pieOrganization)){
					echo"['".$row["value"]."',".$row["questionnum"]."],";
				}
			}
		  ?>
        ]);

        var options = {
          title: 'Percentage  for Organizitaion Factor'
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

         ['Value','Percentage '],
		  <?php
            $pieTechnology = mysqli_query($con,"select COUNT(question.question_id) AS questionnum , value from factor join subfactor on factor.factor_id = subfactor.factor_id join title on subfactor.subfactor_id =title.subfactor_id join question on title.title_id =question.title_id join result on question.question_id =result.question_id where factor_name ='TECHNOLOGY' group by value order by id");
			if(mysqli_num_rows($pieTechnology)>0){
				while($row=mysqli_fetch_array($pieTechnology)){
					echo"['".$row["value"]."',".$row["questionnum"]."],";
				}
			}
		  ?>
        ]);

        var options = {

          title: 'Percentage  for Technology Factor'
        };

        var chart = new google.visualization.PieChart(document.getElementById('TECHNOLOGY'));

        chart.draw(data, options);
      }
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
