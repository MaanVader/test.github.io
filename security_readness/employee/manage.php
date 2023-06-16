<?php

include("../include/dbConn.php");

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